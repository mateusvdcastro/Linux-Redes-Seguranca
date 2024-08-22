### Escalonamento Round-Robin (implementado no MINIX3)

Round-robin é uma política de escalonamento simples e justa usada principalmente em sistemas interativos. Cada processo é atribuído a um quantum de tempo, ou fatia de tempo, durante o qual pode ser executado. Após o término do quantum, o processo é colocado no final da fila e o próximo processo na fila é executado. Este processo continua em um ciclo, garantindo que todos os processos tenham a chance de ser executados.
### Fila de Prontos na Memória

A "fila de prontos" (run queue) no MINIX3 é uma estrutura de dados que mantém os processos que estão prontos para serem executados pela CPU. Cada CPU pode ter sua própria fila de prontos, e estas filas são organizadas por prioridade. No código, estas filas são acessadas através dos ponteiros `run_q_head` e `run_q_tail`, que apontam para o início e o fim da fila de prontos, respectivamente.

### Processos no Contexto do Código

- **rd**: O processo que está sendo adicionado à fila de prontos (novamente pronto para execução).
- **p**: O processo que está atualmente em execução na CPU.

### Função `enqueue()`

A função `enqueue()` adiciona um processo à fila de prontos. Vamos revisitar essa parte do código com foco na adição de um processo à fila:

```c
void enqueue(
  register struct proc *rp	/* this process is now runnable */
)
{
/* Add 'rp' to one of the queues of runnable processes.  This function is 
 * responsible for inserting a process into one of the scheduling queues. 
 * The mechanism is implemented here.   The actual scheduling policy is
 * defined in sched() and pick_proc().
 *
 * This function can be used x-cpu as it always uses the queues of the cpu the
 * process is assigned to.
 */
  int q = rp->p_priority;	 		/* scheduling queue to use */
  struct proc **rdy_head, **rdy_tail;

  assert(proc_is_runnable(rp));

  assert(q >= 0);

  rdy_head = get_cpu_var(rp->p_cpu, run_q_head);
  rdy_tail = get_cpu_var(rp->p_cpu, run_q_tail);

  /* Now add the process to the queue. */
  if (!rdy_head[q]) {		/* add to empty queue */
      rdy_head[q] = rdy_tail[q] = rp; 		/* create a new queue */
      rp->p_nextready = NULL;		/* mark new end */
  } 
  else {					/* add to tail of queue */
      rdy_tail[q]->p_nextready = rp;		/* chain tail of queue */	
      rdy_tail[q] = rp;				/* set new queue tail */
      rp->p_nextready = NULL;		/* mark new end */
  }

  if (cpuid == rp->p_cpu) {
    /*
     * enqueueing a process with a higher priority than the current one,
     * it gets preempted. The current process must be preemptible. Testing
     * the priority also makes sure that a process does not preempt itself
     */
    struct proc * p;
    p = get_cpulocal_var(proc_ptr);
    assert(p);
    if((p->p_priority > rp->p_priority) &&
        (priv(p)->s_flags & PREEMPTIBLE))
      RTS_SET(p, RTS_PREEMPTED); /* calls dequeue() */ 
      /*!!!!!! Lembre-se que quanto menor o número de prioridade maior a prioridade */
  }
#ifdef CONFIG_SMP
  /*
   * if the process was enqueued on a different cpu and the cpu is idle, i.e.
   * the time is off, we need to wake up that cpu and let it schedule this new
   * process
   */
  else if (get_cpu_var(rp->p_cpu, cpu_is_idle)) {
    smp_schedule(rp->p_cpu);
  }
#endif

  /* Make note of when this process was added to queue */
  read_tsc_64(&(get_cpulocal_var(proc_ptr)->p_accounting.enter_queue));


#if DEBUG_SANITYCHECKS
  assert(runqueues_ok_local());
#endif
}
```

### Função `dequeue`

```c
void dequeue(struct proc *rp)
/* this process is no longer runnable */
{
/* A process must be removed from the scheduling queues, for example, because
 * it has blocked.  If the currently active process is removed, a new process
 * is picked to run by calling pick_proc().
 *
 * This function can operate x-cpu as it always removes the process from the
 * queue of the cpu the process is currently assigned to.
 */
  int q = rp->p_priority;		/* queue to use */
  struct proc **xpp;			/* iterate over queue */
  struct proc *prev_xp;
  u64_t tsc, tsc_delta;

  struct proc **rdy_tail;

  assert(proc_ptr_ok(rp));
  assert(!proc_is_runnable(rp));

  /* Side-effect for kernel: check if the task's stack still is ok? */
  assert (!iskernelp(rp) || *priv(rp)->s_stack_guard == STACK_GUARD);

  rdy_tail = get_cpu_var(rp->p_cpu, run_q_tail);

  /* Now make sure that the process is not in its ready queue. Remove the 
   * process if it is found. A process can be made unready even if it is not 
   * running by being sent a signal that kills it.
   */
  prev_xp = NULL;				
  for (xpp = get_cpu_var_ptr(rp->p_cpu, run_q_head[q]); *xpp;
      xpp = &(*xpp)->p_nextready) {
      if (*xpp == rp) {				/* found process to remove */
          *xpp = (*xpp)->p_nextready;		/* replace with next chain */
          if (rp == rdy_tail[q]) {		/* queue tail removed */
              rdy_tail[q] = prev_xp;		/* set new tail */
    }

          break;
      }
      prev_xp = *xpp;				/* save previous in chain */
  }


  /* Process accounting for scheduling */
  rp->p_accounting.dequeues++;

  /* this is not all that accurate on virtual machines, especially with
     IO bound processes that only spend a short amount of time in the queue
     at a time. */
  if (rp->p_accounting.enter_queue) {
  read_tsc_64(&tsc);
  tsc_delta = tsc - rp->p_accounting.enter_queue;
  rp->p_accounting.time_in_queue = rp->p_accounting.time_in_queue +
    tsc_delta;
  rp->p_accounting.enter_queue = 0;
  }

  /* For ps(1), remember when the process was last dequeued. */
  rp->p_dequeued = get_monotonic();

#if DEBUG_SANITYCHECKS
  assert(runqueues_ok_local());
#endif
}
```

#### Explicação:

- **Entrada:** Um ponteiro para a estrutura `proc` do processo a ser desenfileirado.
- **Objetivo:** Remove o processo da fila de processos prontos (`runnable`).
- **Passos:**
    - Verifica a validade do processo (`proc_ptr_ok`) e que não está mais pronto para execução (`!proc_is_runnable`).
    - Obtém os ponteiros para a cauda (`run_q_tail`) da fila do CPU associado ao processo.
    - Itera sobre a fila para encontrar e remover o processo, ajustando os ponteiros adequadamente.
    - Atualiza a contabilização do processo (`p_accounting`) com o tempo em fila e incrementa o contador de dequeues.
    - Registra o tempo em que o processo foi removido da fila.


#### Processo Atual e Adição de `rp` à Fila

- Quando um processo (`rp`) é adicionado à fila, ele não se torna imediatamente o processo atual (`p`), a menos que certas condições sejam atendidas.
    
- O processo atual (`p`) é o processo que está sendo executado pela CPU no momento.
    
- Se o novo processo (`rp`) tem uma prioridade mais alta que o processo atual (`p`), e o processo atual é preemptível, o processo atual pode ser preemptado (interrompido) e `rp` pode ser executado imediatamente. Isso é indicado pelo código:
- `if ((p->p_priority > rp->p_priority) &&     (priv(p)->s_flags & PREEMPTIBLE))     RTS_SET(p, RTS_PREEMPTED); /* chama dequeue() */`

### Função `pick_proc()`

A função `pick_proc()` seleciona o próximo processo a ser executado a partir das filas de prontos. Vamos revisar o código:

```c
static struct proc * pick_proc(void)
{
/* Decide who to run now.  A new process is selected and returned.
 * When a billable process is selected, record it in 'bill_ptr', so that the 
 * clock task can tell who to bill for system time.
 *
 * This function always uses the run queues of the local cpu!
 */
  register struct proc *rp;			/* process to run */
  struct proc **rdy_head;
  int q;				/* iterate over queues */

  /* Check each of the scheduling queues for ready processes. The number of
   * queues is defined in proc.h, and priorities are set in the task table.
   * If there are no processes ready to run, return NULL.
   */
  rdy_head = get_cpulocal_var(run_q_head);
  for (q=0; q < NR_SCHED_QUEUES; q++) {	
  if(!(rp = rdy_head[q])) {
    TRACE(VF_PICKPROC, printf("cpu %d queue %d empty\n", cpuid, q););
    continue;
  }
  assert(proc_is_runnable(rp));
  if (priv(rp)->s_flags & BILLABLE)	 	
    get_cpulocal_var(bill_ptr) = rp; /* bill for system time */
  return rp;
  }
  return NULL;
}
```
#### Seleção do Próximo Processo

- `pick_proc()` itera sobre as filas de prontos, da mais alta para a mais baixa prioridade (`for (q = 0; q < NR_SCHED_QUEUES; q++)`).
- Retorna o primeiro processo pronto (`rp`) encontrado na fila de maior prioridade disponível.
- Este processo (`rp`) então se torna o processo atual, substituindo o processo anterior.

### Interação entre `enqueue()`, `dequeue()`, e `pick_proc()`

1. **`enqueue()`**: Adiciona um processo à fila de prontos.
    - Se o processo adicionado tem prioridade maior que o atual e o atual é preemptível, preempta o processo atual.
2. **`dequeue()`**: Remove um processo da fila de prontos.
    - Utilizado quando um processo bloqueia, termina ou é preemptado.
3. **`pick_proc()`**: Seleciona o próximo processo a ser executado.
    - Executa o processo de maior prioridade na fila de prontos.

### Resumo

No MINIX3, a fila de prontos mantém os processos que estão prontos para execução, organizados por prioridade. O processo atual (`p`) é o que está sendo executado pela CPU no momento. Quando um novo processo (`rp`) é enfileirado, ele é adicionado à fila apropriada. Se `rp` tem prioridade mais alta e o processo atual é preemptível, `rp` pode preemptar o processo atual. A função `pick_proc()` é responsável por selecionar o próximo processo a ser executado, sempre escolhendo o de maior prioridade disponível na fila de prontos.

![[Pasted image 20240629192258.png]]


# Utils
- O sistema UNIX tem um comando, nice(), que permite que um usuário reduza voluntariamente a prioridade do seu processo, a fim de ser legal com os outros usuários, mas ninguém nunca o utiliza.
- Comando para montar a pasta compartilhada:
```c
$ mount -t vbfs -o share=NAME none /mnt /* Trocar NAME pelo nome da pasta criada no VirtualBox */
```
- Compilar o arquivo test.c:
```c
$ cc -oprog source.c  
$ ./prog
$ ./prog 100 2000 100000000 > exp_01_IO2000CPU100000000.txt /* IO consome muito tempo, diminuir para ser mais rápido a execução */
```

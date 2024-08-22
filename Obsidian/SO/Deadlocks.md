## O que são Deadlocks?

Deadlocks são situações em sistemas de computação onde dois ou mais processos ficam indefinidamente bloqueados esperando que um recurso seja liberado por outro processo, resultando em um impasse no qual nenhum dos processos pode continuar sua execução. É um problema crítico em sistemas operacionais multitarefa e ambientes concorrentes, como bancos de dados e sistemas distribuídos.

Exemplo:

O processo A solicita permissão para usar o scanner e ela lhe é concedida. O processo B é programado diferentemente e solicita o gravador Blu-ray primeiro e ele também lhe é concedido. Agora A pede pelo gravador Blu-ray, mas a solicitação é suspensa até que B o libere. Infelizmente, em vez de liberar o gravador Blu-ray, B pede pelo scanner. A essa altura ambos os processos estão
bloqueados e assim permanecerão para sempre. Essa situação é chamada de impasse (deadlock).

Um ***recurso*** pode ser um dispositivo de hardware (por exemplo, uma unidade de Blu-ray) ou um fragmento de informação (por exemplo, um registro em um banco de dados).

### Condições Necessárias para Deadlocks

Para que um deadlock ocorra, quatro condições devem ser simultaneamente satisfeitas:

1. **Exclusão Mútua (Mutual Exclusion):**
    
    - Pelo menos um recurso deve estar em modo não compartilhável, ou seja, apenas um processo pode usá-lo de cada vez.
2. **Retenção e Espera (Hold and Wait):**
    
    - Um processo que está mantendo pelo menos um recurso está esperando para adquirir recursos adicionais que estão sendo mantidos por outros processos.
3. **Não Preempção (No Preemption):**
    
    - Os recursos não podem ser retirados à força de processos que os possuem; eles devem ser liberados voluntariamente pelo processo que os possui.
4. **Espera Circular (Circular Wait):**
    
    - Deve existir uma cadeia de processos \[P1, P2, ..., Pn\] tal que P1 está esperando por um recurso que P2 possui, P2 está esperando por um recurso que P3 possui, e assim por diante, até que Pn esteja esperando por um recurso que P1 possui, formando um ciclo fechado.

### Exemplos de Deadlocks

1. **Exemplo Clássico: Filósofos que Jantam**
    
    - Cinco filósofos estão sentados ao redor de uma mesa com cinco garfos. Cada filósofo precisa de dois garfos para comer. Se cada filósofo pegar um garfo e esperar pelo segundo, todos ficarão esperando indefinidamente, resultando em um deadlock.
2. **Exemplo de Recursos Computacionais**
    
    - Processo A possui recurso 1 e solicita recurso 2.
    - Processo B possui recurso 2 e solicita recurso 1.
    - Ambos os processos ficam bloqueados esperando que o outro libere o recurso.
3. **Ilustração exemplo com grafos dirigidos:** 

Processos, mostrados como círculos, e recursos, mostrados como quadrados. Um arco direcionado de um nó de recurso (quadrado) para um nó de processo (círculo) significa que o recurso foi previamente solicitado, concedido e está atualmente com aquele processo. Um arco direcionado de um processo para um recurso significa que o processo está atualmente bloqueado esperando por aquele recurso.

![[Pasted image 20240530142630.png]]


### Prevenção, Detecção e Recuperação de Deadlocks

#### Prevenção de Deadlocks

- **Eliminação de Condições Necessárias:** Modificar o sistema de modo que uma das quatro condições necessárias para deadlocks não possa ocorrer.
    - **Exclusão Mútua:** Tornar todos os recursos compartilháveis.
    - **Retenção e Espera:** Requerer que os processos solicitem todos os recursos de uma só vez.
    - **Não Preempção:** Permitir preempção de recursos.
    - **Espera Circular:** Impor uma ordem linear de requisição de recursos.

#### Detecção de Deadlocks

- **Algoritmos de Detecção:** Implementar algoritmos que verificam periodicamente o sistema para identificar a presença de um deadlock, como a construção de um grafo de alocação de recursos e a busca por ciclos nesse grafo.

#### Recuperação de Deadlocks

- **Abortar Processos:** Terminar um ou mais processos para quebrar o ciclo de espera circular.
- **Preempção de Recursos:** Forçar a liberação de recursos dos processos que os possuem.

### Deadlocks em Programação Concorrente

Em programação concorrente, deadlocks podem ocorrer quando múltiplas threads ou processos tentam acessar recursos compartilhados sem um gerenciamento adequado. Por exemplo:

- **Locks e Mutexes:** Se duas threads tentam adquirir dois mutexes em ordens diferentes, um deadlock pode ocorrer se cada thread adquire um mutex e espera pelo outro.
- **Buffers Compartilhados:** Se dois processos estão esperando para adicionar e remover itens de um buffer compartilhado sem coordenação adequada, um deadlock pode ocorrer.

### Evitando Deadlocks em Sistemas Concretos

1. **Ordenação de Recursos:**
    
    - Impor uma ordem global na requisição de recursos e garantir que todos os processos adiram a essa ordem.
2. **Timeouts:**
    
    - Utilizar timeouts para liberar recursos se um processo esperar por um período excessivo.
3. **Detecção Dinâmica:**
    
    - Implementar mecanismos de detecção dinâmica que monitoram o sistema e tomam ações corretivas quando um deadlock é detectado.

### Conclusão

Deadlocks representam um problema crítico em sistemas multitarefa e ambientes concorrentes. Compreender as condições necessárias para que ocorra um deadlock e implementar estratégias para prevenção, detecção e recuperação é essencial para garantir a robustez e a eficiência do sistema.

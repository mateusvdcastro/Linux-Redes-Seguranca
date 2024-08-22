**Conceito**:

- **Swapping** é uma técnica de gerenciamento de memória que move processos inteiros entre a memória principal (RAM) e o disco rígido (swap area) para liberar espaço e acomodar mais processos.

**Funcionamento**:

1. **Carregar e Executar**: Quando um processo precisa ser executado, ele é carregado da área de troca para a memória RAM.
2. **Swapp Out**: Se a memória estiver cheia, o sistema operacional seleciona um processo na memória e o move de volta para o disco (swapp out), liberando espaço.
3. **Swapp In**: O processo que estava em espera pode então ser carregado na memória (swapp in) e executado.

**Vantagens**:

- **Aumento da Multiprogramação**: Permite que mais processos sejam mantidos na memória secundária (disco) e alternados para a RAM conforme necessário, aumentando a multiprogramação e a utilização da CPU.
- **Eficiência de Memória**: Processos ociosos não ocupam espaço na RAM, deixando mais memória disponível para processos ativos.

![[Pasted image 20240804153850.png]]
### Problemas Resolvidos pelo Swapping

- **Antes do Swapping**: Os programas ficavam na memória até completarem sua execução, forçando os outros a esperar até que houvesse memória livre.
- **Com Swapping**: O sistema pode retirar temporariamente programas da memória e carregá-los novamente quando necessário. Isso é especialmente útil em sistemas com algoritmos de escalonamento como Round Robin ou escalonamento por prioridade.

**Round Robin**:

- Processos são executados por um tempo fixo (quantum). Se o quantum termina, o processo é movido para o disco (swapped out) e outro processo é carregado para ocupar seu espaço.

**Escalonamento por Prioridade**:

- Processos com alta prioridade são mantidos na memória, enquanto processos de baixa prioridade podem ser movidos para o disco para liberar espaço para processos mais importantes.
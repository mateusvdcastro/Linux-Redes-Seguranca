### 1. **Tempo de Compilação (MS-DOS)**

- **O que é?**: Este tipo de vinculação ocorre durante a compilação do programa, quando o código é transformado de linguagem de alto nível (como C ou Java) para código de máquina (binário).
- **Como funciona?**: Se o local na memória onde o programa será carregado é conhecido com antecedência, o compilador pode gerar código que usa endereços absolutos. Isso significa que os endereços de memória específicos são inseridos diretamente no código.
- **Exemplo**: Imagine que o compilador sabe que o programa sempre começará no endereço de memória 1000. Ele pode gerar instruções que dizem "carregar valor da memória 1020".
- **Limitação**: Se por algum motivo o programa precisar ser carregado em um endereço diferente (por exemplo, 2000), o código não funcionará corretamente, e será necessário recompilar o programa.

### 2. **Tempo de Carga (Vinculação Adiada)**

- **O que é?**: A vinculação de endereço é realizada quando o programa é carregado na memória para execução.
- **Como funciona?**: Quando o compilador não sabe onde o programa será carregado na memória, ele gera código realocável. Isso significa que o código contém endereços relativos, e o carregador (loader) ajusta esses endereços para corresponder ao local de carregamento real.
- **Exemplo**: Suponha que o programa tenha instruções que dizem "carregar o valor a 20 posições após o início do programa". Quando o programa é carregado, se começar no endereço 2000, o carregador ajusta isso para "carregar o valor da memória 2020".
- **Vantagem**: Isso permite que o mesmo programa seja carregado em diferentes locais de memória sem precisar ser recompilado.

### 3. **Tempo de Execução (Vinculação Ainda Mais Adiada)**

- **O que é?**: A vinculação de endereços ocorre durante a execução do programa. Isso permite que o programa seja movido na memória enquanto está sendo executado.
- **Como funciona?**: Durante a execução, o sistema pode mover o processo de um lugar para outro na memória física. O sistema operacional, com a ajuda do hardware (como a Unidade de Gerenciamento de Memória, ou MMU), mapeia endereços lógicos (usados pelo programa) para endereços físicos (endereços reais na RAM).
- **Exemplo**: Se o programa pensa que está acessando o endereço 1000, a MMU pode mapear esse endereço para 5000 na memória física. Se o processo for movido para outro lugar na memória, a MMU ajusta o mapeamento.
- **Vantagem**: Isso permite maior flexibilidade e eficiência no uso da memória, facilitando multitarefa e a execução de processos em sistemas com memória limitada. Além disso, é comum em sistemas operacionais modernos, que suportam troca (swap) e paginação.

### 1. **`void *malloc(unsigned int num)`**

- **O que faz?**: Aloca um bloco de memória contíguo de tamanho especificado (em bytes) e retorna um ponteiro para o início desse bloco.
- **Parâmetros**:
    - `num`: O número de bytes a serem alocados.
- **Retorno**: Um ponteiro `void*` para o início do bloco alocado, ou `NULL` se a alocação falhar.
- **Detalhes**:
    - O espaço de memória alocado por `malloc` não é inicializado. Ou seja, ele pode conter qualquer dado residual que estava na memória anteriormente.
    - Por exemplo, `int *arr = (int *)malloc(10 * sizeof(int));` aloca memória suficiente para um array de 10 inteiros.

### 2. **`void *calloc(unsigned int num, unsigned int size)`**

- **O que faz?**: Aloca memória suficiente para um array de `num` elementos, cada um de tamanho `size` bytes, e inicializa todos os bytes para zero.
- **Parâmetros**:
    - `num`: O número de elementos.
    - `size`: O tamanho de cada elemento em bytes.
- **Retorno**: Um ponteiro `void*` para o início do bloco alocado, ou `NULL` se a alocação falhar.
- **Detalhes**:
    - Ao contrário de `malloc`, `calloc` inicializa o bloco de memória para zero. Isso pode ser útil quando se deseja garantir que o array comece com todos os elementos definidos para zero.
    - Exemplo: `int *arr = (int *)calloc(10, sizeof(int));` aloca memória para um array de 10 inteiros e inicializa todos os elementos para zero.

### 3. **`void free(void *ptr)`**

- **O que faz?**: Libera o espaço de memória apontado por `ptr` que foi previamente alocado usando `malloc`, `calloc` ou `realloc`.
- **Parâmetros**:
    - `ptr`: Um ponteiro para a memória a ser liberada.
- **Detalhes**:
    - Após chamar `free`, o bloco de memória apontado por `ptr` é considerado disponível para alocação futura. O ponteiro `ptr` em si não é alterado, mas o espaço de memória que ele apontava pode ser reutilizado.
    - **Cuidado**: Chamar `free` em um ponteiro que já foi liberado ou que não aponta para um bloco de memória alocado dinamicamente pode causar comportamento indefinido.

### 4. **`void *realloc(void *ptr, unsigned int num)`**

- **O que faz?**: Redimensiona um bloco de memória previamente alocado, apontado por `ptr`, para um novo tamanho especificado por `num`.
- **Parâmetros**:
    - `ptr`: Um ponteiro para a memória previamente alocada.
    - `num`: O novo tamanho desejado para o bloco de memória.
- **Retorno**: Um ponteiro `void*` para o início do novo bloco de memória, ou `NULL` se a alocação falhar. Se o retorno for `NULL`, o bloco original ainda é válido.
- **Detalhes**:
    - Se o novo tamanho é maior que o original, os novos bytes podem conter qualquer dado residual. Se o tamanho é menor, o conteúdo é truncado.
    - Se `ptr` é `NULL`, `realloc` é equivalente a `malloc(num)`.
    - Exemplo: `int *arr = (int *)realloc(arr, 20 * sizeof(int));` aumenta o tamanho de um array de inteiros de 10 para 20 elementos.

### Endereço Lógico vs. Endereço Físico

**Endereço Lógico**:

- **Definição**: É o endereço gerado pela Unidade Central de Processamento (CPU) durante a execução de um programa. É também conhecido como endereço virtual.
- **Características**:
    - **Gerado pela CPU**: Quando um programa acessa dados ou executa instruções, a CPU gera um endereço lógico para localizar essas informações.
    - **Endereço Virtual**: Os programas de usuário usam apenas endereços lógicos e não têm conhecimento dos endereços físicos reais na memória.
    - **Isolamento**: Cada processo em execução tem seu próprio espaço de endereçamento lógico, o que garante que um processo não possa acessar diretamente a memória de outro processo.

**Endereço Físico**:

- **Definição**: É o endereço real na memória RAM do sistema onde os dados são armazenados. É o endereço que a unidade de memória (como a RAM) entende e usa para acessar os dados.
- **Características**:
    - **Gerado pela MMU**: A tradução do endereço lógico para o físico é feita pelo hardware, especificamente pela Unidade de Gerenciamento de Memória (MMU).
    - **Memória Física**: Refere-se ao endereço físico real na memória RAM.

### Unidade de Gerenciamento de Memória (MMU) e o Registrador de Realocação

#### Unidade de Gerenciamento de Memória (MMU)

A MMU é um componente crucial no sistema de gerenciamento de memória. Ela realiza a tradução dos endereços lógicos para os endereços físicos. Este processo é transparente para o usuário e para os programas.

#### Registrador de Realocação

O **registrador de realocação** é um dos mecanismos utilizados pela MMU para implementar o mapeamento de endereços. Ele funciona da seguinte maneira:

1. **Armazenamento da Base**:
    
    - O registrador de realocação armazena a base (ou offset) dos endereços físicos onde o processo está carregado na memória.
2. **Tradução de Endereço**:
    
    - Quando a CPU gera um endereço lógico, a MMU adiciona o valor do registrador de realocação ao endereço lógico para produzir o endereço físico correspondente.
    - **Fórmula de Tradução**: `Endereço Físico = Endereço Lógico + Valor do Registrador de Realocação`
    - Exemplo: Se o endereço lógico gerado pela CPU é 0x2000 e o valor no registrador de realocação é 0x10000, o endereço físico resultante será 0x12000.
3. **Proteção e Isolamento**:
    
    - O registrador de realocação também ajuda a proteger e isolar os processos uns dos outros. Como cada processo tem seu próprio valor de registrador de realocação, mesmo que diferentes processos gerem o mesmo endereço lógico, eles serão traduzidos para diferentes endereços físicos, impedindo que processos interfiram na memória uns dos outros.

### Exemplo de Uso

Considere um sistema com um processo A e um processo B. Se o processo A está carregado começando no endereço físico 0x1000 e o processo B está carregado começando no endereço físico 0x3000, os respectivos registradores de realocação seriam configurados com 0x1000 e 0x3000. Se ambos os processos acessam o endereço lógico 0x0500, o endereço físico acessado para o processo A seria 0x1500 e para o processo B seria 0x3500. Isso ocorre de maneira transparente para ambos os processos.

### Alocação Dinâmica e Realocação

- **Registradores Base e Limite**:
    
    - **Registrador Base**: Contém o endereço físico onde o processo começa na memória. Toda referência de memória feita pelo processo é deslocada por esse valor.
    - **Registrador Limite**: Contém o tamanho do espaço de endereçamento do processo. Ele define o limite superior que o processo pode acessar na memória.
- **Funcionamento**:
    
    - Quando um processo tenta acessar uma posição de memória, o endereço gerado (endereço lógico) é adicionado ao valor do registrador base para obter o endereço físico real.
    - Esse endereço é então comparado ao valor no registrador limite para garantir que o acesso seja válido.
    - **Proteção**: Se o endereço calculado excede o valor no registrador limite, o hardware gera uma "trap" para o sistema operacional, indicando uma tentativa de acesso ilegal à memória. Isso pode resultar em uma interrupção ou falha do processo.

### Implementação

- **Realocação Dinâmica**:
    
    - Essa técnica permite que um programa seja carregado em qualquer lugar na memória física, ajustando os endereços usados pelo programa dinamicamente.
    - **Exemplo Simples**: Se o código do programa tem uma instrução `JUMP 28`, o valor `28` é um endereço lógico. Se o registrador base tiver o valor `16.412`, o endereço físico para o salto seria `16.412 + 28 = 16.440`.
- **Exemplo de Instrução de Salto**:
    
    - **Original**: `JUMP 28` (endereço lógico)
    - **Tradução**: `JUMP 16.412 + 28` (endereço físico), onde `16.412` é o valor do registrador base.

### Proteção e Segurança

- **Verificação de Endereços**:
    - A cada acesso à memória, o hardware adiciona o valor do registrador base ao endereço gerado pelo processo. Em seguida, compara o resultado com o valor do registrador limite.
    - **Trap**: Se o endereço físico resultante estiver fora dos limites definidos pelo registrador limite, uma "trap" é acionada, o que pode levar à interrupção do processo ou outras medidas de segurança.

### Memória Física

1. **Definição**:
    
    - A **memória física** refere-se à memória "real" do sistema, que é fisicamente instalada na forma de chips de memória (CIs, ou Circuitos Integrados).
2. **Características**:
    
    - **Componentes físicos**: Inclui todos os módulos de memória RAM e outros dispositivos de memória que armazenam dados de forma persistente ou temporária.
    - **Áreas reservadas**: Existem certas áreas da memória física que são reservadas para funções específicas, como o vetor de interrupções (que armazena os endereços dos manipuladores de interrupções).
    - **Endereço físico**: Refere-se ao endereço real que se usa para acessar uma posição específica na memória física.

### Memória Lógica (Memória Virtual)

1. **Definição**:
    
    - A **memória lógica** (ou virtual) é a memória que um processo vê e pode acessar. É um espaço de endereçamento abstrato que permite que programas sejam escritos sem considerar a quantidade de memória física disponível.
2. **Características**:
    
    - **Endereços lógicos**: Os endereços gerados pelas instruções do programa são chamados de endereços lógicos. Estes endereços precisam ser traduzidos para endereços físicos pela Unidade de Gerenciamento de Memória (MMU) para acessar a memória física real.
    - **Espaço de endereço contínuo**: Cada processo tem a impressão de que possui um espaço de memória contínuo e exclusivo, mesmo que o espaço físico seja fragmentado e compartilhado entre vários processos
# Troca de Processos ( [[Swapping]]])

### Compactação de Memória

- **Descrição**: Quando processos são movidos entre a memória e o disco, podem surgir espaços livres (fragmentação externa). A compactação de memória move processos na memória para unir esses espaços livres, criando um grande bloco contíguo de memória livre.
- **Desvantagem**: Esse processo pode consumir muito tempo da CPU, pois envolve a movimentação de processos na memória.

### Processos de Tamanho Fixo vs. Processos com Alocação Dinâmica

- **Processos de Tamanho Fixo**:
    
    - O sistema operacional aloca uma quantidade fixa de memória que não muda durante a execução do processo.
- **Processos com Alocação Dinâmica**:
    
    - **Segmento de Dados**: Utilizado para variáveis dinamicamente alocadas (e.g., usando `malloc`).
    - **Pilha**: Armazena variáveis locais e endereços de retorno e cresce para baixo.
    - **Problema**: Se esses segmentos crescem e colidem, pode ser necessário mover o processo para outro espaço de memória ou até suspendê-lo ou terminá-lo.

### Lidar com Alocação Dinâmica

- **Memória Extra**:
    
    - Alocar memória extra ao mover processos para acomodar possíveis expansões futuras.
    - Quando um processo é movido para o disco, essa memória extra não precisa ser movida, economizando espaço no disco.
- **Dois Segmentos em Expansão**:
    
    - **Segmento de Dados**: Cresce para cima.
    - **Pilha**: Cresce para baixo.
    - **Conflito de Espaço**: Se não houver espaço suficiente entre esses segmentos, o processo pode precisar ser movido para outra parte da memória ou suspenso/morto.

![[Pasted image 20240804153933.png]]![[Pasted image 20240804154000.png]]

### [[Gerenciamento de Memória Livre]]

Quando o sistema operacional precisa alocar ou liberar memória, ele deve gerenciar eficientemente a memória livre disponível. Existem duas principais abordagens para isso: **mapas de bits** e **listas livres**.

### [[Fragmentação de Memória]]

**Fragmentação de memória** ocorre quando o uso da memória não é otimizado, resultando em partes de memória que não podem ser usadas de forma eficiente. Existem dois tipos principais de fragmentação: **interna** e **externa**.

### [[Alocação de Espaço na Memória]]

Nos sistemas modernos, a alocação de memória não é necessariamente contígua. Existem técnicas que permitem a alocação não contígua, facilitando a gestão da memória de forma mais eficiente e flexível. Duas das principais técnicas são a **segmentação** e a **paginação**.


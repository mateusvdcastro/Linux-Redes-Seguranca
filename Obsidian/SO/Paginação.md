A paginação é uma técnica de gerenciamento de memória usada para implementar a memória virtual, permitindo que os programas vejam um espaço de endereçamento contínuo, mesmo que a memória física seja fragmentada. Aqui está uma explicação detalhada dos principais conceitos:

### Estrutura da Memória Virtual

1. **Páginas**: A memória virtual é dividida em unidades de tamanho fixo chamadas páginas.
2. **Quadros de Página**: Correspondem às páginas, mas são localizações físicas na RAM.

Esses dois elementos têm geralmente o mesmo tamanho, garantindo uma correspondência direta entre uma página virtual e um quadro de página físico.

![[Pasted image 20240804185751.png]]
![[Pasted image 20240804190019.png]]
![[Pasted image 20240804190035.png]]

### Tabela de Páginas

A tabela de páginas é usada para mapear números de páginas virtuais para números de quadros de páginas físicas. Cada entrada na tabela contém:

- **Número do Quadro de Página**: Indica onde a página está armazenada na memória física.
- **Bit Presente/Ausente**: Indica se a página está atualmente na memória física.
- **Bits de Proteção**: Indicam os tipos de acesso permitidos (leitura, escrita, execução).
- **Bit Modificada (ou "Bit Sujo")**: Indica se a página foi modificada enquanto estava na memória.
- **Bit Referenciada**: Usado para determinar a frequência de uso da página.
- **Bit de Cache Desabilitado**: Usado para páginas que mapeiam registradores de dispositivos em vez da memória.
![[Pasted image 20240804190551.png]]

![[Pasted image 20240804190120.png]]
![[Pasted image 20240804190631.png]]
### Mapeamento de Endereços

Quando um programa acessa uma memória virtual, o endereço virtual é dividido em:

1. **Número da Página**: Usado como um índice na tabela de páginas.
2. **Deslocamento (Offset)**: Indica o deslocamento dentro da página.

O MMU traduz o número da página para um número de quadro de página, que combinado com o deslocamento, forma o endereço físico.

### Falta de Página

Se um programa tenta acessar uma página que não está na memória física (bit presente/ausente é 0), ocorre uma **falta de página**. O sistema operacional então:

1. Seleciona uma página para remover (baseado em políticas como LRU, FIFO, etc.).
2. Salva a página removida de volta para o disco, se necessário.
3. Carrega a nova página na memória física.
4. Atualiza a tabela de páginas.

### Proteção de Memória

A memória virtual também ajuda na proteção de memória, garantindo que os processos não acessem memórias que não lhes pertencem. Isso é feito por meio de:

- **Bits de Proteção**: Definem permissões de acesso para cada página.
- **Bit Válido/Inválido**: Indica se a página é válida para o processo atual.

### Abstração e Benefícios da Memória Virtual

A memória virtual cria uma abstração de um espaço de endereçamento grande e contínuo para cada processo. Isso oferece vários benefícios:

1. **Isolamento de Processos**: Cada processo tem seu espaço de endereçamento, impedindo acessos não autorizados.
2. **Flexibilidade e Simplicidade**: Os programas não precisam se preocupar com a fragmentação da memória física.
3. **Eficiência na Utilização de Memória**: Páginas raramente usadas podem ser mantidas no disco, liberando espaço na RAM.

Em resumo, a memória virtual é uma abstração poderosa que melhora a segurança, flexibilidade e eficiência no uso da memória em sistemas operacionais modernos.

## Acelerando a paginação

Acelerar a paginação é crucial para o desempenho de sistemas que utilizam memória virtual. Vamos detalhar as estratégias e desafios associados ao mapeamento rápido de endereços virtuais para físicos e à gestão eficiente de grandes tabelas de páginas.

![[Pasted image 20240804191841.png]]


### 1. Mapeamento Rápido de Endereços

#### Desafio

O mapeamento de endereços virtuais para físicos precisa ocorrer rapidamente, pois é realizado em cada referência de memória. Qualquer atraso pode impactar significativamente o desempenho.

#### Solução: TLB (Translation Lookaside Buffer)

A estratégia para acelerar a paginação usando o TLB (Translation Lookaside Buffer) é baseada na observação de que muitos programas tendem a fazer referências a um número relativamente pequeno de páginas de memória com alta frequência. Esse comportamento é conhecido como **localidade de referência**. Vamos explorar os detalhes dessa estratégia:

### 1. Conceito de Localidade de Referência

- **Localidade Temporal**: Refere-se à tendência de um programa acessar a mesma localização de memória repetidamente dentro de um curto período.
- **Localidade Espacial**: Refere-se à tendência de um programa acessar locais de memória que estão próximos uns dos outros.

Devido a essas características, a maioria das referências de memória em um programa ocorre em um subconjunto pequeno de páginas, o que torna a tabela de páginas completa muitas vezes desnecessária para o acesso rápido à memória.

### 2. TLB (Translation Lookaside Buffer)

O TLB é uma cache de hardware que armazena um subconjunto das traduções mais recentemente usadas de endereços virtuais para endereços físicos. A ideia é reduzir a necessidade de acessar a tabela de páginas principal, que pode ser lenta e ocupar muito espaço.

#### Funcionamento do TLB

1. **Verificação no TLB**:
    
    - Quando um endereço virtual é solicitado, a MMU (Memory Management Unit) verifica se o número da página virtual está presente no TLB.
    - Se encontrado, o endereço físico correspondente é recuperado diretamente do TLB.
2. **Verificação de Proteção**:
    
    - Se a entrada no TLB indica que a página é somente leitura, e a instrução tenta escrever nessa página, ocorre uma falha de proteção.
    - Se não houver problemas de proteção, a operação continua normalmente.
3. **Falha de TLB**:
    
    - Se o número da página não está no TLB (um **TLB Miss**), a MMU consulta a tabela de páginas principal para encontrar a entrada correta.
    - A entrada da tabela de páginas é então carregada no TLB, substituindo uma das entradas existentes (se o TLB estiver cheio).
    - O **bit modificado** da entrada retirada é copiado de volta para a tabela de páginas na memória para manter a consistência.

### 3. Gerenciamento do TLB

O gerenciamento do TLB pode ser feito de duas maneiras:

#### a) **Gerenciamento de Hardware**

- **Processo**: Em muitos sistemas, o gerenciamento do TLB é realizado inteiramente pelo hardware da MMU.
- **Vantagens**: Este método é rápido e eficiente, pois o hardware lida com a maioria dos casos, reduzindo a necessidade de intervenção do sistema operacional.

#### b) **Gerenciamento de Software**

- **Processo**: Em sistemas RISC (Reduced Instruction Set Computer), o gerenciamento do TLB pode ser feito pelo sistema operacional. Quando há um **TLB Miss**, a MMU gera uma interrupção que é tratada pelo sistema operacional.
- **Passos**:
    1. O SO encontra a página na tabela de páginas.
    2. Remove uma entrada antiga do TLB, se necessário.
    3. Adiciona a nova entrada no TLB.
    4. Reinicia a instrução que causou a falta de página.
- **Vantagens**: Reduz a complexidade do hardware, permitindo mais espaço para caches e outros recursos.
- 
![[Pasted image 20240804192823.png]]

### 2. Gerenciamento de Grandes Tabelas de Páginas

#### Desafio

Com endereços virtuais de 32 bits e tamanhos de página de 4 KB, a tabela de páginas pode ter aproximadamente 1 milhão de entradas. Armazenar e acessar uma tabela de páginas tão grande pode ser lento e ineficiente.

#### Soluções

Existem várias abordagens para gerenciar eficientemente grandes tabelas de páginas:

##### a) **Tabelas de Páginas em Memória Principal**

- **Registrador Único**: Um registrador de hardware aponta para o início da tabela de páginas na memória principal. Isso simplifica a troca de contexto, pois o sistema operacional só precisa atualizar esse registrador.
- **Desvantagem**: Cada acesso de memória requer duas operações: uma para acessar a entrada da tabela de páginas e outra para acessar o dado.

##### b) **Tabelas de Páginas Hierárquicas**

Para evitar o armazenamento de uma tabela de páginas enorme em um único local, as tabelas de páginas podem ser estruturadas hierarquicamente:

- **Tabela de Páginas de Níveis**: Dividir a tabela em vários níveis, onde a primeira tabela aponta para outras tabelas que contêm as entradas reais. Isso reduz a quantidade de memória necessária para armazenar tabelas de páginas, especialmente quando muitos espaços de endereçamento estão vazios.
- **Página Diretória e Tabela de Páginas**: Um exemplo comum é dividir o espaço de endereçamento virtual em várias partes, cada uma apontando para uma tabela de páginas que gerencia uma parte específica do espaço de endereçamento.

##### c) **Tabela de Páginas Invertida**

- Uma **tabela de páginas invertida** usa uma abordagem diferente, armazenando uma entrada para cada quadro de página físico, em vez de cada página virtual. Cada entrada contém o número da página virtual e o identificador do processo que está usando essa página. Essa abordagem é eficiente em termos de espaço, mas pode ser mais lenta para encontrar mapeamentos.

### 3. Troca de Contexto e Tabelas de Páginas

Quando o sistema alterna entre diferentes processos, é necessário mudar a tabela de páginas, o que pode ser feito de duas maneiras:

- **Registradores de Hardware para Tabela de Páginas**: Cada processo tem sua própria tabela de páginas carregada em registradores rápidos, o que é eficiente, mas caro em termos de hardware.
- **Tabela de Páginas na Memória**: Apenas o registrador que aponta para a tabela de páginas é atualizado, tornando a troca de contexto mais eficiente.
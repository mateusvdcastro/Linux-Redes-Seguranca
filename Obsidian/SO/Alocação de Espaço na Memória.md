#### Alocação Não Contígua - Segmentação

**Segmentação** é um esquema de gerenciamento de memória que reflete a estrutura lógica de um programa. Em vez de dividir a memória em blocos de tamanho fixo, a segmentação permite que a memória seja alocada com base em diferentes segmentos, que representam diferentes partes ou módulos de um programa.

**Como Funciona**:

- Um programa é dividido em segmentos lógicos, como código, variáveis globais, heap, pilhas de threads e bibliotecas.
- Cada segmento tem uma tabela de segmento associada, que mapeia os endereços lógicos para endereços físicos na memória.
- Cada entrada na tabela de segmentos contém:
    - **Base**: o endereço físico inicial onde o segmento está na memória.
    - **Limite**: o tamanho do segmento, que define até onde o segmento se estende na memória.

**Vantagens**:

- Permite uma visão lógica da memória, facilitando a proteção e o compartilhamento de segmentos entre processos.
- Aproveita a modularidade do programa, permitindo que segmentos cresçam ou diminuam dinamicamente.

**Exemplo**:

- Um compilador C pode criar segmentos separados para o código, variáveis globais, heap, pilhas de threads e biblioteca C padrão. Cada um desses segmentos pode ser carregado em partes diferentes da memória física, não necessitando de contiguidade.

#### Alocação Não Contígua - Paginação

#paginação

**Paginação** é uma técnica que resolve alguns dos problemas da segmentação, como a fragmentação externa e a necessidade de acomodar blocos de tamanho variável na memória.

**Como Funciona**:

- A memória física é dividida em pequenos blocos de tamanho fixo chamados **quadros** (ou **frames**), definidos pelo hardware.
- A memória lógica (endereços gerados pelo programa) é também dividida em blocos de mesmo tamanho chamados **páginas**.
- Quando a CPU gera um endereço lógico, ele é dividido em duas partes:
    - **Número de página (p)**: usado para indexar uma **tabela de páginas**, que contém o endereço base de cada página na memória física.
    - **Offset (deslocamento d)**: combinado com o endereço base, define o endereço físico exato que é enviado para a memória.

**Exemplo**:

- Para acessar um endereço lógico, a CPU divide o endereço em número de página e offset. Por exemplo, para um tamanho de página de 4 bytes e uma memória física de 32 bytes, se o endereço lógico é 0, ele corresponde ao quadro 5 na tabela de páginas e, portanto, ao endereço físico 20. Para o endereço lógico 13, o quadro correspondente é o 2 e o endereço físico é 9.

**Vantagens**:

- Elimina a fragmentação externa, pois as páginas e quadros são de tamanho fixo.
- Facilita o gerenciamento de memória, pois permite que páginas de processos diferentes possam estar espalhadas pela memória física.

**Fragmentação Interna na Paginação**:

- Apesar de resolver a fragmentação externa, a paginação pode sofrer de fragmentação interna, pois o último quadro de um processo pode não ser totalmente utilizado. Por exemplo, se um processo precisa de 72.766 bytes e cada página tem 2.048 bytes, serão necessárias 36 páginas (35 completas e 1 parcial). A última página terá apenas 1.086 bytes utilizados, deixando os restantes 962 bytes como fragmentação interna.

**Gerenciamento das Tabelas de Páginas**:

- Cada processo possui sua própria tabela de páginas, que é gerenciada pelo sistema operacional.
- O sistema operacional também gerencia uma tabela de quadros para acompanhar quais quadros estão ocupados e quais estão livres.

![[Pasted image 20240804165351.png]]

![[Pasted image 20240804165324.png]]

![[Pasted image 20240804165257.png]]

**Q)** Considere uma memória paginada, com espaço de endereçamento lógico de 8 páginas, cada uma com 4096 endereços. Nesse caso, a memória física possui 64 quadros. Com relação ao tamanho dos endereços lógicos e físicos, assinale a alternativa correta. 
a) Endereço Lógico possui 15 bits e Endereço Físico possui 18 bits. 
b) Endereço Lógico possui 15 bits e Endereço Físico possui 12 bits. 
c) Endereço Lógico possui 13 bits e Endereço Físico possui 18 bits. 
d) Endereço Lógico possui 12 bits e Endereço Físico possui 18 bits.
e) Endereço Lógico possui 12 bits e Endereço Físico possui 12 bits.


![[Pasted image 20240804165815.png]]

## [[Paginação]]

A paginação é uma técnica de gerenciamento de memória usada para implementar a memória virtual, permitindo que os programas vejam um espaço de endereçamento contínuo, mesmo que a memória física seja fragmentada. Aqui está uma explicação detalhada dos principais conceitos:


**Fragmentação de memória** ocorre quando o uso da memória não é otimizado, resultando em partes de memória que não podem ser usadas de forma eficiente. Existem dois tipos principais de fragmentação: **interna** e **externa**.


![[Pasted image 20240804161404.png]]

#### Fragmentação Interna

**Definição**:

- A fragmentação interna acontece quando a memória alocada para um processo é ligeiramente maior do que o necessário. Esse excesso de espaço não pode ser usado por outros processos, resultando em desperdício.

**Exemplo**:

- Imagine que um sistema operacional aloca memória em blocos de 4 KB. Se um processo B precisa de 3.8 KB de memória, ele receberá um bloco de 4 KB. Os 0.2 KB restantes no bloco não podem ser utilizados para outros processos, representando fragmentação interna.

**Causa**:

- A fragmentação interna é causada pelo fato de que a alocação de memória é feita em tamanhos fixos (partições ou blocos), mas o uso real da memória pelos processos pode não se alinhar exatamente a esses tamanhos.

**Efeitos**:

- Mesmo pequenas quantidades de memória desperdiçada em cada bloco podem se somar a uma quantidade significativa, especialmente em sistemas com muitos processos.

#### Fragmentação Externa

#fragmentaçãoexterna

**Definição**:

- A fragmentação externa ocorre quando há espaço livre suficiente na memória total, mas ele está espalhado em pequenos blocos que não são contíguos. Como resultado, não é possível alocar memória para um novo processo mesmo que o espaço total livre seja suficiente.

**Exemplo**:

- Suponha que um sistema tenha vários processos carregados e que, ao longo do tempo, processos sejam encerrados e novos sejam iniciados. Isso pode levar a uma situação em que há 100 MB de memória livre total, mas esses 100 MB estão divididos em vários blocos pequenos, como 30 MB, 25 MB, 20 MB, 15 MB, etc. Se um processo D precisar de 80 MB de memória contígua, ele não poderá ser alocado, apesar de haver memória livre suficiente no total.

**Causa**:

- A fragmentação externa ocorre devido à alocação dinâmica e liberação de memória, que deixa buracos ou espaços livres de tamanhos variados entre os blocos de memória ocupados.

**Efeitos**:

- A fragmentação externa pode reduzir a eficiência do uso da memória e, em casos extremos, impedir que novos processos sejam iniciados mesmo que a soma total da memória livre seja suficiente.

#### Soluções para a Fragmentação

1. **Compactação de Memória**:
    
    - Movendo processos na memória para eliminar pequenos espaços livres e criar um bloco maior de memória contígua. É uma solução para a fragmentação externa, mas pode ser computacionalmente cara.
2. **Alocação de Memória com Partições Variáveis**:
    
    - Em vez de alocar memória em blocos de tamanho fixo, o sistema operacional pode tentar ajustar o tamanho do bloco ao tamanho solicitado pelo processo. Isso pode reduzir a fragmentação interna.
3. **Uso de Técnicas Avançadas de Gerenciamento de Memória**:
    
    - Técnicas como paginação e segmentação podem ajudar a mitigar problemas de fragmentação, embora possam introduzir sua própria complexidade e sobrecarga.

A fragmentação de memória é uma questão importante no gerenciamento de memória em sistemas operacionais, pois afeta diretamente a eficiência com que a memória é utilizada e a capacidade do sistema de lidar com múltiplos processos simultaneamente.
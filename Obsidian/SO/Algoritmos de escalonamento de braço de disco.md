Os algoritmos de escalonamento de braço de disco são técnicas utilizadas para determinar a ordem na qual as requisições de leitura e escrita no disco rígido são atendidas. Como os discos rígidos têm cabeçotes de leitura/escrita que se movem fisicamente sobre os pratos do disco para acessar diferentes faixas de dados, o objetivo principal desses algoritmos é minimizar o movimento do braço do disco (e, portanto, o tempo de busca) e otimizar o desempenho geral do sistema. Vamos detalhar os principais algoritmos de escalonamento de braço de disco:

O tempo necessário para ler ou escrever um bloco de disco é determinado por três fatores:
1. Tempo de busca (o tempo para mover o braço para o cilindro correto).
2. Atraso de rotação (o tempo necessário para o setor correto aparecer sob o cabeçote).
3. Tempo de transferência real do dado.

### 1. **First-Come, First-Served (FCFS)**

- **Descrição**: Se o driver do disco aceita as solicitações uma de cada vez e as atende nessa ordem, o algoritmo FCFS processa as requisições na ordem em que elas chegam, sem qualquer priorização ou otimização adicional.
- **Vantagens**:
    - Simples de implementar.
    - Justo, pois trata as requisições na ordem de chegada.
- **Desvantagens**:
    - Não é eficiente, pois não considera a posição atual do braço do disco. Pode causar um grande movimento de busca, aumentando o tempo total de acesso ao disco.
    - Pode levar ao problema de _starvation_ (inanição) se uma requisição estiver muito distante de outras.

### 2. **Shortest Seek Time First (SSTF)**

- **Descrição**: O algoritmo SSTF seleciona a requisição mais próxima da posição atual do braço do disco, minimizando o tempo de busca para cada operação.
- **Vantagens**:
    - Menor tempo médio de busca comparado ao FCFS, pois o braço do disco percorre distâncias menores.
- **Desvantagens**:
    - Pode levar a _starvation_ de requisições que estão mais distantes, pois o braço pode ficar "preso" servindo requisições próximas.
    - Complexidade maior na implementação, pois precisa calcular a distância de busca para cada requisição.

### 3. **Elevator Algorithm ou SCAN (ou Algoritmo do Elevador)**

- **Descrição**: O algoritmo SCAN, também conhecido como algoritmo do elevador, movimenta o braço do disco numa direção até chegar à última requisição naquela direção, e então inverte a direção e continua o processo. Funciona de forma semelhante ao movimento de um elevador que sobe e desce atendendo aos pedidos nos andares. Exige que o software mantenha 1 bit: o bit de direção atual, SOBE ou DESCE. Quando uma solicitação é concluída, o driver do disco ou elevador verifica o bit. Se ele for SOBE, o braço ou a cabine se move para a próxima solicitação pendente mais alta. Se nenhuma solicitação estiver pendente em posições mais altas, o bit de direção é invertido. Quando o bit contém DESCE, o movimento será para a posição solicitada seguinte mais baixa, se houver alguma. Se nenhuma solicitação estiver pendente, ele simplesmente para e espera.
- **Vantagens**:
    - Minimiza o tempo de busca ao atender as requisições em ambas as direções de movimento do braço.
    - Reduz o problema de _starvation_, pois todas as requisições eventualmente são atendidas.
- **Desvantagens**:
    - O tempo de espera pode ser desigual, dependendo da direção em que o braço está se movendo.
![[Pasted image 20240826133641.png]]

### 4. **C-SCAN (Circular SCAN)**

- **Descrição**: O C-SCAN é uma variação do SCAN. O braço do disco se move em uma direção, atendendo todas as requisições até chegar ao final do disco. Em vez de inverter a direção, ele volta imediatamente para o início do disco e começa a atender novamente as requisições.
- **Vantagens**:
    - Oferece um tempo de espera mais uniforme para todas as requisições, independentemente da posição no disco.
    - Elimina o problema de requisições que podem ter tempos de espera maiores, como acontece no SCAN.
- **Desvantagens**:
    - Pode haver um aumento no movimento do braço quando ele retorna do final do disco para o início sem atender requisições.

### 5. **LOOK e C-LOOK**

- **Descrição**: O LOOK e o C-LOOK são variações dos algoritmos SCAN e C-SCAN, respectivamente. A diferença é que o braço do disco não vai até o final físico do disco; em vez disso, ele para no último pedido na direção atual e, em seguida, inverte a direção (LOOK) ou retorna ao início (C-LOOK).
- **Vantagens**:
    - Reduz o movimento desnecessário do braço do disco comparado ao SCAN e C-SCAN.
    - Mantém as vantagens de minimização do tempo de busca e uniformidade no tempo de espera.
- **Desvantagens**:
    - Semelhante ao SCAN e C-SCAN, o tempo de retorno ao início (para C-LOOK) pode ser visto como uma desvantagem em termos de eficiência.

### 6. **Algoritmo de N-Step SCAN**

- **Descrição**: Este é um aprimoramento do algoritmo SCAN que divide a lista de pedidos em sub-listas de tamanho fixo (N). Cada sub-lista é processada completamente antes de passar para a próxima.
- **Vantagens**:
    - Evita que novas requisições interfiram continuamente no processamento das requisições já na fila.
    - Melhora a previsibilidade do tempo de resposta.
- **Desvantagens**:
    - Requer gerenciamento adicional para dividir e gerenciar sub-listas de requisições.

### 7. **Algoritmo FSCAN**

- **Descrição**: O algoritmo FSCAN usa duas listas para armazenar requisições pendentes. Enquanto uma lista é processada, todas as novas requisições são colocadas na segunda lista. Uma vez que a primeira lista é completamente processada, o algoritmo passa para a segunda lista.
- **Vantagens**:
    - Evita que novas requisições influenciem imediatamente o comportamento do braço do disco, melhorando a eficiência e a previsibilidade.
- **Desvantagens**:
    - Requer a manutenção de múltiplas listas e gerenciamento adicional.


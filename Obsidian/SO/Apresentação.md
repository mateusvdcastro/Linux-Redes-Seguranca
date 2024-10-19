As **trilhas** são anéis concêntricos desenhados na superfície de um disco magnético. Imagine as trilhas como círculos que se estendem ao redor do disco, desde o centro até a borda, como os anéis de uma árvore.

Cada superfície de um prato magnético no disco possui um cabeçote associado a ele.

 Um **cilindro** é um conceito lógico que agrupa todas as trilhas que estão localizadas na mesma posição em diferentes pratos de um disco rígido. Por exemplo, se um disco rígido tem quatro pratos, um cilindro consiste nas quatro trilhas que estão diretamente uma acima da outra (uma trilha por prato, no mesmo raio).

## Controlador:
Ele interpreta os comandos enviados pelo controlador de disco na placa mãe e os converte em operações específicas de leitura e gravação no disco rígido.

Ele utiliza interfaces padrão de comunicação, como SATA (Serial ATA), PATA (Parallel ATA, também conhecido como IDE), SCSI, ou NVMe, para se conectar à placa-mãe.

**Conversão de Dados** (converte os dados digitais recebidos do computador em sinais analógicos que podem ser usados para magnetizar as superfícies dos pratos) 

**Gerenciamento de Movimentação do Cabeçote** (Ele usa um atuador para mover o braço do cabeçote para a trilha correta)

**Cache de Dados** ( 8 MB e 256 MB nos HDs tradicionais), que é usada para armazenar temporariamente os dados frequentemente acessados ou os dados que estão prestes a ser gravados)

**Gerenciamento de Erros:** (Algoritmos)

 **Buscas Sobrepostas (Overlapped Seeks)**:
 Em sistemas com mais de um disco rígido (ou unidades de disco), cada disco pode realizar uma operação de busca independentemente.
	**Busca (Seek):** Quando um disco rígido precisa acessar dados armazenados em uma trilha diferente da atua
	**Tempo de Busca:** O tempo que o cabeçote leva para se mover de uma trilha para outra
	Paralelismo em Operações de Busca e Redução do Tempo Médio de Acesso

## Limitações e Ponto de Sincronização
**Transferência para o Buffer de Memória do Controlador:** Cada disco pode buscar dados de forma independente e simultânea. No entanto, **a transferência de dados do disco para o buffer de memória do controlador de disco** é o ponto onde o paralelismo pode ser limitado. 

**Memória Principal:** Mesmo que múltiplos discos possam buscar dados simultaneamente, **apenas uma operação de transferência de dados entre o controlador de disco e a memória principal (RAM) do computador pode ocorrer de cada vez**. Isso significa que, quando os dados precisam ser movidos do buffer do controlador para a memória principal, esse processo deve ser feito em série (um de cada vez).

## Implicações para o Driver do Disco

 **Gerenciamento de Filas de Solicitação:** O driver deve manter uma fila de solicitações de E/S (entrada/saída) que podem ser atendidas em paralelo (quando se referem a discos diferentes) ou em série (para o mesmo disco ou durante a transferência para a memória principal).
 
**Coordenação de Transferências:** O driver deve garantir que, embora os discos possam buscar dados simultaneamente, as transferências de dados para a memória principal sejam coordenadas para evitar conflitos e garantir a integridade dos dados.

## CHS

O controlador então realiza um remapeamento de uma solicitação para (x, y, z) no cilindro, cabeçote e setor real
## LBA
Para esconder os detalhes de quantos setores tem cada trilha, a maioria dos discos modernos tem uma geometria virtual.

O LBA é uma forma simplificada e moderna de endereçar dados, que substituiu o antigo método de endereçamento baseado em CHS (Cilindro-Cabeçote-Setor).

O método CHS era limitado pelo número máximo de cilindros, cabeçotes e setores que poderia endereçar.  O LBA é escalável para discos de tamanhos muito maiores do que os antigos métodos de CHS poderiam suportar.

## Raid

RAID é instalar uma caixa cheia de discos junto ao computador, em geral um grande servidor, substituir a placa controladora de disco com um controlador RAID, copiar os dados para o RAID

#HD_Raid_0: Suponha o caso em que tenho 2 HD 's de 1TB. Em raid 0 o SO vai identificar esses dois HD 's como sendo um só. Ou seja, a partição c:/ verá como 2TB de armazenamento. No caso do Raid 0 temos maior performance, pois como os programas no computador são armazenados em blocos no HD, a tabela de particionamento pode guardar o A, C, E, G no HD 1 e B, D, F, H no HD 2. Desta forma, temos o dobro do armazenamento mas também o dobro da performance de leitura e escrita. O problema está na segurança, se o HD 1 der defeito, e todos os arquivos forem perdidos, você tem perda de dados em um programa.

#HD_Raid_1:  Neste caso, se tivermos 2 HDs de 1TB. O SO verá ambos como um sendo o espelho do outro. Assim, teremos a performance de um único HD, pois toda informação escrita em um será escrita no outro, mas o desempenho de leitura pode ser duas vezes melhor. A vantagem deste, é que caso haja perda de um HD o usuário não sentirá falta. Basta trocar o HD com problema e no próximo boot o SO irá copiar tudo de um HD para o outro. 


#HD_raid_2

O RAID nível 2 diferentemente de outros níveis de RAID que operam com blocos de dados, o RAID 2 trabalha com bits individuais ou pequenos grupos de bits. Ele funciona dividindo os dados a serem armazenados em unidades menores, como bytes ou palavras. Por exemplo, cada byte de dados (composto por 8 bits) pode ser dividido em dois pedaços de 4 bits. Para cada pedaço de 4 bits, um código de Hamming é calculado, adicionando 3 bits adicionais de paridade, resultando em um total de 7 bits (4 bits de dados mais 3 de paridade). 

Esses 7 bits são então distribuídos por 7 discos diferentes, com cada disco armazenando um bit específico. Os discos são sincronizados tanto na posição do braço de leitura/escrita quanto na posição rotacional, garantindo que todos os bits da palavra sejam escritos ou lidos simultaneamente. 

Essa sincronização precisa permite que o RAID 2 detecte e corrija erros em qualquer um dos bits armazenados; se um disco falhar ou um bit for corrompido, o código de Hamming pode identificar e corrigir o erro com base nas informações redundantes armazenadas nos bits de paridade dos outros discos. 

Embora o RAID 2 ofereça uma excelente proteção contra erros e um alto nível de redundância, sua complexidade e dependência de sincronização rigorosa tornam sua implementação custosa, e esse esquema exige que todos os discos tenham suas rotações sincronizadas. 

#HD_raid_3
O RAID 3 utiliza um único disco dedicado exclusivamente à paridade. Em um sistema RAID 3

o número de operações de entrada/saída (E/S) separadas que ele pode processar por segundo não é superior ao de um único disco. Isso ocorre porque o disco de paridade se torna um gargalo quando múltiplos acessos a dados ocorrem simultaneamente, pois ele precisa calcular e verificar a paridade para cada operação..

#HD_Raid_5 
RAID nível 5 distribuindo os bits de paridade uniformemente por todos os discos, de modo circular (round-robin), como mostrado na Figura 5.20(f). No entanto, caso ocorra uma quebra do disco, a reconstrução do disco falhado é um processo complexo. (É possível fazer um NAS (Network Attached Storage), em que 4 HDs ficam ligados e um quinto fica off em Cold Spare. Vamos enxergar os 4 HDs como um único. Assim, se um HD morrer por deterioração ou outros motivos, o quinto HD será substituído pelo que falhou e o controlador do Raid vai reconstruir os dados com base dos bits de paridade/redundantes dos outros 3 HDs com a adição da tecnologia spare).


#HD_Raid_6 

O RAID nível 6 é uma extensão do RAID nível 5 e oferece uma camada adicional de proteção contra falhas de disco. A principal vantagem do RAID 6 é a **aumentada confiabilidade**. Com dois blocos de paridade, o RAID 6 pode suportar a falha de até dois discos simultaneamente sem perda de dados.

## Formatação de Discos

Este preâmbulo é essencial para que o hardware reconheça o início do setor. Além de marcar o início do setor, o preâmbulo também inclui informações como números do cilindro e do setor, que ajudam a localizar os dados no disco.

Dentro de cada setor, há um **campo ECC (Código de Correção de Erros)**. Esse campo contém dados redundantes que são usados para detectar e corrigir erros de leitura. 

**Deslocamento de Cilindro (Cylinder Skew)**:
    Os setores são deslocados em cada trilha para alinhar o setor 0 de cada trilha de modo a otimizar a leitura contínua e evitar rotações desnecessárias.


Por exemplo, considere um disco cuja capacidade não formatada é de **200 × 10^9 bytes**. Ele poderia ser vendido como um disco de **200 GB**. No entanto, após a formatação, possivelmente apenas **170 × 10^9 bytes** estarão disponíveis para armazenamento de dados. Para complicar ainda mais, o sistema operacional provavelmente relatará essa capacidade como **158 GB**, e não **170 GB**, pois o software considera que **1 GB** é igual a **2^30 bytes (1.073.741.824 bytes)**, e não **10^9 bytes (1.000.000.000 bytes)**.

**Formatação e Partição**

Após a formatação de baixo nível, o disco é dividido em partições, que podem ser usadas por múltiplos sistemas operacionais ou para áreas de troca (swap).

**Registro Mestre de Inicialização (MBR) e Tabela de Partição GUID (GPT)**:
    O MBR contém a tabela de partições e um código de inicialização. Suporta até quatro partições primárias e discos de até 2 TB.
    O GPT é um esquema mais moderno que suporta discos muito maiores, até 9,4 ZB, e é usado em sistemas operacionais modernos para superar as limitações do MBR.

- **Taxa de Dados e Entrelaçamento de Setores**:
	- O entrelaçamento simples e o entrelaçamento duplo são técnicas utilizadas na formatação de discos rígidos para melhorar o desempenho de leitura dos dados. Ambas as técnicas lidam com a maneira como os setores de um disco são numerados e organizados, de modo a evitar perdas de desempenho causadas pelo tempo de latência rotacional durante a leitura sequencial dos setores.
    - A formatação de baixo nível pode incluir entrelaçamento de setores para compensar tempos de transferência para a memória, melhorando o desempenho da leitura.
    - Controladores modernos têm buffers maiores, permitindo o armazenamento de trilhas inteiras e eliminando a necessidade de entrelaçamento.

**Mapeamento de Setores Defeituosos**

- **Identificação e Substituição de Setores Defeituosos**: Durante a fabricação e uso do disco, setores defeituosos são identificados e substituídos por setores sobressalentes (reservados). O controlador do disco armazena uma lista dos setores defeituosos e redireciona automaticamente todas as operações de leitura/gravação para os setores sobressalentes.
- **Reformatação e Reatribuição**: Em alguns casos, uma reformatação de baixo nível pode ser usada para mapear novamente setores defeituosos, alocando setores sobressalentes para substituir os defeituosos identificados.

 **Tratamento de Erros com Reescrita de Dados e Retransmissão**

- **Reescrita de Dados**: Quando um erro de leitura é detectado e não pode ser corrigido pelo ECC, o disco tenta ler o mesmo setor várias vezes. Se o erro for temporário (por exemplo, causado por poeira ou uma leve desmagnetização), a leitura repetida pode eventualmente ter sucesso.
- **Retransmissão de Dados**: Em sistemas onde os discos estão configurados em RAID (Matriz Redundante de Discos Independentes), dados perdidos ou corrompidos podem ser retransmitidos de outros discos na matriz, utilizando dados de paridade para reconstruir o conteúdo original.

## Armazenamento Estável

Na Figura 5.27(a), a falha da CPU ocorre antes que qualquer uma das cópias do bloco seja escrita. Durante a recuperação, nenhuma das cópias será alterada, e o valor antigo permanecerá intacto, o que é permitido.

Na Figura 5.27(b), a CPU falha durante a escrita na unidade 1, corrompendo o conteúdo do bloco. No entanto, o programa de recuperação detecta o erro e restaura o bloco na unidade 1 a partir da cópia na unidade 2. Dessa forma, o efeito da falha é eliminado e o estado antigo é completamente restaurado.

Na Figura 5.27(c), a falha da CPU ocorre após a escrita na unidade 1, mas antes da escrita na unidade 2. Neste ponto, o programa de recuperação copia o bloco da unidade 1 para a unidade 2, completando a escrita com sucesso.

A Figura 5.27(d) é semelhante à Figura 5.27(b): durante a recuperação, o bloco íntegro é copiado sobre o bloco corrompido. Assim, o valor final de ambos os blocos é o novo.

Finalmente, na Figura 5.27(e), o programa de recuperação verifica que ambos os blocos estão idênticos, portanto, nenhum deles é modificado, e a escrita é bem-sucedida também neste caso
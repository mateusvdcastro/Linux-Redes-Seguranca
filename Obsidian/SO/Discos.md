
Pág. 274 Tanenbaum
## Discos Magnéticos

Cada disco possui dois lados, e pode ser escrito dados em ambos. Portanto, temos duas cabeças para cada disco, em cima e embaixo.

![[Pasted image 20240824154050.png]]

### 1. Trilhas

- **Definição:** As **trilhas** são anéis concêntricos desenhados na superfície de um disco magnético. Imagine as trilhas como círculos que se estendem ao redor do disco, desde o centro até a borda, como os anéis de uma árvore.
    
- **Função:** Cada trilha é usada para armazenar dados. Ao girar o disco, o cabeçote de leitura/gravação pode acessar qualquer ponto ao longo de uma trilha para ler ou gravar dados.

### 2. Cabeçotes

- **Definição:** Os **cabeçotes de leitura/gravação** são os componentes físicos que leem e escrevem dados nas trilhas do disco. Cada superfície de um prato magnético no disco possui um cabeçote associado a ele.
    
- **Funcionamento:** O cabeçote flutua muito perto da superfície do disco sem tocá-la (no caso dos HDs) e se move radialmente (do centro para a borda) para alcançar diferentes trilhas conforme o disco gira. Durante a operação de leitura ou gravação, o cabeçote permanece em uma posição fixa em uma trilha específica e lê ou grava dados conforme o disco gira sob ele.
    
- **Organização:** Em um disco rígido com vários pratos empilhados (camadas de discos), cada prato tem um cabeçote de leitura/gravação de cada lado, controlado por um braço que se move para acessar diferentes trilhas.
[[Gravação Magnética]]
### 3. Cilindros

- **Definição:** Um **cilindro** é um conceito lógico que agrupa todas as trilhas que estão localizadas na mesma posição em diferentes pratos de um disco rígido. Por exemplo, se um disco rígido tem quatro pratos, um cilindro consiste nas quatro trilhas que estão diretamente uma acima da outra (uma trilha por prato, no mesmo raio).
    
- **Visualização:** Imagine empilhar vários discos de vinil (ou CD) uns sobre os outros. Cada círculo na mesma posição em todos os discos representa um "cilindro". Assim, um cilindro é um conjunto de trilhas verticalmente alinhadas ao longo de todos os pratos do disco.
    
- **Uso:** O conceito de cilindro é útil porque, durante a leitura e gravação, o sistema pode acessar dados em diferentes superfícies sem mover o braço do cabeçote para outra posição radialmente. Os cabeçotes simplesmente trocam de superfície, o que é muito mais rápido do que mover o braço inteiro radialmente para encontrar uma nova trilha.

#### 4. Controlador

O controlador de disco atua como intermediário entre o disco rígido e o computador. Ele interpreta os comandos enviados pelo controlador de disco na placa mãe e os converte em operações específicas de leitura e gravação no disco rígido.

Ele utiliza interfaces padrão de comunicação, como SATA (Serial ATA), PATA (Parallel ATA, também conhecido como IDE), SCSI, ou NVMe, para se conectar à placa-mãe.

- **Conversão de Dados:**
    
    - O controlador de disco converte os dados digitais recebidos do computador em sinais analógicos que podem ser usados para magnetizar as superfícies dos pratos do HD durante uma operação de gravação.
    - Durante a leitura, ele converte os sinais analógicos (gerados pela variação do campo magnético ao passar pela cabeça de leitura) de volta em dados digitais que o computador pode processar.
- **Gerenciamento de Movimentação do Cabeçote:**
    
    - O controlador também gerencia o movimento do braço do cabeçote de leitura/escrita para que ele se posicione corretamente na trilha e setor desejados.
    - Ele usa um atuador para mover o braço do cabeçote para a trilha correta. Uma vez na trilha certa, o cabeçote de leitura/gravação é ativado para ler ou gravar os dados.
- **Cache de Dados:**
    
    - O controlador de disco geralmente inclui uma pequena quantidade de memória cache (geralmente entre 8 MB e 256 MB nos HDs tradicionais), que é usada para armazenar temporariamente os dados frequentemente acessados ou os dados que estão prestes a ser gravados. Isso melhora o desempenho geral do disco rígido ao reduzir a quantidade de operações de leitura/escrita que precisam ser realizadas diretamente no prato magnético.
- **Gerenciamento de Erros:**
    
    - O controlador de disco também desempenha um papel crítico no **gerenciamento de erros**. Ele verifica a integridade dos dados lidos usando técnicas de verificação de paridade ou códigos de correção de erro (ECC - Error-Correcting Code).
    - Se ocorrer um erro durante a leitura ou gravação, o controlador pode tentar ler ou gravar os dados novamente, usando setores de reserva para armazenar dados, caso um setor original esteja danificado (remapeamento de setores defeituosos).
- **Gerenciamento de Potência:**
    
    - Em sistemas modernos, o controlador de disco pode gerenciar o consumo de energia, colocando o disco rígido em modos de baixa energia quando ele não está em uso. Isso é particularmente útil em dispositivos móveis para prolongar a vida útil da bateria.

### Entendendo Buscas Sobrepostas (Overlapped Seeks)

 Em sistemas com mais de um disco rígido (ou unidades de disco), cada disco pode realizar uma operação de busca independentemente.

#### Como Funciona a Busca em Discos Rígidos?

1. **Busca (Seek):** Quando um disco rígido precisa acessar dados armazenados em uma trilha diferente da atual, o **braço do cabeçote** deve se mover para a nova trilha. Este movimento é conhecido como **busca**.
2. **Tempo de Busca:** O tempo que o cabeçote leva para se mover de uma trilha para outra é chamado de **tempo de busca**. Este tempo é um dos componentes principais do **tempo de acesso** a dados em discos rígidos.

### Benefícios das Buscas Sobrepostas

Quando um controlador de disco suporta buscas sobrepostas, ele pode **iniciar uma busca em um segundo disco enquanto o primeiro disco ainda está executando uma busca** ou outra operação. Isso significa que:

- **Paralelismo em Operações de Busca:** O controlador pode iniciar e gerenciar múltiplas operações de busca simultaneamente em diferentes discos.
- **Redução do Tempo Médio de Acesso:** Porque o controlador pode processar solicitações de múltiplos discos ao mesmo tempo, ele pode **reduzir o tempo médio de espera** para acesso a dados em ambientes de armazenamento intensivo. Em vez de esperar que um disco termine sua operação de busca antes de iniciar outra, o controlador pode otimizar o uso de múltiplos discos em paralelo.

### Limitações e Ponto de Sincronização

Embora as buscas possam ocorrer simultaneamente em diferentes discos, há uma **limitação importante** a ser considerada:

- **Transferência para o Buffer de Memória do Controlador:** Cada disco pode buscar dados de forma independente e simultânea. No entanto, **a transferência de dados do disco para o buffer de memória do controlador de disco** é o ponto onde o paralelismo pode ser limitado. Cada controlador de disco tem um buffer interno (memória cache) que armazena dados temporariamente durante a transferência entre o disco e a memória principal do computador.
- **Transferência entre o Controlador e a Memória Principal:** Mesmo que múltiplos discos possam buscar dados simultaneamente, **apenas uma operação de transferência de dados entre o controlador de disco e a memória principal (RAM) do computador pode ocorrer de cada vez**. Isso significa que, quando os dados precisam ser movidos do buffer do controlador para a memória principal, esse processo deve ser feito em série (um de cada vez).

### Implicações para o Driver do Disco

O driver de dispositivo para o disco rígido (software que gerencia o hardware de disco) precisa ser projetado para lidar com esse tipo de paralelismo e coordenação:

- **Gerenciamento de Filas de Solicitação:** O driver deve manter uma fila de solicitações de E/S (entrada/saída) que podem ser atendidas em paralelo (quando se referem a discos diferentes) ou em série (para o mesmo disco ou durante a transferência para a memória principal).
- **Coordenação de Transferências:** O driver deve garantir que, embora os discos possam buscar dados simultaneamente, as transferências de dados para a memória principal sejam coordenadas para evitar conflitos e garantir a integridade dos dados.

# [[LBA e CHS]]

# [[Raid]]

# [[Formatação de Discos]]

# [[Algoritmos de escalonamento de braço de disco]]
# [[Tratamento de Erros]]


# Armazenamento Estável

**Armazenamento estável** é um conceito fundamental em sistemas de computação que visa garantir a integridade e a durabilidade dos dados, mesmo em casos de falhas no sistema, como quedas de energia, falhas de hardware ou corrupção de dados. Em outras palavras, o armazenamento estável assegura que os dados sejam preservados de maneira consistente e confiável. Quando uma escrita é lançada para ele, o disco ou escreve corretamente os dados ou não faz nada, deixando os dados existentes intactos.

O modelo presume que, quando um disco escreve um bloco (um ou mais setores), ou a escrita está correta ou ela está incorreta e esse erro pode ser detectado em uma leitura subsequente examinando os valores dos campos ECC.

A ideia de armazenamento estável é particularmente importante em sistemas que exigem alta confiabilidade e disponibilidade, como bancos de dados, sistemas de controle industrial, sistemas financeiros e qualquer aplicação crítica onde a perda de dados ou a inconsistência não podem ser toleradas.

#### Componentes do Armazenamento Estável

1. **Escritas Estáveis**:  
    As escritas estáveis garantem que, uma vez que uma operação de escrita é confirmada como concluída, os dados realmente foram armazenados de maneira permanente e não serão perdidos mesmo em caso de falha. Isso normalmente envolve várias camadas de verificação e redundância para garantir que os dados sejam escritos com sucesso. Em alguns sistemas, isso pode incluir:
    
    - **Replicação de dados**: Escrever dados em vários locais, como múltiplos discos ou servidores, para garantir que uma falha em um local não resulte em perda de dados.
    - **Uso de logs de transações**: Antes de modificar o estado do banco de dados ou do sistema de arquivos, as operações de escrita são primeiro registradas em um log, que é mantido em um meio de armazenamento estável. Em caso de falha, o log pode ser usado para recuperar o estado do sistema.
    Uma escrita estável consiste em primeiro escrever um bloco na unidade 1, então lê-lo de volta para verificar que ele foi escrito corretamente. Se ele foi escrito incorretamente, a escrita e a releitura são feitas de novo por n vezes

até que estejam corretas.
1. **Leituras Estáveis**:  
    As leituras estáveis asseguram que, quando dados são lidos, eles são consistentes e precisos, refletindo o estado mais recente dos dados confirmados no armazenamento. Para alcançar leituras estáveis, o sistema pode empregar técnicas como:
    
    - **Mecanismos de bloqueio ou controle de concorrência**: Para garantir que leituras não sejam feitas em dados parcialmente escritos ou em processo de ser modificado.
    - **Checksums e códigos de correção de erros (ECC)**: Para detectar e corrigir erros de dados que possam ocorrer durante a leitura.
    Uma leitura estável primeiro lê o bloco da unidade 1. Se isso produzir um ECC incorreto, a leitura é tentada novamente, até n vezes. Se todas elas derem ECCs defeituosos, o bloco correspondente é lido da unidade 2.
    
1. **Recuperação de Falhas**:  
    Recuperação de falhas é o processo de restaurar o sistema a um estado consistente após uma falha, utilizando os dados que foram escritos de forma estável. Este processo pode incluir:
    a
    - **Uso de logs de transações**: Reversão de transações parcialmente concluídas e reaplicação de transações que foram confirmadas mas não aplicadas devido à falha.
    - **Reconstrução de dados a partir de backups ou cópias de segurança**: Em sistemas que usam técnicas como RAID, onde os dados são espelhados ou distribuídos, é possível reconstruir os dados perdidos a partir dos discos remanescentes.
    Após uma queda do sistema, um programa de recuperação varre ambos os discos comparando blocos correspondentes. Se um par de blocos está bem e ambos são iguais, nada é feito. Se um deles tiver um erro de ECC, o bloco defeituoso é sobrescrito com o bloco bom correspondente. Se um par de blocos está bem mas eles são diferentes, o bloco da unidade 1 é escrito sobre o da unidade 2.

#### Armazenamento não volátil

1. **RAM Não Volátil (NVRAM)**:  
    A RAM não volátil é um tipo de memória que retém os dados mesmo quando não há energia elétrica. Ao contrário da RAM volátil tradicional, que perde seus dados ao ser desligada, a NVRAM usa tecnologias como memória flash, resistiva, magnetoresistiva, ou outras formas de armazenamento para manter a integridade dos dados. Isso faz com que a NVRAM seja ideal para armazenar logs de transação e outras informações críticas que precisam ser preservadas em caso de falha de energia.
    
2. **CMOS (Complementary Metal-Oxide-Semiconductor)**:  
    Em muitos computadores, o CMOS é um pequeno pedaço de memória não volátil que retém informações essenciais sobre a configuração do sistema, como a hora do sistema, configurações de hardware e a sequência de inicialização. Esta memória é mantida com uma pequena bateria, o que permite que o computador retome o estado de configuração correto após ser desligado.

Na ausência de falhas de CPU, esse esquema sem-pre funciona, pois escritas estáveis sempre escrevem duas cópias válidas de cada bloco e erros espontâneos são presumidos que jamais ocorram em ambos os blocos correspondentes ao mesmo tempo. E na presença de falhas na CPU durante escritas estáveis?

![[Pasted image 20240826153437.png]]

Na Figura 5.27(a), a falha da CPU ocorre antes que qualquer uma das cópias do bloco seja escrita. Durante a recuperação, nenhuma das cópias será alterada, e o valor antigo permanecerá intacto, o que é permitido.

Na Figura 5.27(b), a CPU falha durante a escrita na unidade 1, corrompendo o conteúdo do bloco. No entanto, o programa de recuperação detecta o erro e restaura o bloco na unidade 1 a partir da cópia na unidade 2. Dessa forma, o efeito da falha é eliminado e o estado antigo é completamente restaurado.

Na Figura 5.27(c), a falha da CPU ocorre após a escrita na unidade 1, mas antes da escrita na unidade 2. Neste ponto, o programa de recuperação copia o bloco da unidade 1 para a unidade 2, completando a escrita com sucesso.

A Figura 5.27(d) é semelhante à Figura 5.27(b): durante a recuperação, o bloco íntegro é copiado sobre o bloco corrompido. Assim, o valor final de ambos os blocos é o novo.

Finalmente, na Figura 5.27(e), o programa de recuperação verifica que ambos os blocos estão idênticos, portanto, nenhum deles é modificado, e a escrita é bem-sucedida também neste caso
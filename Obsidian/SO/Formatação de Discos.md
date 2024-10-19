
Após a fabricação, o disco rígido não contém dados e deve passar por um processo de formatação de baixo nível antes de ser utilizado. Este processo de formatação é realizado por software e envolve a criação de uma estrutura organizada de dados no disco. Especificamente, a formatação de baixo nível organiza o disco em:

- **Trilhas Concêntricas:** Essas são faixas circulares que se estendem ao longo da superfície do prato. Cada prato tem várias trilhas, e elas são organizadas de forma concêntrica em relação ao centro do disco.
- **Setores:** Cada trilha é dividida em setores, que são as unidades básicas de armazenamento. O formato e o tamanho dos setores são definidos durante a formatação. A maioria dos discos rígidos utiliza setores com 512 bytes de tamanho.

Cada setor tem um **preâmbulo** que contém um padrão de bits específico. Este preâmbulo é essencial para que o hardware reconheça o início do setor. Além de marcar o início do setor, o preâmbulo também inclui informações como números do cilindro e do setor, que ajudam a localizar os dados no disco.

![[Pasted image 20240824195100.png]]

Dentro de cada setor, há um **campo ECC (Código de Correção de Erros)**. Esse campo contém dados redundantes que são usados para detectar e corrigir erros de leitura. O tamanho e o conteúdo do campo ECC podem variar entre os fabricantes, dependendo de quanto espaço de disco eles estão dispostos a usar para garantir maior confiabilidade e do nível de complexidade do código ECC que o controlador pode processar. Um campo ECC de 16 bytes é comum, mas o tamanho pode variar.

Além disso, os discos rígidos incluem **setores sobressalentes**. Estes setores adicionais são alocados para substituir setores defeituosos que podem ser encontrados durante a fabricação ou operação do disco. Os setores sobressalentes garantem que o disco continue funcionando corretamente, mesmo se alguns setores originais apresentarem defeitos.

![[Pasted image 20240824194434.png]]


- **Deslocamento de Cilindro (Cylinder Skew)**:
    
    - Os setores são deslocados em cada trilha para alinhar o setor 0 de cada trilha de modo a otimizar a leitura contínua e evitar rotações desnecessárias.
    - Permite leitura de múltiplas trilhas em uma operação contínua sem perda de dados.
    - A quantidade de deslocamento depende da geometria do disco, como a rotação por minuto (RPM) e o tempo de busca de trilhas.
    
![[Pasted image 20240826170350.png]]
- **Capacidade de Disco**:
    
    - A capacidade de um disco rígido é frequentemente menor após a formatação devido ao espaço necessário para preâmbulos, intervalos entre setores, ECC (Código de Correção de Erros) e setores sobressalentes.
    - Existe uma diferença entre a capacidade anunciada (capacidade não formatada) e a capacidade real utilizável (capacidade formatada).
    - Conflito de medidas: fabricantes usam 1 GB = 10^9 bytes, enquanto sistemas operacionais consideram 1 GB = 2^30 bytes (1 GiB).
    
Há uma considerável confusão sobre a capacidade de armazenamento dos discos rígidos porque alguns fabricantes anunciam a capacidade **não formatada** para fazer com que seus discos pareçam maiores do que realmente são. Por exemplo, considere um disco cuja capacidade não formatada é de **200 × 10^9 bytes**. Ele poderia ser vendido como um disco de **200 GB**. No entanto, após a formatação, possivelmente apenas **170 × 10^9 bytes** estarão disponíveis para armazenamento de dados. Para complicar ainda mais, o sistema operacional provavelmente relatará essa capacidade como **158 GB**, e não **170 GB**, pois o software considera que **1 GB** é igual a **2^30 bytes (1.073.741.824 bytes)**, e não **10^9 bytes (1.000.000.000 bytes)**. Para evitar essa confusão, seria mais apropriado relatar a capacidade como **158 GiB**.

Além disso, no mundo das comunicações de dados, **1 Gbps** significa **1 bilhão de bits por segundo**, porque o prefixo "giga" realmente significa **10^9** (assim como um quilômetro tem **1.000 metros**, e não **1.024 metros**). Somente no contexto de tamanhos de memória e armazenamento de disco, as medidas "quilo", "mega", "giga" e "tera" são interpretadas como **2^10, 2^20, 2^30 e 2^40**, respectivamente.

Para evitar essa confusão, alguns autores usam os prefixos **quilo, mega, giga** e **tera** para representar **10^3, 10^6, 10^9** e **10^12**, respectivamente, e utilizam os termos **kibi, mebi, gibi** e **tebi** para representar **2^10, 2^20, 2^30** e **2^40**, respectivamente. No entanto, o uso desses prefixos com "bi" é relativamente raro. Para quem gosta de números realmente grandes, os prefixos após "tebi" são **pebi, exbi, zebi** e **yobi**, sendo que um yobibyte representa uma quantidade considerável de bytes (**2^80** para ser exato).

- **Taxa de Dados e Entrelaçamento de Setores**:
	- O entrelaçamento simples e o entrelaçamento duplo são técnicas utilizadas na formatação de discos rígidos para melhorar o desempenho de leitura dos dados. Ambas as técnicas lidam com a maneira como os setores de um disco são numerados e organizados, de modo a evitar perdas de desempenho causadas pelo tempo de latência rotacional durante a leitura sequencial dos setores.
    - A formatação de baixo nível pode incluir entrelaçamento de setores para compensar tempos de transferência para a memória, melhorando o desempenho da leitura.
    - Controladores modernos têm buffers maiores, permitindo o armazenamento de trilhas inteiras e eliminando a necessidade de entrelaçamento.
    
![[Pasted image 20240826172427.png]]

- **Formatação e Partições**:
    
    - Após a formatação de baixo nível, o disco é dividido em partições, que podem ser usadas por múltiplos sistemas operacionais ou para áreas de troca (swap).
    - Cada partição é tratada como um disco separado logicamente e contém seu próprio sistema de arquivos e estrutura de gerenciamento de armazenamento.
- **Registro Mestre de Inicialização (MBR) e Tabela de Partição GUID (GPT)**:
    
    - O MBR contém a tabela de partições e um código de inicialização. Suporta até quatro partições primárias e discos de até 2 TB.
    - O GPT é um esquema mais moderno que suporta discos muito maiores, até 9,4 ZB, e é usado em sistemas operacionais modernos para superar as limitações do MBR.
- **Processo de Inicialização de Disco**:
    
    - Quando o computador é ligado, o BIOS carrega o MBR, que identifica a partição ativa.
    - O setor de inicialização da partição ativa é carregado, que então carrega um carregador de inicialização para iniciar o sistema operacional a partir do sistema de arquivos.

# 1.
Considera-se que o mecanismo básico de paginação por demanda é baseado no mecanismo de paginação simples. Cada processo possui divisões de memória lógica contígua. Essa página lógica é dividida em páginas lógicas de mesmo tamanho. A memória física é dividida em páginas físicas do mesmo tamanho das páginas lógicas. Cada página lógica é carregada em uma página física e uma tabela de páginas é construída. Com esse conceito, selecione a resposta correta: 
a. As dimensões das páginas lógicas são iguais às das correspondentes páginas físicas. 
b. Todas as alternativas acima estão corretas. 
c. A memória física não pode ser contígua. 
d. Uma tabela de páginas refere-se a uma paginação de memória externa. 
e. O programa, obrigatoriamente, tem que estar carregado completamente na memória para ser executado.

**a. As dimensões das páginas lógicas são iguais às das correspondentes páginas físicas.**

### Explicação:

- No mecanismo de paginação por demanda, as páginas lógicas (do processo) são mapeadas para molduras de páginas físicas (na RAM), e ambas têm o mesmo tamanho. Esse é um princípio fundamental da paginação.
- A **opção b** está incorreta, pois as demais opções possuem erros.
- A **opção c** é incorreta, pois a memória física pode ser contígua ou não; o uso da paginação permite que o processo veja a memória como contígua, mesmo que as molduras físicas estejam espalhadas.
- A **opção d** é incorreta, pois a tabela de páginas não se refere à paginação de memória externa, mas sim ao mapeamento entre as páginas lógicas de um processo e as molduras físicas.
- A **opção e** está errada, pois um dos benefícios da paginação por demanda é que o programa **não precisa** estar completamente carregado na memória para ser executado. Apenas as páginas necessárias são carregadas sob demanda.

# 2.
O travamento em duas fases (_two-phase locking_) é um método usado em bancos de dados em que, inicialmente, o processo tenta travar todos os registros que precisa para então realizar atualizações sobre eles e liberar as travas (I). Essa estratégia é amplamente utilizada em sistemas diversos, com limitações facilmente contornáveis (II).

Sobre as afirmações I e II, assinale a alternativa correta:

a.A afirmação I está incorreta porque porque o travamento acontece em três fases (tentativa de travar, realizar atualizações, liberar as travas). Entretanto, a afirmação II está correta.

b.Ambas as afirmações estão incorretas porque o travamento acontece em três fases (tentativa de travar, realizar atualizações, liberar as travas) e não é aplicável em sistemas de controle de processos.

c.A afirmação I está correta, porém a afirmação II está incorreta já que em sistemas de tempo real não é possível terminar um processo porque um recurso não está disponível.

d.Ambas as afirmações estão corretas, inclusive não há problemas em reiniciar processos em algum sistema.

A resposta correta é a **c**.

Aqui está a explicação para as afirmações:

### I. "O travamento em duas fases (two-phase locking) é um método usado em bancos de dados em que, inicialmente, o processo tenta travar todos os registros que precisa para então realizar atualizações sobre eles e liberar as travas."

- A afirmação está **correta**. O método de **travamento em duas fases (Two-Phase Locking, 2PL)** consiste em duas fases:
    1. **Fase de crescimento**: o processo adquire todas as travas necessárias.
    2. **Fase de encolhimento**: o processo libera as travas. Nenhuma trava adicional pode ser adquirida nesta fase.
- Este é um método amplamente utilizado para garantir a **serialização** em transações de banco de dados, evitando **inconsistências**.

### II. "Essa estratégia é amplamente utilizada em sistemas diversos, com limitações facilmente contornáveis."

- A afirmação está **incorreta**. Em **sistemas de tempo real**, como sistemas que controlam processos críticos, não é possível esperar indefinidamente por recursos bloqueados, pois isso pode levar a **deadlock** ou atrasos inaceitáveis. Portanto, não é possível simplesmente "terminar um processo porque um recurso não está disponível", já que sistemas de tempo real exigem respostas rápidas e previsíveis.
# 3.

Na paginação por demanda, uma página é carregada para memória apenas quando for necessária. Entre as motivações para essa estratégia, NÃO se inclui:

a. Usar menos memória para cada processo.

b. Admitir maior número de processos no sistema.

c. Obter respostas mais rápidas de processos.

d. Realizar menos chamadas de E/S.

e. Eliminar fragmentação externa.

A alternativa **c** está incorreta como motivação para a paginação por demanda.

### Justificativa:

- **a. Usar menos memória para cada processo**: Correto. A paginação por demanda carrega apenas as páginas necessárias, economizando memória.
- **b. Admitir maior número de processos no sistema**: Correto. Como menos páginas de cada processo estão carregadas, mais processos podem residir na memória simultaneamente.
- **c. Obter respostas mais rápidas de processos**: **Incorreto**. A paginação por demanda pode aumentar o tempo de resposta, já que o sistema pode precisar realizar uma operação de entrada/saída (E/S) para carregar uma página quando ela for acessada pela primeira vez.
- **d. Realizar menos chamadas de E/S**: Correto. Com a paginação por demanda, o sistema realiza menos operações de E/S do que se carregasse todas as páginas de um processo de uma vez.
- **e. Eliminar fragmentação externa**: Correto. A paginação por demanda elimina a fragmentação externa, já que a memória é alocada em blocos de tamanho fixo (páginas).

# 4.

Em um sistema operacional que implementa a gerência de memória, por meio de um sistema de paginação por demanda, observou-se que, durante a execução de um processo, a utilização da CPU é 20%, do disco de paginação 75% e dos demais dispositivos de E/S 5%. Assinale a opção que otimiza a utilização da CPU. 
a. Instalação de um disco de paginação maior. 
b. Diminuição do conjunto de trabalho do processo. 
c. Aumento do tamanho da página. 
d. Aumento do tamanho da área de swapping no disco. 
e. Instalação de uma CPU mais rápida.

A opção que otimiza a utilização da CPU em um sistema com paginação por demanda, dadas as estatísticas apresentadas (utilização da CPU 20% e do disco de paginação 75%), é a **opção b: Diminuição do conjunto de trabalho do processo**.

### Explicação:

- **Conjunto de trabalho** se refere ao conjunto de páginas de um processo que ele utiliza frequentemente. Se esse conjunto for grande demais para caber na memória física, o processo sofrerá de "thrashing", o que significa que o sistema ficará constantemente movendo páginas entre o disco e a memória, resultando em alta utilização do disco de paginação e baixa utilização da CPU.
- **Diminuição do conjunto de trabalho** diminui a quantidade de páginas que precisam ser paginadas, resultando em menos trocas de páginas e mais tempo da CPU sendo usada para processar o trabalho real, aumentando assim sua utilização.

### Por que as outras opções não são adequadas:

- **a. Instalação de um disco de paginação maior**: Aumentar o tamanho do disco de paginação não reduz o número de faltas de página, apenas aumenta o espaço disponível para armazená-las. Isso não melhora diretamente a utilização da CPU.
- **c. Aumento do tamanho da página**: Páginas maiores podem aumentar a utilização de memória, o que pode levar a mais faltas de página se o processo não conseguir carregar todas as páginas necessárias na memória.
- **d. Aumento do tamanho da área de swapping no disco**: Semelhante à opção a, isso apenas fornece mais espaço, mas não resolve o problema de alta utilização do disco e baixa utilização da CPU.
- **e. Instalação de uma CPU mais rápida**: A CPU mais rápida não resolve o gargalo causado pelo disco de paginação. O problema principal aqui é o tempo gasto em trocas de página, não a velocidade da CPU.
# 5.


Leia o parágrafo abaixo, relacionado ao gerenciamento de memória por sistemas operacionais; em seguida, assinale a alternativa que preenche correta e respectivamente as lacunas. 

No uso de memória virtual, os endereços de memória gerados são chamados de endereços virtuais e formam o espaço de endereçamento virtual. Em computadores "     " memória virtual, o endereço virtual é posto "______________", assim a palavra de memória física tem o mesmo endereço; já em computadores "____" memória virtual, o endereço virtual é posto "____________", que faz o mapeamento dos endereços virtuais em endereços físicos de memória. 
a. com/ no barramento de memória/ sem/ na Translation Lookaside Buffers (TLB) 
b. com/ no barramento de memória/ sem/ na unidade de gerenciamento de memória 
c. sem/ na unidade de gerenciamento de memória/ com/ no barramento de memória 
d. sem/ na Translation Lookaside Buffers (TLB) / com/ na unidade de gerenciamento de memória 
e. sem/ no barramento de memória/ com/ na unidade de gerenciamento de memória

**b.** com/ no barramento de memória/ sem/ na unidade de gerenciamento de memória

### Explicação:

- Em computadores **com memória virtual**, o endereço virtual gerado pelo processo é enviado diretamente **no barramento de memória**, pois ele é traduzido diretamente para o endereço físico correspondente.
    
- Em computadores **sem memória virtual**, o sistema utiliza uma **unidade de gerenciamento de memória (MMU)**, que faz o mapeamento dos endereços virtuais para endereços físicos, realizando a tradução necessária.
    

A MMU (Memory Management Unit) é responsável por essa tradução nos sistemas que utilizam memória virtual, gerenciando o mapeamento entre endereços lógicos (virtuais) e endereços físicos.


# 6.
Uma questão importante associada com a escolha da página a ser substituída nos algoritmos de substituição de páginas é sobre como a memória deve ser alocada entre os processos concorrentes em execução. Sobre substituições locais e globais, assinale a alternativa correta:

a. Em geral, algoritmos globais funcionam melhor, especialmente quando o tamanho do conjunto de trabalho puder variar muito ao longo do tempo.

b. O método PFF pode ser aplicado em alocações locais.

c. Na alocação global, não é possível aumentar ou diminuir a alocação de páginas de um processo.

d. Não há possibilidade de ultrapaginação, caso a alocação local seja usada.

e. Todos os algoritmos de substituição de páginas permitem as alocações globais e locais.

**a. Em geral, algoritmos globais funcionam melhor, especialmente quando o tamanho do conjunto de trabalho puder variar muito ao longo do tempo.**

- **Incorreto.** Algoritmos globais podem não ser sempre os melhores, especialmente se o sistema permitir que um processo consuma páginas de outros processos, o que pode levar a problemas de desempenho se o processo dominante não tiver um conjunto de trabalho constante.

**b. O método PFF pode ser aplicado em alocações locais.**

- **Correto.** O método PFF (Page Fault Frequency) pode ser utilizado em alocações locais para ajustar a alocação de páginas de um processo com base na frequência de faltas de página.

**c. Na alocação global, não é possível aumentar ou diminuir a alocação de páginas de um processo.**

- **Incorreto.** Na alocação global, é possível ajustar a quantidade de páginas alocadas a um processo em resposta às suas necessidades e ao comportamento de outros processos. A alocação global é dinâmica e permite redistribuir as páginas disponíveis entre os processos.

**d. Não há possibilidade de ultrapaginação, caso a alocação local seja usada.**

- **Incorreto.** A ultrapaginação (ou thrashing) pode ocorrer tanto em alocação local quanto global, embora a alocação local possa limitar o impacto ao isolar o processo afetado. No entanto, a ultrapaginação ainda pode ocorrer se um processo alocado localmente tiver um conjunto de trabalho maior do que o disponível.

**e. Todos os algoritmos de substituição de páginas permitem as alocações globais e locais.**

- **Incorreto.** Nem todos os algoritmos de substituição de páginas suportam ambos os tipos de alocação. Alguns algoritmos podem ser projetados especificamente para alocação global ou local, mas não para ambos.

Portanto, a alternativa correta é:

**b. O método PFF pode ser aplicado em alocações locais.**


# 7.

Sobre a recuperação de um impasse, assinale a alternativa correta:

a. Na recuperação mediante a eliminação de processos, o processo a ser morto deve estar necessariamente no ciclo.

b. A recuperação mediante preempção é uma alternativa ótima porque devolver o recurso tomado de um processo é algo simples.

c. A eliminação de processos para recuperação de um impasse envolve uma escolha cuidadosa do processo a ser morto, com análise se sua reexecução é possível.

d. A recuperação mediante retrocesso armazena nos checkpoints apenas os recursos alocados a um processo, não sendo necessário armazenar outras informações.

e. A recuperação mediante retrocesso permite a sobrescrita de arquivos dos checkpoints.

**a. Na recuperação mediante a eliminação de processos, o processo a ser morto deve estar necessariamente no ciclo.**

- **Incorreto.** Embora a eliminação de um processo envolva frequentemente a identificação de um processo no ciclo de impasse, não é estritamente necessário que o processo a ser morto esteja no ciclo. Pode-se escolher qualquer processo para ser eliminado, mas normalmente a escolha é feita com base em critérios como a quantidade de trabalho já realizado e a facilidade de recuperação.

**b. A recuperação mediante preempção é uma alternativa ótima porque devolver o recurso tomado de um processo é algo simples.**

- **Incorreto.** A preempção pode ser complexa de implementar porque envolve interromper um processo e devolver recursos a outros processos. Isso pode ter efeitos colaterais significativos, como a perda de progresso ou a necessidade de redefinir o estado dos processos afetados.

**c. A eliminação de processos para recuperação de um impasse envolve uma escolha cuidadosa do processo a ser morto, com análise se sua reexecução é possível.**

- **Correto.** A escolha do processo a ser eliminado deve ser cuidadosa. É importante considerar o custo de matar e reiniciar um processo, incluindo a análise de quanto trabalho já foi realizado e a possibilidade de reexecução. Isso garante que a solução do impasse seja o mais eficiente possível.

**d. A recuperação mediante retrocesso armazena nos checkpoints apenas os recursos alocados a um processo, não sendo necessário armazenar outras informações.**

- **Incorreto.** A recuperação por retrocesso geralmente requer que se armazenem todos os estados necessários, não apenas os recursos alocados. Isso inclui o estado do processo e as informações que permitam restaurar o processo ao seu estado anterior.

**e. A recuperação mediante retrocesso permite a sobrescrita de arquivos dos checkpoints.**

- **Incorreto.** Normalmente, a recuperação por retrocesso não permite a sobrescrita de arquivos dos checkpoints. Em vez disso, novos checkpoints são criados conforme o processo avança. A sobrescrita pode levar à perda de dados importantes para a recuperação.

# 8.
Sobre os impasses de comunicação, assinale a alternativa correta: 
a. Controles de limite de tempo não são úteis para lidar com esse tipo de impasse. 
b. Nesse tipo de impasse, apenas recursos de software estão envolvidos. 
c. Considere que uma mensagem seja enviada para a qual uma resposta é esperada, um temporizador é inicializado. Caso a mensagem se perca, o reenvio não é um problema grave em diferentes sistemas. 
d. Em sistemas de comunicação, não é possível acontecer um impasse de recursos. 
e. O impasse de comunicação é uma anomalia de sincronização de cooperação, onde os processos não podem completar o serviço se executados independentemente.

**a. Controles de limite de tempo não são úteis para lidar com esse tipo de impasse.**

- **Incorreto.** Controles de limite de tempo (ou timeouts) são úteis para lidar com impasses de comunicação. Eles ajudam a detectar situações em que uma mensagem não foi recebida ou processada a tempo, permitindo que o sistema tome medidas corretivas, como reenviar a mensagem ou abortar a operação.

**b. Nesse tipo de impasse, apenas recursos de software estão envolvidos.**

- **Incorreto.** Impasses de comunicação podem envolver tanto recursos de software quanto recursos de hardware. Por exemplo, um impasse pode ocorrer devido a problemas de rede (hardware) ou erros na lógica de comunicação (software).

**c. Considere que uma mensagem seja enviada para a qual uma resposta é esperada, um temporizador é inicializado. Caso a mensagem se perca, o reenvio não é um problema grave em diferentes sistemas.**

- **Incorreto.** O reenvio de mensagens pode ser problemático, especialmente em sistemas críticos ou em redes com alta latência. A perda de uma mensagem e a necessidade de reenvio pode causar atrasos e inconsistências, e não é trivial em todos os sistemas.

**d. Em sistemas de comunicação, não é possível acontecer um impasse de recursos.**

- **Incorreto.** Impasses de recursos podem ocorrer em sistemas de comunicação, especialmente se recursos compartilhados (como buffers ou canais de comunicação) são alocados de forma inadequada ou se há problemas na sincronização entre processos.

**e. O impasse de comunicação é uma anomalia de sincronização de cooperação, onde os processos não podem completar o serviço se executados independentemente.**

- **Correto.** Um impasse de comunicação pode ser descrito como uma anomalia de sincronização onde processos cooperantes ficam bloqueados porque esperam uns pelos outros para liberar recursos ou responder a mensagens. Isso impede que qualquer um dos processos complete seu serviço.

Portanto, a alternativa correta é:

**e. O impasse de comunicação é uma anomalia de sincronização de cooperação, onde os processos não podem completar o serviço se executados independentemente.**

# 9.


Os computadores são equipados com um software chamado de sistema operacional;

Quem programa não precisa compreender como todas essas partes funcionam em detalhes. 

• O shell ou GUI (Graphical User Interface) não é parte do sistema operacional, embora use esse sistema para realizar o seu trabalho.

# Conceitos e Chamadas de Sistemas:

## Processos

1. Um processo é basicamente um programa em execução associado a:  Espaço de endereçamento (programa executável, os dados do programa e sua pilha); 
    
2. Conjunto de recursos (registradores, lista de arquivos abertos, alarmes pendentes, listas de processos relacionados) e todas as demais informações necessárias para executar um programa.
    
3. Periodicamente, o sistema operacional decide parar de executar um processo e começa a executar outro;  
    
4. Quando isso acontece, todas as informações a respeito do processo precisam ser salvas;  Tabela de processos: arranjo de estruturas do sistema operacional com uma entrada para cada processo existente.  
    
5. Um processo suspenso consiste em seu espaço de endereçamento (imagem do núcleo) e de sua entrada na tabela.
    
6. Um processo é na essência um contêiner que armazena todas as informações necessárias para executar um programa.


**Exemplo:**

Uma pessoa digita no interpretador de comandos (shell) requisitando a compilação de um programa;  

O shell tem de criar agora um novo processo para executar o compilador → processos filhos; 

Se os processos cooperam para finalizar uma tarefa, é necessário que eles se comuniquem e sincronizem suas atividades → comunicação entre processos (sinais, semáforos, pipes).

## Espaço de endereçamento


Associado a cada processo está o espaço de endereçamento, uma lista de posições de memória que vai de 0 a algum máximo, onde o processo pode ler e escrever

1. O espaço de endereçamento contém o programa executável, os dados do programa e sua pilha. 
    
2. Também associado com cada processo há um conjunto de recursos, em geral abrangendo registradores (incluindo o contador de programa e o ponteiro de pilha), uma lista de arquivos abertos, alarmes pendentes, listas de processos relacionados e todas as demais informações necessárias para executar um programa.
    
3. Todo computador tem alguma memória principal que ele usa para armazenar programas em execução;  O controle da memória é feito pelo sistema operacional (multiprogramação e proteção);    

## Mapa de Memória

O mapa de memória de um processo é uma estrutura que descreve como a memória está organizada e alocada para esse processo. Ele especifica as diferentes regiões de memória que o processo pode acessar e suas respectivas permissões e características. Vamos detalhar isso um pouco mais:
### Componentes do Mapa de Memória

1. **Segmento de Código (Text Segment):**
    
    - Contém o código executável do programa.
    - Normalmente, é uma região de memória somente leitura.
2. **Segmento de Dados (Data Segment):**
    - Contém variáveis globais e estáticas que são inicializadas antes da execução do programa.
3. **Segmento BSS (Block Started by Symbol):**
    - Contém variáveis globais e estáticas que são inicializadas para zero.
4. **Heap:**
    - Área de memória utilizada para alocação dinâmica, que cresce conforme o programa solicita mais memória (por exemplo, com `malloc` em C).
5. **Stack:**
    - Utilizada para a execução das chamadas de função e variáveis locais.
    - Normalmente, cresce e diminui à medida que as funções são chamadas e retornam.

### Função do Mapa de Memória

O mapa de memória serve para várias finalidades importantes:

- **Gestão de Memória:** O sistema operacional usa o mapa de memória para saber quais partes da memória física estão associadas a um processo específico.
- **Proteção:** Define as permissões de acesso (leitura, escrita, execução) para diferentes regiões de memória, garantindo que um processo não possa acessar a memória de outro processo de maneira incorreta.
- **Paginação e Swap:** Auxilia o sistema operacional a gerenciar a paginação e a troca de partes da memória entre a RAM e o disco.

### Exemplo Prático

Quando um processo é criado, o sistema operacional cria um mapa de memória para ele. Aqui está um exemplo simplificado de como poderia ser:

- **Endereço 0x0000 a 0x1FFF:** Segmento de código, somente leitura.
- **Endereço 0x2000 a 0x2FFF:** Segmento de dados, leitura e escrita.
- **Endereço 0x3000 a 0x3FFF:** Segmento BSS, leitura e escrita.
- **Endereço 0x4000 a 0x7FFF:** Heap, leitura e escrita, cresce conforme necessário.
- **Endereço 0x8000 a 0xFFFF:** Stack, leitura e escrita, cresce e diminui conforme funções são chamadas e retornam.

### Unidade de Gerenciamento de Memória (MMU)

A MMU (Memory Management Unit) é responsável por traduzir endereços lógicos (usados pelo processo) em endereços físicos (usados pela RAM). O mapa de memória do processo é essencial para essa tradução, pois ele define como os endereços lógicos do processo mapeiam para a memória física.

## Tabela de processos

1. Em muitos sistemas operacionais, todas as informações a respeito de cada processo, fora o conteúdo do seu próprio espaço de endereçamento, estão armazenadas em uma tabela do sistema operacional chamada de tabela de processos, que é um arranjo de estruturas, uma para cada processo existente no momento.
    
2. Para implementar o modelo de processos, o sistema operacional mantém um arranjo de estruturas chamado tabela de processos:  Uma entrada para cada processo (blocos de controle de processo). 
    
3. Essas entradas contêm tudo o que deve ser salvo quando há a troca de processo (em execução → pronto ou bloqueado):  Contador de programa, ponteiro de pilha, alocação de memória, estado dos arquivos abertos, informação sobre sua contabilidade e escalonamento, etc.

**![](https://lh7-us.googleusercontent.com/w_hksxdu6tyV84IuKZ3YFf-zeavRBohDz7J8Lv2mL6vvUM5xzg12UE7rG0z1AJCAHqwkx5I9yV4ZW1jCIHvkFCpakXi7JfCaFKNB93I0Tc8CoDcc08p9hMd22eGDK_tdWDoaKxXsZWSBF8R0LBdC31M)

## Arquivos


1. Para manter e agrupar os arquivos, a maioria dos sistemas operacionais tem o conceito de um diretório; 
    
2. Chamadas de sistema são necessárias para (i) criar, remover, ler e escrever arquivos, (ii) criar e remover diretórios, e (iii) mover e remover arquivos de diretórios.
    
3. A todo instante, cada processo tem um diretório de trabalho atual;  
    
4. Os processos podem mudar seu diretório de trabalho emitindo uma chamada de sistema;
    
5. A chamada de sistema mount permite que o sistema de arquivos no CD-ROM seja agregado ao sistema de arquivos-raiz;
    
6.   

![](https://lh7-us.googleusercontent.com/YWRcf7lJL2RFLJexZUFRQzXcW15CYILkG5Ev_XMB7nYSRIvoGR4bGnmASnLgRLEqewtuUun5qFH9wbiQGhqz3af6Biu59Y2sIUgyBQxiNj0i3uTjzI6bN527Xow0eFNW_mv35HNGLltcS_03jfh6R80)

7. Relação entre processos e arquivos: pipes;  
    
8. Um pipe é uma espécie de pseudoarquivo que pode ser usado para conectar dois processos, com implementação parecida com arquivos;  É necessário configurá-lo antes de usar.
    

![](https://lh7-us.googleusercontent.com/9jky9rgc9q4rNu2QBOjrKhJgUSOpz07EX8G5rasTs7bwkO30MeK36q2SsNs1UrP6mWdxmWI_43C1pkjvWfaShhHBQXn9Ws3AJHJC-PHzYEUeZSVm_RHkj7jJoOmhrkVQdvItUDn1xRCfL4zZ-FvM5pY)

9. No UNIX, após a fork, os processos pai e filho têm a mesma imagem de memória, as mesmas variáveis de ambiente e os mesmos arquivos abertos;  Normalmente, o processo filho então executa uma chamada de sistema para mudar sua imagem de memória e executar um novo programa;  Nenhuma memória para escrita é compartilhada;  Alternativamente, o filho pode compartilhar toda a memória do pai, mas nesse caso, a memória é compartilhada no sistema copy-onwrite (cópia-na-escrita).

## Entrada/Saída


1. Em consequência, todo sistema operacional tem um subsistema de E/S para gerenciar os dispositivos de E/S:  Partes independentes dos dispositivos;  Partes específicas aos dispositivos (drivers).


# Proteção

![](https://lh7-us.googleusercontent.com/FAxS_BMqbf8sj5oxIxfkHxzRt1HoJlI0PhO4-gFWRXDTIIKzoo2ezs6HzjYUCy0Y1iZKnfhezB7EAKAD3dfZWIEgBoeEOyMCoE3Vm01k3TeF_Y0hSnToEKXQfrI6JNpdgszPBM-y8he-9q0EiscbA5Y)

## **O interpretador de comando (shell)**

1. Ainda que o shell não faça parte do sistema operacional, ele faz um uso intenso de muitos aspectos desse sistema e serve como um bom exemplo de como as chamadas de sistema são usadas.
    
2. date (cria processo filho, executa o programa date como um filho e espera sua finalização) 
    

date >file (altera saída padrão) 

sort file2 (altera entrada e saída padrão) 

cat file1 file2 file3 | sort >/dev/lp (pipe) 

cat file1 file2 file3 | sort >/dev/lp &

3. A saída de um programa pode ser usada como entrada por outro programa conectando-os por meio de um pipe. Assim, cat file1 file2 file3 | sort >/dev/lp invoca o programa cat para concatenar três arquivos e enviar a saída para que o sort organize todas as linhas em ordem alfabética. A saída de sort é redirecionada para o arquivo /dev/lp, tipicamente a impressora.
    
4. Após a fork, o processo original e a cópia (o processo pai e o processo filho) seguem seus próprios caminhos separados. Todas as variáveis têm valores idênticos no momento da fork, mas como os dados do processo pai são copiados para criar o processo filho, mudanças subsequentes em um deles não afetam o outro. (O texto do programa, que é inalterável, é compartilhado entre os processos pai e filho). A chamada fork retorna um valor, que é zero no processo filho e igual ao PID (Process IDentifier — identificador de processo) do processo filho no processo pai. Usando o PID retornado, os dois processos podem ver qual é o processo pai e qual é o filho.
    
5. Na maioria dos casos, após uma fork, o processo filho precisará executar um código diferente do processo pai. Considere o caso do shell. Ele lê um comando do terminal, cria um processo filho, espera que ele execute o comando e então lê o próximo comando quando o processo filho termina. Para esperar que o processo filho termine, o processo pai executa uma chamada de sistema waitpid, que apenas espera até o processo filho terminar (qualquer processo filho se mais de um existir). Waitpid pode esperar por um processo filho específico ou por qualquer filho mais velho configurando-se o primeiro parâmetro em –1. Quando waitpid termina, o endereço apontado pelo segundo parâmetro, statloc, será configurado como estado de saída do processo filho (término normal ou anormal e valor de saída). Várias opções também são fornecidas, especificadas pelo terceiro parâmetro. Por exemplo, retornar imediatamente se nenhum processo filho já tiver terminado. 
    
6. Agora considere como a fork é usada pelo shell. Quando um comando é digitado, o shell cria um novo processo. Esse processo filho tem de executar o comando de usuário. Ele o faz usando a chamada de sistema execve, que faz que toda a sua imagem de núcleo seja substituída pelo arquivo nomeado no seu primeiro parâmetro. (Na realidade, a chamada de sistema em si é exec, mas várias rotinas de biblioteca a chamam com parâmetros diferentes e nomes ligeiramente diferentes.
    
7. main(argc, argv, envp)
    

O terceiro parâmetro do main, envp, é um ponteiro para o ambiente, um arranjo de cadeias de caracteres contendo atribuições da forma nome = valor usadas para passar informações como o tipo de terminal e o nome do diretório home para programas. Há rotinas de biblioteca que os programas podem chamar para conseguir as variáveis de ambiente, as quais são muitas vezes usadas para personalizar como um usuário quer desempenhar determinadas tarefas.

8. No comando shell 
    

cat chapter1 chapter2 chapter3 | grep tree 

o primeiro processo, executando cat, gera como saída a concatenação dos três arquivos. O segundo processo, executando grep, seleciona todas as linhas contendo a palavra “tree”. Dependendo das velocidades relativas dos dois processos (que dependem tanto da complexidade relativa dos programas, quanto do tempo de CPU que cada um teve), pode acontecer que grep esteja pronto para ser executado, mas não haja entrada esperando por ele. Ele deve então ser bloqueado até que alguma entrada esteja disponível.

9. Quando um processo bloqueia, ele o faz porque logicamente não pode continuar, em geral porque está esperando pela entrada que ainda não está disponível. Também é possível que um processo que esteja conceitualmente pronto e capaz de executar seja bloqueado porque o sistema operacional decidiu alocar a CPU para outro processo por um tempo.
    

![](https://lh7-us.googleusercontent.com/IV8jHj4SZzqubbWvKTY2uZK2r9kAPx8CXh4gZf3VxKSOxMHKsXopS_EhnPzDiBxufat7dmJ848CnW409AasU1RfMO1wgU6DWSD3ByCUHq3bXcL-eJaFYGj_GV9KYxYHohB1o5aAjUnMbQbFUwBWZ45A)

10. A transição 1 ocorre quando o sistema operacional descobre que um processo não pode continuar agora. Em alguns sistemas o processo pode executar uma chamada de sistema, como em pause, para entrar em um estado bloqueado. Em outros, incluindo UNIX, quando um processo lê de um pipe ou de um arquivo especial (por exemplo, um terminal) e não há uma entrada disponível, o processo é automaticamente bloqueado.
    
11. As transições 2 e 3 são causadas pelo escalonador de processos, uma parte do sistema operacional, sem o processo nem saber a respeito delas. A transição 2 ocorre quando o escalonador decide que o processo em andamento foi executado por tempo suficiente, e é o momento de deixar outro processo ter algum tempo de CPU. A transição 3 ocorre quando todos os outros processos tiveram sua parcela justa e está na hora de o primeiro processo chegar à CPU para ser executado novamente. O escalonamento, isto é, decidir qual processo deve ser executado, quando e por quanto tempo.
    
12. A transição 4 se verifica quando o evento externo pelo qual um processo estava esperando (como a chegada de alguma entrada) acontece. Se nenhum outro processo estiver sendo executado naquele instante, a transição 3 será desencadeada e o processo começará a ser executado. Caso contrário, ele talvez tenha de esperar no estado de pronto por um intervalo curto até que a CPU esteja disponível e chegue sua vez.
## **Chamadas de sistemas**


Se um processo estiver executando em modo de usuário e precisa de um serviço de sistema, ele tem de executar uma instrução de armadilha (trap) para transferir o controle para o sistema operacional.

contador = read(fd, buffer, nbytes) 

fd: arquivo 

buffer: ponteiro para onde os dados devem ser colocados 

nbytes: qtde de bytes lidos  

Rotina de biblioteca faz a chamada de sistema de mesmo nome

![](https://lh7-us.googleusercontent.com/Y0_wkUpFgJlTmmtjgM-VUOVPQI4962_99a4gCpAu3GstQBL6fpD5t6sQj3jsm5F6BRdCqrkv7bVZ1LsWJOcqG5eFRTQ8cuEj4NvEkeUFnkZSswwdQZ8FEDRWT2WmCYZXQKQgRaWFMEZ8xci6VHcyLvA)

  

![](https://lh7-us.googleusercontent.com/6aLj_r1mGdgxr3lvvNhpx1QcZ2xuXAAym8bvpUaOa4Zoc-WhXXcEtKce6SSZBJTuZwkaksnsMwUYjReEqSc28gD2RJoXmXMFxE_2iYoU8brymZrGAByUW3TfYDvf8XoUT-OMQe_JIs652ajvZC4WEyA)

  

![](https://lh7-us.googleusercontent.com/1B7PjZiSu66qv4NGF-OHkAE8a3bQ5JdosPhlzTJJzDDWauie0Ra5hy3CAp7jr4NEyKVpxuE4NbfbyOquSDjMIv-7s0krTq5NT_anBDf4RYDLc8o2F8yrsKB4rN0_7nVcZZN7n9oOrR-FFKV-wq7idEU)

  

![](https://lh7-us.googleusercontent.com/S46etntdOAeyOoJb5iE7_pLjWsLTVLnS1v47XzlygSYAlnZI5DwgK0TX1rGTSAdaaJfOUnNtFxTEl0IcogU17m5V-iVvJVu0KSzBHYOAwp5toLSarcifB1bCJd2pclZ21ovns7C-cKc2N4s7VVcNVaM)

![](https://lh7-us.googleusercontent.com/hmAxFe9N1x-mGEfxxroHzxHsTUxBGFRkTdPhKobZn2GxEzY3scLWZKMyG_jcIwNCei43qj3wJN803khj5qiTJOoDCJiZ5R_d6DcGGfsgoQNU-oS5jtHfK8aB_zRx5K6QLPXJe1Uh5lLk2LG4dtrZGO0)

  

![](https://lh7-us.googleusercontent.com/iMCmqVm9xqp_eoiL3kMODVvpsrTB6Axdu3nQXXZTmq-xCpF8mJmPNRAl7oPHqpud_mPCuC7USlTeCgDg9AEO1i3hHh0Mx6F4GLe7-jlvP--ooJwPtf6S47ABaTBPgdcsxKrk7O6QVidRu_xFcC8wO4s)

![](https://lh7-us.googleusercontent.com/0Kc6O3ZMRmgqKvPPZOyHTCoXvnIHDTbma0PK9BRDuNOk7a5WzADHl5cAg8I6bc2zcaGz09z8a_8azdhKLq_82IcszoNjU6-IXqpGS0DYrZ0Kr_bGWircBPhjJMuZ-Lu8MeFBJb5KsBf_QLT7psf8Rs4)

  

![](https://lh7-us.googleusercontent.com/VJuibzp66n7yC8lRsMSBBWj6JOfucfIpOVA_g5Zk3AKJjnLS8FThK4eBjXhklQQzZZr1c8c-QxJR30-Ynk-pm5dwpM4CL2lCgA6IUKypzS1wHP_3UJE0uIbild9tVNwPqpBTHEnaC7zqfFnpjkLf7tk)

  

![](https://lh7-us.googleusercontent.com/4LurqCddRG58riPSuQe9KIQK-qoH6jQyEOFFLQRyqKxth9O7gxz7qSRCPHupmyRUJhYDR43HRaN_9qoqs0Awu1e-oEq9QUK0mHgvVZc1l0vCTW-EIS8PXs-Ln3xA5nElcLyW4uHy_9z9brP4Jm3WR4Y)

Processos em UNIX têm sua memória dividida em três segmentos: o segmento de texto (isto é, código de programa), o segmento de dados (isto é, as variáveis) e o segmento de pilha. O segmento de dados cresce para cima e a pilha cresce para baixo

## **Threads**

- Em sistemas operacionais tradicionais, cada processo tem um espaço de endereçamento e um único thread de controle. É desejável ter múltiplos threads de controle no mesmo espaço de endereçamento executando em quase paralelo, como se eles fossem (quase) processos separados (exceto pelo espaço de endereçamento compartilhado).
    
- Por fim, threads são úteis em sistemas com múltiplas CPUs, onde o paralelismo real é possível. 
    
- As threads são mini processos com uso motivado por: 
    

1. Decomposição de uma aplicação em múltiplos threads com execução quase em paralelo → modelo de programação simples; 

2. Compartilhamento do espaço de endereçamento e de todos os dados (vs processos com espaços separados); 

3. Mais fáceis e rápidos de criar e destruir que processos; 

4. Melhor desempenho pela sobreposição de atividades; 

5. Permite um paralelismo real em sistemas com múltiplas CPUs.

- É importante perceber que cada thread tem a sua própria pilha, contendo uma estrutura para cada rotina chamada mas ainda não retornada;
    
- Essa estrutura contém as variáveis locais da rotina e o endereço de retorno para usar quando a chamada de rotina for encerrada
    
- Cada thread geralmente chamará rotinas diferentes e desse modo terá uma história de execução diferente.
    
- !!!Cada processo precisa da sua própria tabela de threads.
    

  

![](https://lh7-us.googleusercontent.com/J8rDpEgmEb9a2xtx5EcV-noWVUG8zE1vw81SlKAeVvWtZP81h_pJhJ3OgzakNgUZsD0G-XEn3VMkoALM_mZgpnuvkKu93suD5F4H4N0_bT4L2TNqRM9NDqguEcg1TdRIWDFmjYA2ml0nd8wImg7Omqw)

![](https://lh7-us.googleusercontent.com/t18RsZUrwyYK-gpOQmZTw9qqMsM2pVwYR1Jz05Y6JfrYmraAfZqDDrWUJ1UtGbgrQSd_-lZrFyfZvUrQru4cXanyIUFegreE4_thHvWNtKT-UX1x7JtFz44fh2sjYMvcKIYBPmyeC-Zxr4-AAQbJotA)

![](https://lh7-us.googleusercontent.com/PQfwn7xzN7xiK0Z1qEdhhSFBM0ieIpJPM26nYr7Bj6FlVT2BTcKaQfb6Nza1GG2Fe0uykXj2JNN3lE-vZbEs6qH1k5qgQtxQ7NnHDc_wugJeJJuoF772EAeP78KEZ1E-x7OnEzvJwIL_V_BteOIfN0I)

  

![](https://lh7-us.googleusercontent.com/CeykH8qNFbZkbKWPDas6ElAZGI7foz-xeGOF0mfavAfqzhaDQb0V18lFAImSEc2sqQgpqXT9WxQhN3BjM-e7dE2OeUwVzccLnM89HZl5zohMuM20rXXrJkDeKPCkFbyQ0zrsu2A5rF5tYJhA9w9AaSo)

  

![](https://lh7-us.googleusercontent.com/ABk0HPMTlcvNHlyImp7Ns-KAEYh3D-knXUHfcXfFMvIRqzZzEp2B6W42W7ZG66mVyTLm2k5wi66yg49zzWOIBdOY8J_ZOVIf3q2-N4POyHKuFSFP5HGWK2RTxStSG2uoWIKamuD2yJ_jglAlT3906HI)

![](https://lh7-us.googleusercontent.com/yS_ZnpSm6NnQtRMouOwksbRe0o-I-1CEIb1T_drDjbC8m7PXNQhWf7qRA8JD1YZOnQGNijjj0VwJ5xuEncJ14jbSQN2te4Wmvqjeng53B98i0dYe1qK5Oqc_vFW5aaXKGGBWDo2SUNSqh7hmtmjrVKg)

![](https://lh7-us.googleusercontent.com/yag4dn3pDpXhkaDF9iY4Kv4vx7Kne4z8JzJdrwcQQCv3is_su5FyYSP2gFIPKjOjNnYE1XhM9eA2G2oebjhuN9KZb603bPbjne2zxFcoMfPH2L6usX-jNsWQl294kTUVunL7WSwwX9tDLMsuJTdwdaM)

![](https://lh7-us.googleusercontent.com/F9fJKer9hCxLUuOmy3x3aGmxB7lawu7ZOBaHjltJQLBFAYHFqj_GSLV_aExR5KY2_IsGjm8fQG7UwLM1FfwY3on32nNCpSEJpmhNA7IWWEmCQ0RxISztXio_2fabUpYvqg7sJyttXpQhtgXN_HewGWE)

![](https://lh7-us.googleusercontent.com/SbgcwtH0J5hsZQLy6QdpxE_tyssmQvw9ki9ahs_o56iYy71sTPi-bavQQIEMgnXfmzIy2cfHD4aYO1w58Rsju60oFXRrmRCbVwQXjdTAz18NOWP3KgFy9opKbVqrUDgD3ULsyIlstS1lj_Q7NwxvkJg)

![](https://lh7-us.googleusercontent.com/txdlLhawa5Uqqa3KSq2QirgqJgZhmpHN7ipyI0LTtV7zOeHyFdZRC0t9zwDaEP0UZ-XyE4EHN3ghhNJLmJIp9N-55gskjcGAHFcuOXspLqTu9HP1ku_W7RiABrji2afawLjS_phFmGWo_JgB05RVOBY)

![](https://lh7-us.googleusercontent.com/FnpaziLdEGuWANCP6acif80p05Lc7smHOcgvoSIwbjQaIqmERERsPWBmuNzJCgoEApw9-Qvvwr4-ZGfQxKcgzeccsQVSSqWuMZ4Jsl8tQblVPuZi1pVyz70rlNtiPzsBv8mzEETHcV-zfTnWD1mwPTU)


## Interprocess communication - IPC

[[IPC]]


1.Passar informações: maneira bem estrutura e sem interrupções; 

2.Certificar-se que dois ou mais processos não se atrapalhem; 

3.Sequenciamento adequado quando há dependências

## **Regiões críticas**

A chave para evitar problemas com dados compartilhados é proibir mais de um processo de ler e escrever ao mesmo tempo (exclusão mútua) questão de projeto do sistema operacional; 

Partes do programa que acessam dados compartilhados são chamadas de região crítica ou seção crítica; 

Precisamos fazer com que dois processos jamais estejam em suas regiões críticas ao mesmo tempo.
  

![](https://lh7-us.googleusercontent.com/AvodzypCwfIHcCtrWmRI6iDSM4-T3ZVmoNrnCAlGqxL2jmjH7dnJ9rBUnOeImxa1ebyfYKQvwiLQEP8ofUWqj5sCvN_NcPGXuJrfpVHY3jixEWM4Hiu7Y-0vW-2r8gN_q8Oc9-_mMKUDfPR2O3Mn9aQ)

1.Dois processos jamais podem estar simultaneamente dentro de suas regiões críticas; 

2.Nenhuma suposição pode ser feita a respeito de velocidades ou do número de CPUs; 

3.Nenhum processo executando fora de sua região crítica pode bloquear qualquer processo; 

4.Nenhum processo deve ser obrigado a esperar eternamente para entrar em sua região crítica.

  

![](https://lh7-us.googleusercontent.com/iMMvqvfm-jC3UZnvEE1zoI4UdQeiA27AVGXwFLP5gku-aYPbik2ZgCRO5mKsLaVz1p0EHGnzO8diqR64vjZbL2GcK_LbCYCzQPHsw__U0aoluffiKAjrBbAnY81g9IGI6vB9qH-DZtbK9tSD-q3E01Q)

## O problema do Jantar dos filósofos

![](https://lh7-us.googleusercontent.com/PVzuwNSja9lpNhRoP8Ya_6TWccrKFqR2NmJ-HbjZaTTfNndXTtA0N9JO0AYOMQ8NuGGi-oB_GIYkL7p_pjZfDOpShgU_LPcnKIE1Xu1yNt0VAyMSIQdRzmrTAcg9xDyMceWz91_zpw2Rulq1adGLzg4)

  

![](https://lh7-us.googleusercontent.com/8ChPJooVi3WBMKwQA--9aKRsg-froQ6NOomtTQts3bLG2YPz2OLWCCjqdsj8eEfsYt7a7T6lbRyJdxUVg0adwNY9LwkgBuAdjzyf5O7k-Rc4RJNsMwCHldovM3BDaxDODKJT4OhGJR5y1q9wIAxZPwU)

  

![](https://lh7-us.googleusercontent.com/_9e1fNi_zCf1g-V7Vp7QsA94QKyvA8cAmXLCPmzEuvfDejzAjhgZUCrYt4bzki-Kr5c-j0sHXbfxURBSMV2laBXICdYUJK_s82m6ebPPB-gu_CQxC5N7fIzibprvZ2FQx8xxUT28bU2h5fss8aySBm8)

  

![](https://lh7-us.googleusercontent.com/vy0dOd84Rcp2DQzs3TC-N-Cx52Nh2r6XrxxAn_e8Y8pC42yUy9waab6BAve4wYnpP-q1XZ26IbjLn37kucoAB7kBqv4AREJmb9nG-jyJFA0stBwHrAqy4KtUU-PxDRPLUIcPg6yv0pIKoVKrvQ3HMXc)

![](https://lh7-us.googleusercontent.com/E1FzfnfulIlE_8TlafStvbC79C-YroKn_yRrO01WoN96LOKy1I4GqWs1OHgsmUofihAOS-JMjLTUNF_BGF3uJb4-DqB4haV0Xpq_CyCfuqOzBrpmkSDezzs2hmIyZU_EyqdtCwWx6-9UBzcfyvK77f8)

![](https://lh7-us.googleusercontent.com/cl0N21R5146YrLzH888Xvgc_1WLuL-aEkdWIZ30roziLs5TxpV5hQKgOHnxH63_4vtr3t99ZFMnfn4ZY-mTx4eDGsj2l-8gzE4hoEPLsCHX2r6N0ODuqjzVrAmx0W1cvPS4ch1zerI7jTXpD1ctI5iM)

  

## O problema dos leitores e escritores

  

É aceitável ter múltiplos processos lendo ao mesmo tempo, mas se um processo está atualizando (escrevendo), nenhum outro pode ter acesso, nem mesmo os leitores; 

  

![](https://lh7-us.googleusercontent.com/yWTPifm2bdAZal7216I97Rew1972Gi0nspuOAjVkQ16hVIunXBO54JPyshseuH_IcaXoUu3FzWwUdyUk75kY8kL3m9HQSEvvFnKECiMXT9d4frumDF0Y_gGM5IX46--AWvLBmCJK0tLf9KPCj-KSFsE)

Problema: Se um escritor aparece, ele é suspenso; Enquanto pelo menos um leitor ainda estiver ativo, leitores subsequentes serão admitidos; O escritor será mantido suspenso até que nenhum leitor esteja presente.

  

Solução: Quando um leitor chega e um escritor está esperando, o leitor é suspenso atrás do escritor em vez de ser admitido imediatamente.

## **Escalonador de Processos**


Muitos processos competem pela CPU, então o escalonamento (decidir qual processo vai rodar) é importante. Por exemplo, se a CPU precisa escolher entre um processo que reúne estatísticas diárias e um que atende às solicitações dos usuários, é melhor que o segundo processo tenha prioridade. Isso deixa os usuários mais satisfeitos.

Em dispositivos móveis, como smartphones, e em redes de sensores, os recursos também são limitados. Então, o escalonamento é importante. Além disso, nesses dispositivos, a duração da bateria é crucial. Alguns escalonadores tentam otimizar o consumo de energia.

Além de escolher o processo certo para rodar, o escalonador precisa usar a CPU de maneira eficiente, porque trocar processos é algo caro. Vamos ver o que acontece durante uma troca de processos:
  

- A CPU precisa mudar do modo usuário para o modo núcleo.
    
- O estado do processo atual precisa ser salvo, incluindo seus registros.
    
- Em alguns sistemas, o mapa de memória do processo atual também precisa ser salvo.
    
- O escalonador seleciona um novo processo para rodar.
    
- A unidade de gerenciamento de memória (MMU) precisa ser recarregada com o mapa de memória do novo processo.
    
- O novo processo é inicializado.

Trocar processos também pode invalidar o cache de memória, forçando-o a ser recarregado. Tudo isso leva tempo, e se muitas trocas de processo acontecerem por segundo, pode consumir muito tempo da CPU. Então, é importante fazer isso com cuidado.

### Situações de escalonamento de processos
  
 1. Um novo processo é criado: Executar pai ou filho?

Quando um novo processo é criado (usualmente através de uma chamada de sistema como `fork`):

- **Processo Pai:** Continuar executando o processo pai pode ser vantajoso se ele precisa configurar o ambiente para o processo filho ou se ele precisa realizar outras operações rapidamente.
- **Processo Filho:** Executar imediatamente o processo filho pode ser útil se ele precisa começar uma tarefa importante ou interagir com o usuário.

2. Um processo termina: Escolher do conjunto de processos prontos

Quando um processo termina:

- **Escolher próximo processo pronto:** O escalonador deve selecionar um dos processos prontos para execução. Se não houver processos prontos, o sistema executa o **processo ocioso** (idle process), que mantém a CPU ocupada enquanto não há tarefas reais a serem executadas.

 3. Um processo bloqueia para E/S

Quando um processo se bloqueia para realizar operações de Entrada/Saída (E/S):

- **Razão para bloquear:** A razão do bloqueio pode influenciar a escolha do próximo processo. Por exemplo, se o processo A está esperando por dados que o processo B vai produzir, pode ser eficiente permitir que o processo B execute para liberar os dados o mais rápido possível.

4. Ocorre uma interrupção de E/S

Quando ocorre uma interrupção de E/S, o escalonador tem algumas opções:

- **Executar o que ficou pronto há pouco:** Se a interrupção fez com que um processo ficasse pronto, pode ser eficiente executar esse processo imediatamente, especialmente se for de alta prioridade.
- **Executar o que estava sendo executado no momento da interrupção:** Se o processo anterior ainda tem tempo de CPU alocado ou é de alta prioridade, pode ser benéfico continuar sua execução para minimizar a sobrecarga de troca de contexto.
- **Executar algum terceiro processo:** Se há um processo mais prioritário que precisa ser executado, o escalonador pode optar por ele.

5. Ocorre uma interrupção do relógio

Quando ocorre uma interrupção do relógio (periodicamente a cada k interrupções):

- **Decidir se deve trocar de processo:** O escalonador pode decidir se um novo processo pronto deve ser executado ou se o processo atual deve continuar. Essa decisão é baseada em critérios como prioridade, tempo de execução já consumido pelo processo atual, e a necessidade de dar tempo de CPU justo a todos os processos.

#### **Resumo do Processo de Decisão**

1. **Criação de Processo (Pai ou Filho):** Depende da prioridade e necessidade imediata de cada processo.
2. **Término de Processo:** Escolher o próximo processo pronto ou executar o processo ocioso se não houver processos prontos.
3. **Bloqueio para E/S:** Escolher o próximo processo pronto, potencialmente aquele que desbloqueará o mais rapidamente possível a operação em andamento.
4. **Interrupção de E/S:** Escolher entre o processo que ficou pronto, continuar o atual, ou um terceiro processo, baseado em prioridades.
5. **Interrupção do Relógio:** Decidir trocar ou não de processo a cada interrupção periódica, para garantir eficiência e justiça na alocação de tempo de CPU.
6. 
Uma decisão de escalonamento pode ser feita a cada interrupção ou a cada k-ésima interrupção de relógio por: 
-  Algoritmo de escalonamento [não preemptivo]: escolhe um processo e o executa até que ele seja bloqueado (seja em E/S ou esperando por outro processo), ou libera voluntariamente a CPU. Um recurso não preemptível, por sua vez, é um recurso que não pode ser tomado do seu proprietário atual sem potencialmente causar uma falha.
-  Algoritmo de escalonamento [preemptivo]: escolhe um processo e o deixa executar por no máximo um certo tempo fixo → suspensão do processo e escolha de novo pelo escalonador. Um recurso preemptível é aquele que pode ser retirado do processo proprietário sem causar-lhe prejuízo algum.

==A questão se um recurso é preemptível depende do contexto. Em um PC padrão, a memória é preemptível porque as páginas sempre podem ser enviadas para o disco para depois recuperá-las. No entanto, em um smartphone que não suporta trocas (swapping) ou paginação, impasses não podem ser evitados simplesmente trocando uma porção da memória.==

Diferentes áreas de aplicação (e de tipos de sistemas operacionais) têm diferentes algoritmos de escalonamento:

- [Lote]: folhas de pagamento, estoques, contas a receber, contas a pagar, cálculos de juros (em bancos), processamento de pedidos de indenização (em companhias de seguro) e outras tarefas periódicas; 
- [Interativo]: usuários interativos ou múltiplos usuários (servidores); 
- [Tempo real]: processos sabem que não podem executar por longos períodos e em geral realizam o seu trabalho e bloqueiam rapidamente.

![[Pasted image 20240526133015.png]]

## Escalonamento em sistemas em lote

Primeiro a chegar, primeiro a ser servido (first-come, first-served - [FCFS])  
- Não preemptivo; 
- Basicamente, há uma fila única de processos prontos; 
- Fácil de compreender e fácil de implementar; 
- Controle de todos os processos por uma única lista encadeada; 
- Desvantagem: um processo limitado pela computação com posterior leitura de bloco vs muitos processos limitados pela E/S.

Observe a Figura 2.41. Nela vemos quatro tarefas A, B, C e D com tempos de execução de 8, 4, 4 e 4 minutos, respectivamente. Ao executá-las nessa ordem, o tempo de retorno para A é 8 minutos, para B é 12 minutos, para C é 16 minutos e para D é 20 minutos, resultando em
uma média de 14 minutos.

Agora vamos considerar executar essas quatro tarefas usando o algoritmo tarefa mais curta primeiro, como mostrado na Figura 2.41(b). Os tempos de retorno são agora 4, 8, 12 e 20 minutos, resultando em uma média de 11 minutos. A tarefa mais curta primeiro é
provavelmente uma ótima escolha. Considere o caso de quatro tarefas, com tempos de execução de a, b, c e d, respectivamente. A primeira tarefa termina no tempo a, a segunda no tempo a + b, e assim por diante. O tempo de retorno médio é (4a + 3b + 2c + d)/4. Fica claro que
a contribui mais para a média do que os outros tempos, logo deve ser a tarefa mais curta, com b em seguida, então c e finalmente d como o mais longo, visto que ele afeta apenas seu próprio tempo de retorno.

![[Pasted image 20240526133844.png]]

Vale a pena destacar que a tarefa mais curta primeiro é ótima apenas quando todas as tarefas estão disponíveis simultaneamente.

Tempo restante mais curto em seguida (shortest remaining time next - [SRTN]) 
- Preemptivo; 
- O tempo de execução precisa ser conhecido antecipadamente; 
- Quando uma nova tarefa chega, seu tempo total é comparado com o tempo restante do processo atual; 
- Permite que tarefas curtas novas tenham um bom desempenho.

## Escalonamento em sistemas interativos

Escalonamento por chaveamento circular (round-robin - [RR]) 
- Preemptivo; 
- Um dos mais antigos, simples, justos e amplamente usados; 
- Fácil de implementar com manutenção de uma lista de processos executáveis; 
- A cada processo é designado um quantum, durante o qual ele é deixado executar.

![[Pasted image 20240526152339.png]]

A única questão realmente interessante em relação ao escalonamento circular é o comprimento do quantum. Chavear de um processo para o outro exige certo montante de tempo para fazer toda a administração, salvando e carregando registradores e mapas de memória, atualizando várias tabelas e listas, carregando e descarregando memória cache, e assim por diante.

Escalonamento por chaveamento circular (round-robin - [RR]) 
- Chaveamento de processo ou chaveamento de contexto (salvar e carregar registradores e mapas de memória, atualizar várias tabelas e listas, carregar e descarregar memória cache, e assim por diante) exige tempo.

![[Pasted image 20240526134234.png]]

Estabelecer o quantum curto demais provoca muitos chaveamentos de processos e reduz a eficiência da CPU, mas estabelecê-lo longo demais pode provocar uma resposta ruim a solicitações interativas curtas. Um quantum em torno de 20-50 ms é muitas vezes bastante razoável.

Escalonamento por prioridades 
- A necessidade de levar em consideração fatores externos leva ao escalonamento por prioridades: a cada processo é designada uma prioridade, e o processo executável com a prioridade mais alta é autorizado a executar; 
- Diminuir a prioridade do processo que está sendo executado em cada tique do relógio pode evitar que processos de prioridade mais alta executem indefinidamente; 
- E um quantum máximo?

A Figura abaixo mostra um sistema com quatro classes de prioridade. O algoritmo de escalonamento funciona do seguinte modo: desde que existam processos executáveis na classe de prioridade 4, apenas execute cada um por um quantum, estilo circular, e jamais se importe com classes de prioridade mais baixa.

Se a classe de prioridade 4 estiver vazia, então execute os processos de classe 3 de maneira circular. Se ambas as classes — 4 e 3 — estiverem vazias, então execute a classe 2 de maneira circular e assim por diante.

![[Pasted image 20240526134637.png]]

Um algoritmo simples para proporcionar um bom serviço para processos limitados pela E/S é configurar a prioridade para 1/f, onde f é a fração do último quantum que o processo usou. Um pro-
cesso que usou apenas 1 ms do seu quantum de 50 ms receberia a prioridade 50, enquanto um que usasse 25 ms antes de bloquear receberia a prioridade 2, e um que usasse o quantum inteiro receberia a prioridade 1.

Múltiplas filas 
- Uma possibilidade é estabelecer classes de prioridade; 
- Exemplo: Processo que precisa computar por 100 quanta:

![[Pasted image 20240526134823.png]]

Processo mais curto em seguida (shortest process next - SPN) 
- Podemos minimizar o tempo de resposta geral executando a tarefa mais curta primeiro; 
- Como descobrir qual dos processos atualmente executáveis é o mais curto? Estimativas baseadas no comportamento passado (envelhecimento ou aging).

Suponha que o tempo estimado por comando para alguns processos é
T0. Agora suponha que a execução seguinte é mensurada como sendo T1. Poderíamos atualizar nossa estimativa tomando a soma ponderada desses dois números, isto é, aT0 + (1 − a)T1. Pela escolha de a podemos decidir que o processo de estimativa esqueça as execuções anteriores rapidamente, ou as lembre por um longo tempo. Com a = 1/2, temos estimativas sucessivas de

T0 
T0/2 + T1/2 
T0/4 + T1/4 + T2/2 
T0/8 + T1/8 + T2/4 + T3/2

Após três novas execuções, o peso de T0 na nova estimativa caiu para 1/8. A técnica de estimar o valor seguinte em uma série tomando a média ponderada do valor mensurado atual e a estimativa anterior é às vezes chamada de envelhecimento (aging). Ela é aplicável a muitas situações onde uma previsão precisa ser feita baseada nos valores anteriores. O envelhecimento é especialmente fácil de implementar quando a = 1/2. Tudo o que é preciso fazer é adicionar o novo valor à estimativa atual e dividir a soma por 2 (deslocando-a 1 bit para a direita).

Escalonamento por loteria

A ideia básica é dar bilhetes de loteria aos processos para vários recursos do sistema, como o tempo da CPU; 
- Sempre que uma decisão de escalonamento tiver de ser feita, um bilhete de loteria será escolhido ao acaso, e o processo com o bilhete fica com o recurso; 
- ↑ importante o processo ↑bilhetes ↑mais chances de acesso à CPU. 
- Processos cooperativos podem trocar bilhetes se assim quiserem: processos cliente e servidor

A ideia básica é dar bilhetes de loteria aos processos para vários recursos do sistema, como o tempo da CPU. Sempre que uma decisão de escalonamento tiver de ser feita, um bilhete de loteria será escolhido ao acaso, e o processo com o bilhete fica com o recurso. Quando aplicado ao escalonamento de CPU, o sistema pode realizar um sorteio 50 vezes por segundo, com cada vencedor recebendo 20 ms de tempo da CPU como prêmio.

Processos mais importantes podem receber bilhetes extras, para aumentar a chance de vencer. Se há 100 bilhetes emitidos e um processo tem 20 deles, ele terá uma chance de 20% de vencer cada sorteio. A longo prazo, ele terá acesso a cerca de 20% da CPU. Em comparação com o escalonador de prioridade, em que é muito difícil de afirmar o que realmente significa ter uma prioridade de 40, aqui a regra é clara: um processo que tenha uma fração f dos bilhetes terá aproximadamente uma fração f do recurso em questão.

O escalonamento de loteria pode ser usado para solucionar problemas difíceis de lidar com outros métodos. Um exemplo é um servidor de vídeo no qual vários processos estão alimentando fluxos de vídeo para seus clientes, mas em diferentes taxas de apresentação dos quadros. Suponha que os processos precisem de quadros a 10, 20 e 25 quadros/s. Ao alocar para esses processos 10, 20 e 25 bilhetes, nessa ordem, eles automaticamente dividirão a CPU em mais ou menos a proporção correta, isto é, 10 : 20 : 25.

Escalonamento por fração justa

Até agora presumimos que cada processo é escalonado por si próprio, sem levar em consideração quem é o seu dono; 
- Usuário 1 com 9 processos (90% de CPU) e usuário 2 com 1 processo (10% de CPU); 
- Se dois usuários têm cada um 50% da CPU prometidos, cada um receberá isso, não importa quantos processos eles tenham em existência. Como exemplo, considere um sistema com dois usuários, cada um tendo a promessa de 50% da CPU. O usuário 1 tem quatro processos, A, B, C e D, e o usuário 2 tem apenas um processo, E. Se o escalonamento circular for usado, uma sequência de escalonamento possível que atende a todas as restrições é a seguinte: A E B E C E D E A E B E C E D E ...


## Escalonamento em sistemas de tempo real

O tempo é essencial: CD player, monitoramento de pacientes em uma UTI, piloto automático em um avião, controle de robôs em uma fábrica automatizada, etc; 
- Sistemas de tempo real crítico: há prazos absolutos que devem ser cumpridos; 
- Sistemas de tempo real não crítico: descumprir um prazo é indesejável, mas mesmo assim tolerável. 
- Processos geralmente têm vida curta e podem ser concluídos em bem menos de um segundo; 
- Em caso de evento externo, o escalonador programa os processos para atender todos os prazos.

Os eventos a que um sistema de tempo real talvez tenha de responder podem ser categorizados como: 
- Periódicos: ocorrem em intervalos regulares; 
- Aperiódicos: ocorrem de maneira imprevisível. 

Os eventos a que um sistema de tempo real talvez tenha de responder podem ser categorizados ainda como periódicos (significando que eles ocorrem em intervalos regulares) ou aperiódicos (significando que eles ocorrem de maneira imprevisível). Um sistema pode ter de responder a múltiplos fluxos de eventos periódicos. Dependendo de quanto tempo cada evento exige para o processamento, tratar de todos talvez não seja nem possível. Por exemplo, se há m eventos periódicos e o
evento i ocorre com o período Pi e exige Ci segundos de tempo da CPU para lidar com cada evento, então a carga só pode ser tratada se:

- Um sistema de tempo real escalonável atende a:

![[Pasted image 20240526135331.png]]

Diz-se de um sistema de tempo real que atende a esse critério que ele é escalonável. Isso significa que ele realmente pode ser implementado. Um processo que fracassa em atender esse teste não pode ser escalonado, pois o montante total de tempo de CPU que os processos querem coletivamente é maior do que a CPU pode proporcionar.

## Política versus mecanismo

Além de podermos ter processo de diferentes usuários competindo pela CPU, podemos ter um processo com muitos filhos executando sob seu controle; 
- Exemplo: 
- Pai: Um processo de sistema de gerenciamento de banco de dados 
- Filho 1: análise sintática de consultas; 
- Filho 2: acesso ao disco; 
- Filho 3: lidando com solicitação diferente; 
- Filho 4: outra função específica para realizar. 
- Nenhum dos escalonadores discutidos aceita qualquer entrada dos processos do usuário sobre decisões de escalonamento, e agora?

- Mecanismo de escalonamento é DIFERENTE de política de escalonamento; 
- O algoritmo de escalonamento é parametrizado de alguma maneira, mas os parâmetros podem estar preenchidos pelos processos dos usuários; 
- O núcleo oferece uma chamada de sistema pela qual um processo pode estabelecer (e mudar) as prioridades dos filhos: mecanismo no núcleo e política no processo do usuário.
## Escalonamento de threads

Quando vários processos têm cada um múltiplos threads, temos dois níveis de paralelismo presentes: processos e threads; 

Escalonar nesses sistemas difere substancialmente, dependendo se os threads de usuário ou os threads de núcleo (ou ambos) recebem suporte.

![[Pasted image 20240526140035.png]]

Threads de usuário 
- Qual algoritmo usar? O escalonamento circular e o de prioridade são os mais comuns; 
- A única restrição é a ausência de um relógio para interromper um thread que esteja sendo executado há tempo demais. 
- Isso é um problema?

Threads de núcleo

![[Pasted image 20240526140211.png]]

![[Pasted image 20240526140314.png]]

## [[Deadlocks]]


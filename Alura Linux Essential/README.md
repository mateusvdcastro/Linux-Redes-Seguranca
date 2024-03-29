# Notes and studies about Linux, Network and CyberSecurity


## Linux

> terminal: (o app do terminal executa um console, que roda um programa chamado shell do interpretador bash) <br>
> command options arguments    ex: type -t ls                    obs: no geral segue esta ordem, mas existem comandos que fogem a regra

## Comandos Gerais
```
$ man dpkg                 => O comando Linux dpkg, trabalha em uma camada mais baixa do que os utilitários APT. O dpkg é na verdade é o responsável pelo gerenciamento de pacotes no LINUX em distribuições baseadas em Debian, como por exemplo Ubuntu e Kali Linux.
$ man -k printf            => Com o -k buscamos a palavra chave e buscamos diversas referências para a palavra chave.
$ dpkg --list              => ver todos os pacotes instalados
$ sudo dpkg -i nomedoarquivo.deb        => instala um pacote
$ sudo dpkg -r nomedoarquivo.deb        => remove o pacote
$ sudo dpkg -P ou --purge               => apaga o pacote e todos os arquivos relacionados
$ passwd => para alterar a senha do super usuário
$ sudo apt-get install nomedopacote
$ sudo apt-get -f install               => instala todas as dependências não resolvidas do nosso sources.list
$ ls           => lista os arquivos da pasta atual
$ ls -l        =>  lista com detalhes, teremos o conteúdo de dentro do diretório
$ ls --help    => mostra o help do ls, ou seja, obter ajuda para comandos externos (não builtin) normalmente utiliza-se a opção --help.
$ ls -h        => -h abreviação do --help, mas apresenta comportamento inesperado
$ ls -a        => lista todos os arquivos inclusive os ocultos que iniciam com .
$ ls -la       => executa o all e o type (-a e -l) juntos
$ ls -d        => O ls tem uma opção que se chama -d minúsculo e quando usamos essa opção o que estamos dizendo é que queremos analisar um diretório específico.
$ ls -ld       => Se quisermos ver informações sobre o diretório em si, e não sobre o conteúdo do diretório
$ ls -i || ls --inode  =>  Cada arquivo é representado por um ou mais nós que trazem a informação base dos arquivos que estão ligados que por sua vez estão ligados a outros nós que estão ligados a outros nós que trazem dados de arquivos, diretórios e etc e assim por diante. Então, é um pouco uma árvore que vai se interligando com todos esses nós. Temos, ainda, uma opção do ls que é o ls -i que mostra a informação desses nós.
$ ls --color=auto      => coloca uma cor para diferenciar os itens listados, branco, se for normal, verde se for executável, azul escuro se for diretório e azul claro se for um link.
$ ls -F             => indica, visualmente, através de caracteres o que cada coisa que está na lista é. Um arquivo normal não possui nenhum carácter, um arquivo executável possui um asterisco, um diretório é marcado pela barra e um link possui um arroba.
$ ls bemvindo*      => lista todos os arquivos com bemvindo - output: bemvindo.txt bemvindo2.txt
$ ls *              => mostra os diretórios atuais e entra neles em um nível dos diretórios filhos (ls -R entra em mais de um nível)
$ ls *.txt          => mostra todos os arquivos .txt
$ ls --reverse || ls -r     =>Para modificar a ordenação podemos digitar ls --reverse que estaremos pedindo: "Porfavor, reverta a ordem" e ele trará do "z" até o "a"
$ ls --sort=size || ls -S   => exibe por odem de tamanho (mas não podemos ver o tamanho dos arquivos)
$ ls --format=long ||ls -l  => Para ver em uma lista onde podemos confirmar o tamanho dos arquivos. Para verificar mais informações em uma lista longa podemos dizer ao ls para formatar a sua saída em um formato longo.
      ex: /bin/ls --format=long --reverse --sort=size
$ ls --sort=time ||ls -t    => mostrar por tempo de criação
$ ls --recursive ||ls -R    => Mostra os diretórios atuais mas também todos os arquivos filhos deles de maneira recursiva
$ cat arquivo.txt  programa.c => cat concatena arquivos, aqui ele irá juntar o arquivo.txt e o programa.c
$ cat arquivo.txt             => mostra o conteúdo de arquivos.txt
$ cat texto*.txt              => concatena o conteúdo de todo arquivo "texto + alguma coisa + .txt"
$ cat texto?.txt              => concatena o conteúdo de todo arquivo "texto + algum caractere + .txt" obs: apenas um caracter seja número, letra, etc
$ cat arquivo[123].txt   => mostra concatenado os arquivo1.txt arquivo2.txt arquivo3.txt
$ cat arquivo[12].txt    => mostra concatenado os arquivo1.txt arquivo2.txt
$ cat arquivo[0-9].txt   => mostra arquivo0.txt até o arquivo9.txt
$ cat arquivo[A-Z].txt   => Com isso estamos dizendo que queremos um carácter qualquer de A até Z, escrito em letras maiúsculas
$ cat arquivo[a-z].txt   => fornecerá qualquer letra minúscula.
$ cat {arquivo*, texto?.txt}  => Pegaremos tudo o que começa com arquivo, mas queremos pegar também todos os arquivos que começam com texto, seguidos de qualquer coisa (?) e tendo no fim .txt. Para dizer que queremos ou o primeiro padrão ou o segundo, colocamos isso dentro de chaves
$ type                  => verificar o tipo de um comando ex: type ls / type echo
$ cd 'nome da pasta'    => entra na pasta/diretório
$ cd ..                 => para voltar uma pasta
$ cd -                  =>  Podemos nem lembrar qual era o diretório que estávamos antes, o último diretório que utilizamos. Para isso digitaremos cd -. O hífen é utilizado para voltarmos ao último diretório que estávamos utilizando.
$ locate arquivo/programa/etc     => Busca no sistema inteiro o parâmetro digitado. O locate possui um banco de dados onde ele armazena todos os arquivos que existem, isto é, arquivos que ele é capaz de localizar. Então, isso é um banco de dados que ele mantêm e, por isso, toda vez que buscamos algo ele não necessita sair varrendo todos os arquivos e todos os diretórios para achar o que queremos. Ele vai rapidamente nesse banco de dados, que contem todos os nomes de diretórios e arquivos, encontra o que solicitamos e nos traz o que buscávamos. Esse é um processo que já está otimizado, como o locate é bastante utilizado no dia a dia ele simplesmente mantém tudo já otimizado para realizar a busca.
$ sudo updatedb                   => Quando apagamos arquivos ou adicionamos, precisamos atualizar o bando de dados para que o locate busque corretamente os arquivos
$ locate -e texto                 => Podemos rodar um locate com a opção -e que é de arquivos apagados e arquivos que não existem mais. Então, ele não vai mais nos mostrar arquivos que não existem mais.
$ locate "*/log-*"                => irá buscar todos os arquivos que "diretório qualquer + log- + qualquer coisa"
$ sudo apt-get install mlocate    => nem todo SO tem o Locate instalado, para instalar digite esse comando
$ mkdir     => para criar uma pasta
$ mkdir -p  => cria várias pastas que você informar caso elas não existam ex: mkdir -p Pictures/fotos/2020/trimestre1
$ mkdir -p Pictures/foto/201{1,2,3,4,5}/trimestre{1,2,3,4}  => usamos globbing para criar as pastas 2011, 2012, 2013 ..., todas com trimestre 1234 dentro de cada uma
$ mkdir -pv ferias/201{3,4,5}/{julho,dezembro}   => Utilizando o mkdir e o globbing crie o diretório ferias dentro do diretório Pictures, e dentro dele os diretórios 2013, 2014 e 2015. Dentro de cada um desses três diretórios, crie os diretórios julho e dezembro.
$ mkdir -pv => É possível também combinar o -p com a opção -v (verbose), que irá listar todas as operações que estão sendo feitas
$ rmdir     => remove um diretório se ele estiver vazio  ex: rmdir Pictures/fotos/2020/trimestre1  -  removerá apenas trimestre1
$ rmdir -p  => remove os diretórios enquanto estiverem vazios ex: rmdir -p Pictures/fotos/2019/trimestre1 Primeiro o rmdir irá remover o diretório trimestre1. A partir desse momento o diretório 2019 não está mais vazio e também será removido. Como o diretório fotos possui outros diretório, ele não é removido. Se tivéssemos uma sequência de diretórios vazios, todos seriam removidos.
$ rm loja/*  => remove todo dir vazio que estiver dentro de loja
$ rm -i loja/*  => pergunta se quer remover todo dir vazio que estiver dentro de loja
$ rm -r loja/*  => remove tudo o que estiver dentro de loja de maneira recursiva (-r e -R tanto faz)
$ rm -rfi 'nome da pasta'  => remover uma pasta de maneira forçada (-f), de maneira recursiva (-r) e de maneira interativa para te perguntar sobre cada passo (i) {i serve como segurança, caso você digite "rm -fv arquivos /" com este espaço errado vc apaga tudo desde o dir raiz}
$ rm
$ touch     => O comando touch altera a data de modificação de um arquivo para a data e hora atuais do sistema. O conteúdo do arquivo em si não é modificado, é como se apenas "tocássemos" no arquivo. Caso o arquivo não exista, o comportamento padrão é criar o arquivo.
$ apt-get   => instala os pacotes e todas as dependências 
$ dpkg      => instala um único pacote .deb que for informado  Ex: mysql5.6....deb
$ echo      =>  ex: echo Mateus, bom dia! -- devolve o que eu digitei (como se fosse um print)
$ echo Meu diretório eh `pwd`  => aqui o echo irá interpretar o pwd como o comando pwd de fato por conta das crases
$ pwd       => mostra o diretório atual
$ who       => O comando who imprime informações sobre todos os usuários que estão conectados no momento.
$ who -b    => -b exibe a hora da última inicialização do sistema .
$ whoami    => mostra o seu User.
$ w         => Este utilitário informa quais os usuários que estão conectados e o que eles estão executando.
$ find / -name “*forza*”   => Para buscar um arquivo utilizando o terminal, basta pedir para ele procurar (find), em todo meu sistema(/), algo que contenha o nome (-name) que queremos.
$ find / -iname pagamentos.csv   => Para que não considere se é maiúscula ou minúscula, temos que falar para o find ignorá-las. Então, basta colocar o parâmetro i antes do name.
$ find -name “log*”   => Encontra no diretório atual todas os arquivos e diretórios que contenham log no nome
$ find -name “*log*” -o "*user*"   => Irá buscar todo arquivo ou dir com o log ou (-o) user no nome  (se tirar o "-o" ele busca com "e" ao invés de "ou")
$ find -name \( “*log*” -o "*user*" \) -a -name "*7*"   => Irá buscar arquivos ou dir com o nome log ou user, e (-a de and) que tenham o número 7
$ find -name “*log*” ! "*7*"   => Busca todo log que não tenha o número 7 no nome
$ find -type f        => Ele traz só os que são arquivos
$ find -type d        => Ele traz só os que são diretórios
$ find /bin -type l   => Retorna todos os links simbólicos (nomes em azul) do diretório /bin
$ find -size +500k    => Retorna todos os arquivos com mais de 500KB
$ find -user user_name    => Retorna todos os arquivos de domínio do super usuário
$ find -group root    => Retorna o grupo de arquivos cujo dono é o user root
$ find -atime -7      => Retorna os arquivos que acessei nos últimos 7 dias
$ find -mtime -3      => Retorna os arquivos que modifiquei nos últimos 7 dias
$ find -ctime -2      => Retorna os arquivos que mudei (ex: permissões) nos últimos 2 dias
$ tar     => O Tar é um dos comandos Linux mais utilizados para arquivamento (vários arquivos em um único arquivo).Tar significa tape archive. Na maioria dos casos em que o processo é realizado com o comando Tar, é gerado um arquivo com extensão .tar. A vantagem é que o tar consegue manter as permissões dos arquivos, bem como links diretos e simbólicos, sendo interessante por exemplo para realizar backups.
$ tar -cvf loja.tar *     => Se eu quero criar um arquivo vou falar para o tar a opção -c, de create, estou falando para ele criar, quero que ele crie um arquivo, um file -f, e vou falar o nome desse arquivo que quero criar(-v de --verbose para exibir na tela oq está acontecendo). Quero que ele crie para mim o arquivo loja.tar e guarde todos os arquivos do dir atual (* lembrando que o * não pega os arquivos ocultos (.arquivo))
$ tar -cvf loja.tar loja  => compacta arquivos visíveis e invisíveis do diretório loja em loja.tar
$ tar -tf loja.tar        => para ver o contúdo de um arquivo .tar, -t é o mesmo que --list para listar o conteúdo do arquivo e -f para indicar que estamos lidando com um arquivo (file)
$ tar -xvf loja.tar       => para extrair o arquivo .tar e -v de verbose para aparecer no terminal o que está acontecendo
$ tar -czvf loja.tar.gz bemvindo.html bemvindo2.html    => faz a compressão dos arquivos (reduz o tamanho dele) bemvindo.html e bemvindo2.html, e zipa para a pasta loja.tar.gz usando o -z de gzip
$ tar -xzvf ../loja/loja.tar.gz  => descompacta o arquivo loja.tal.gz 
$ tar -cjvf loja.tar.bz2 bemvindo.html bemvindo2.html    => faz a compressão dos arquivos (reduz o tamanho dele) bemvindo.html e bemvindo2.html, e zipa para a pasta loja.tar.gz usando o -j para o bzip
$ tar -xzvf ../loja/loja.tar.bz2  => descompacta o arquivo loja.tal.bz2
$ zip     => compacta arquivos do meu diretório
$ zip bemvindo.zip *.txt    => zipa todos os arquivos .txt e guarda tudo na bemvindo.zip
$ zip -r projeto.zip Projetos/  => zipa tudo o que está dentro da pasta Projetos/ de maneira recursiva -r (o comando tar faz isso por padrão)
$ zip arquivo.zip -@  => com o -@ o terminar irá pedir para que eu digite o nome dos arquivos que eu quero compactar
$ zip -@ arquivo.zip < arquivos_a_compactar.txt  => aqui iremos redirecionar como entrada o arquivo arquivos_a_compactar.txt, que contem os caminhos dos arquivos a compactar, e salvar no arquivos.zip
$ find . -name “*log*” -name “*2016*” | zip -@ logs.zip => iremo encontrar todo nome que contenha log e 2016, e redirecionar a saída para o "zip -@ logs.zip" que irá compactar todo arquivo e salvar em logs.zip
$ unzip   => descompacta arquivos
$ unzip -l work.zip               => mostra todos os arquivos compactados na pasta work.zip
$ unzip -q projeto.zip      => descompacta a pasta projetos.zip no modo silêncioso (quiet -q) 
$ date    => data atual
$ help    => mostra informações de um comando, O help nos ajuda referente as funções de coisas definidas em cima do shell, isto é, nos builtin do shell. ex: help type 
$ env     => (environment) mostra todas as variáveis de ambiente criadas
$ df -h                   => lista os dispositivos montados (hds, ssds, etc)
$ chown                   => significa change ownership, usada para o dono de arquivos. Com o chown você pode mudar o dono de arquivos, diretórios e links. Se um usuário comum desejar realizar certas mudanças em um arquivo, um superusuário pode usar o comando chown para alterar o dono do arquivo e permitir tal alteração.
$ chown -R                => Muda o dono dos arquivos de maneira recursiva
$ chown user:grupo arquivo=> Muda um user para um grupo
$ chmod u+x arquivo       => conseguir permissão de execução de um arquivo (o u significa o user root), -x para retirar a permissão
$ chmod u+w arquivo       => conseguir permissão de escrita de um arquivo, -w para retirar a permissão
$ chmod u+r arquivo       => conseguir permissão de leitura de um arquivo, -r para retirar a permissão
$ chmod o+r arquivo       => conseguir permissão de leitura de um arquivo para outros usuários -o (ou seja o+wrx e o-wrx são válidos)
$ chmod g+r arquivo       => conseguir permissão de leitura de um arquivo para um grupo -g (ou seja g+wrx e g-wrx são válidos)
$ chmod uog+wrx           => para dar todas as permissões para usuários, grupos e outros
$ chmod u=w,g=rx,o=wr     => outra sintaxe para o chmod
$ chmod -R u+r Documents  => -R para aplicar a recursividade. Aqui estamos dando a permissão de leitura para todos os arquivos dentro do diretório documents
$ chmod --reference=arquivo1 arquivo2 => Desta forma posso passar as mesmas permissões de um arquivo para outro
! dar permissão de escrita em um diretório (o+w), significa dizer que outras pessoas podem criar e apagar arquivos nele (mesmo arquivos do root) 
$ chmod +t diretório      => t é um caracter exclusivo para diretórios, com ele dizemos que os arquivos desse diretório não podem ser apagados por outros usuários
$ mv loja/mensagem.txt loja/bemvindo2.txt     => Move o mensagem.txt para bemvindo2.txt o "renomeando-o" (maneira de renomear arquivos)
$ mv loja/mensagem.txt Documents/             => Move o mensagem.txt para Documents
$ cp arquivo.txt arquivo2.txt       => copia o arquivo.txt, e cria o arquivo2.txt com as mesmas informações do primeiro
$ cp -R projetos-java/ projetos-c#/ => Para copiar o diretório projetos-java para o diretório projetos-c#, passamos o -R como argumento para o cp, para que ele possa copiar os diretórios de maneira recursiva
$ cp -R loja loja_nova              => copia de maneira recursiva tudo o que está no dir loja para loja_nova
$ cp loja/contato.html loja2        => copiando o arquivo contato.html para o diretório loja2
$ cp -i loja/bemvindo.html loja/bemvindo2.html => O cp subscreve, então, temos que tomar muito cuidado quando utilizamos o copy, quando copiamos um arquivo para outro arquivo. Tanto que muitas vezes o que fazemos é o cp e pedimos para ele nos perguntar antes o que devemos fazer, para isso, digitamos cp -i, ele nos perguntará se queremos subscrever: "*overwrite 'loja/bemvindo2.html' ? *". E como não queremos que nada seja subscrito , digitaremos apenas um n, de "no" para dizermos que não queremos que seja subscrito
$ cp loja/bemvindo1.html loja/bemvindo2.html loja3/  => copia os arquivos bemvindo{1,2}.html para o diretório loja3
$ cp -v loja/bemvindo1.html loja/bemvindo2.html loja5/ => copia bemvindo{1,2}.txt para loja5 mas exibe no terminal (de forma mais visual) o que está ocorrendo com o parâmetro -v de --verbose
$ cp -vu loja/* lojabackup/       => copia todo arquivo que sofreu alguma atualização (-u de update) em loja, para o dir lojabackup
$ cp -b loja/* loja2              => Se já existir, um arquivo com esse nome "loja2" podemos simplesmente fazer um backup desse arquivo e, para isso, usamos o -b de backup. Podemos verificar que temos dois tipos de arquivo, aqueles que possuem um til e que representam a versão antiga dos arquivos e os que estão sem o acento que representam a versão nova. O til (~) no final, no último carácter, portanto, é um padrão para indicar que determinado arquivo é um backup de um arquivo que tínhamos.
$ history                         => mostra o histórico de comandos executados no shell
$ which nome_do_programa          => mostra qual executável será executado - ex: wich zip - output: /user/bin/zip
$ which -a nome_do_programa       => mostra todos os caminhos que se relacionem com este
$ whereis zip                     => Ele nos mostra que o zip está em usr/bin/zip, e em /home/guilherme/zip e temos também um manual do zip, o /usr/share/man/man1/zip.1.gz
$ echo $?                         => Estamos perguntando qual é o último resultado que um comando, um programa teve. Se deu tudo "ok" o resultado é 0.
$ comando1 && comando 2           => O && é usado para falar que o segundo comando será executado apenas se o exit code do primeiro comando for igual a zero, isto é, apenas se o primeiro for sucesso. Assim, se o primeiro não tivesse sido executado com sucesso, o segundo comando não seria executado.
$ comando1 || comando 2           => Para dizermos o "ou" utilizamos o pipe duas vezes || , o pipe é também chamado de cano.
$ comando_qualquer ; echo "Bom dia"  => Para executar dois comandos em sequência, podemos utilizar o ; (ponto e vírgula). Os comandos serão executados independente do resultado do anterior.
$ du /arquivo/                       => Para descobrir quanto do disco que o diretório está usando basta ir até o terminal e dizer: "por favor, mostre-me o quanto do disco (du, disk usage) o diretório /arquivo||pasta||app/ está usando"
$ du -s /arquivo/                    => Queremos que o programa resuma sua saída e nos mostre apenas o total no diretório. Como queremos que ele sintetizar (-s, summarize) a informação
$ du -sh /arquivo/                   => A saída padrão do comando du mostra os números em kilobytes. Só que esse número não fica muito compreensível para nós, precisamos deixá-lo mais inteligível para humanos (-h). Podemos utilizar as duas expressões separadamente, -s -h, ou juntas -sh
$ df -h /arquivo/                    => Para saber o quanto do disco está sendo usado, utilizamos outro comando: df .Este retorna o espaço livre, ou ocupado, de cada partição no sistema. Da mesma forma que fazemos com o du, podemos especificar o diretório, assim, ele retorna somente a partição da qual esse diretório pertence. Podemos também utilizar a opção -h e teremos uma saída mais legível
$ wc post-do-blog.txt             => exibe o número de linhas do arquivo e depois o número de palavras presente no arquivo
$ wc -L post-do-blog.txt          => exibe o número de caracteres da linha mais longa do arquivo
$ more post-do-blog.txt           => more é um visualizador do arquivo, "Enter" rola uma linha para baixo, "Backspace" rola uma página abaixo, "b" volta uma página para trás, "q" para sair, "v" para entrar no editar VI e "/" para procurar algo no texto ex: /Sql   
$ less texto1.txt                 => less é o nome de um visualizador, o mesmo que é exibido quando usamos o comando "$ man ". Utilizamos as setas para navegar, espaço para ir para frente, "/" ou "?" para buscarmos alguma coisa ("n" de next, para ver a próxima ocorrência e "shift + n" para voltar), usamos o "q" para sair, "f" para rolar uma página, "b" para voltar uma página, "g" ou "home" para voltar ao começo do arquivo, "end" vai para o final, "crtl + l" reorganiza a tela.
$ nano arquivo                    => abre o editor de arquivos Nano, um ótimo visualizador e editor. Ctrl + k e Ctrl + u para recortar e colar uma linha de texto
$ vi arquivo                      => abre o editor e visualizador VI. I (Shift + i) e A (Shift + a) para inserir caracteres no início e no fim de uma linha, dd para excluir uma linha inteira. 
$ head -n 5 post-do-blog.txt      => exibe as 5 primeiras linhas do arquivo
$ tail -n 5 post-do-blog.txt      => exibe as 5 últimas linhas do arquivo
$ tail -n +30 post-do-blog.txt    => exibe a partir da linha 30
$ tail -n 1 /etc/passwd           => exibe a última linha do etc/passwd 
$ tail -f listagem.txt            => -f de follow, ele por padrão mostra as 10 últimas linhas e fica esperando novas atualizações, ou seja, podemos ir atualizando o arquivo listagem.txt em um bash e em outro bash acompanhar as novas linhas sendo criadas, se sobrescrevermos o arquivo o programa encerra
$ ls -la > listagem.txt           => guardou todo o output do comando ls em um arquivo (">" por padrão é "1>", explicando: 0 é a nossa stdin (standard input), 1 é a stdout (stardand output) e 2 é a stderr (standard error))
$ echo "Bem vindo..." >> listagem.txt  => estamos dando append no arquivo de listagem, ou seja, adicionando no final a mensagem "Bem vindo..."
$ cat /arquivo_inexistente 2> log.txt  => aqui posso direcionar a mensagem de erro (2 é o stderr) para um arquivo.txt
$ cat arquivo-nao-existe > novo_arquivo.txt 2>&1  => Para que a saída padrão do comando cat seja direcionada para um arquivo. Mas também quero que a saída de erro seja direcionada para esse mesmo arquivo.
$ apt-cache search mysql | less   => pega o resultado de "apt-cache search mysql"e passa como entrada para o comando less, isso que significa o "|"
$ cat programa.c post-do-blog.txt | wc => concatenas os dois arquivos, e passa esse ouput como input para o wc, outro exemplo do pipe "|"
$ cut -c 1-4 notasfiscais.posicional        => exibe do caracter 1 até o 4 de cada linha do arquivo "notasfiscais.posicional"
$ cut -c 1-4,10-15 notasfiscais.posicional  => exibe do caracter 1 até o 4, depois do 10 até 15, de cada linha do arquivo "notasfiscais.posicional"
$ cut -c 1-4,10-15 --output-delimiter=";" notasfiscais.posicional  => exibe do caracter 1 até o 4, depois do 10 até 15, de cada linha do arquivo "notasfiscais.posicional", mas separando por ";" cada passo
$ cut -f 1 -d: /etc/passwd        => pega o primeiro campo do texto presente em passwd (tudo o que estiver antes dos ":"), usamos o -f de field, o 1 de primeiro campos e -d de delimiter para setar o delimitador ":"
$ cut -f 1 -d: /etc/passwd | sort | less => pega o primeiro campos antes do ":", ordena em ordem alfabética e passa o output como entrada para o visualizador less
$ cut -c 1-4,5-14,15-20 - -output-delimiter=: notasfiscais.posicional | sort -k 2 -t: -o notasfiscais.ordenadas => passa o output do que está antes do pipe, para o sort, ele irá ordenar a partir do segundo campo -k 2, vendo pelo delimitador -t: e quardando o output com -o e salvando no notasfiscais.ordenadas (usamos -o ao invés de > para evitar problemas)
$ paste notasfiscais.preço notasfiscais.numeros      => junta esses dois arquivos um ao lado do outro, em notasficais.preco tenho uma coluna com o preco dos produtos e na outra uma coluna com o id destes produtos, o paste irá juntas essas colunas na ordem que estiverem no arquivo
$ paste -d: notasfiscais.preço notasfiscais.numeros  => irá juntar as colunas com o separador ":"
$ paste -s  notasfiscais.preço notasfiscais.numeros  => irá juntar as colunas com a coluna transposta, ou seja, ao invés de coluna, em linhas
$ sort usuários.txt | less        => ordena em ordem alfabética e exibe o texto no less
$ sort -k 2 -t: -u                => ele irá ordenar a partir do segundo campo -k 2, vendo pelo delimitador -t: e pegando apenas as linhas unicas -u de unique
$ sort -k 2 -t: -r                => Irá ordenar com o -r de --reverse, ou seja, agora do maior para o menor
$ grep SQL post-do-blog.txt       => mostra todas as ocorrencias da palavra SQL em post-do-blog.txt
$ grep -r SQL post-do-blog.txt    => busca de maneira recursiva as ocorrências da palavra SQL
$ grep -n SQL post-do-blog.txt    => mostra todas as ocorrencias da palavra SQL em post-do-blog.txt e o número da linha -n
$ grep -c SQL post-do-blog.txt    => conta em quantas linhas diferentes aparece a palavra SQL e retorna esse número
$ grep -i SQL post-do-blog.txt    => -i ignora maiúsculas e minúsculas, então exibe ambos os casos
$ grep '201.' post-do-blog.txt    => irá retornar todas as ocorrências de "201 + quarquer caracter", esse "." significa isso em expressões regulares
$ ls | grep [[:PUNCT:]]           => vai ixibir toda ocorrência de palavras que possuem alguma pontuação
$ grep '201[56]' post-do-blog.txt                  => irá retornar para 2015 e 2016
$ grep '201[0-9]' post-do-blog.txt                 => irá retornar de 2010 até 2019
$ grep '201[0-9]' post-do-blog.txt programa.c      => irá retornar de 2010 até 2019 nos dois arquivos
$ grep '201[0-9]' -l post-do-blog.txt programa.c   => -l irá listar os arquivos em que ele encontrou a ocorrência
$ grep '201[:digit:]' post-do-blog.txt => irá retornar todas as ocorrências de "201 + qualquer digito de 0 a 9"
$ grep '201[:alnum:]' post-do-blog.txt => irá retornar todas as ocorrências de "201 + qualquer digito de 0 a 9 ou qualquer letra de a-z ou A-Z"
$ grep '[:digit:],[:digit:]' post-do-blog.txt => "quarquer digito de 0 a 9" + vírgula + "qualquer digito de 0 a 9"
$ grep '[:digit:]\+,[:digit:]\+' post-do-blog.txt => "mais de um digito de 0 a 9 juntos" + vírgula + "mais de um digito de 0 a 9 juntos"
$ grep '[:digit:]\+,\?[:digit:]\+' post-do-blog.txt => "mais de um digito de 0 a 9 juntos" + vírgula opcional + "mais de um digito de 0 a 9 juntos"
$ grep '[:digit:]\*,\?[:digit:]\*' post-do-blog.txt => "nenhum ou mais de um digitos de 0 a 9" + vírgula opcional + "nenhum ou mais de um digitos de 0 a 9"
$ grep '[:digit:]\*[,\.][:digit:]\*' post-do-blog.txt => "nenhum ou mais de um digitos de 0 a 9" + vírgula ou . (usamos \ para que . signifique . e não qualquer digito) + "nenhum ou mais de um digitos de 0 a 9"
$ `pwd` => `` as aspas simples executam a sáida do comando digitado dentro delas.O shell irá executar o comando pwd e em seguida tentará executar seu resultado, que é o diretório atual, como se fosse um comando. Por esse motivo teremos um erro.
$ bash script.sh   => roda o script em um novo shell copiando as variáveis de ambiente do shell anterior
$ sh script.sh     => sh é um intérprete de linguagem de comando que executa comandos lidos a partir de uma sequência de linhas de comando , da entrada padrão ou de um arquivo especificado .
$ source script.sh => source irá executar o script no shell atual, isso ajuda a não usarmos variáveis de outros shells
$ . script.sh      => " . + espaço + nome do script" irá rodar o script no shell atual
$ . script.sh 2016 => 2016 é o primeiro argumento que passei ao meu script, que pode ser lido dentro dele com $1   ($0 é o caminho relativo do arquivo, se chamarmos o script com o caminho absoluto ele será também absoluto)
$ script.sh        => para executar o script dessa forma devemos mudar a variável path da seguinte forma "PATH=$PATH:${HOME}/bin"
$ #!               => #! chamados de shebangs, mostram ao nosso terminal qual interpretador ele deve usar para ler o script ex: #!/bin/bash
$ lsblk            => listar para mim os block devices, as conexões que eu tenho aqui de bloco (HDs), que armazenam dados, "lsblk" e ele traz para mim o "sda" que é o meu primeiro Block device que foi encontrou, é o primeiro HD que ele encontrou, "a" de primeiro HD, "b" de segundo HD, os dois são SATA, "sda" o primeiro HD que encontrou, "sdb" o segundo HD que ele encontrou.
$ sudo fdisk       => Com o fdisk podemos criar novas partições em um disco, até 4 partições primárias e inúmeras partições lógicas, dependendo somente do tamanho do disco (levando em conta que cada partição requer um mínimo de 40MB). Também podemos modificar ou deletar partições já existentes ou recém criadas no disco.
$ mkfs             => make um sistema de arquivos, file system, eu falo para o tipo de sistema de arquivo que eu quero utilizar, por padrão ele usa o ext2, um sistema que é compatível com o Linux, não com o Windows.Eu quero usar uma variação de sistema de arquivos mais moderna, o padrão ext2 só que hoje em dia quando damos "mkfs" para criar um sistema de partição de arquivo já existe até o ext4, por padrão vamos usar o "ext4 /dev/sdb1".
$ sudo mkfs -t ext4 /dev/sdb1 => exemplo de como o mkfs é utilizado
$ mount            => All  files  accessible  in a Unix system are arranged in one big tree, the file hierarchy, rooted at /.  These files can be spread out  over  several  devices.   The  mount  comman serves  to  attach  the filesystem found on some device to the big file tree.  Conversely, the umount(8) command will detach it again.
$ sudo mount /dev/sdb1 /mnt/secundario/ => exemplo de como o mount é usado
$ ls /mnt         => diretório em que são montados os hard disks
$ ls /media       => diretório em que são montados os drivers ópticos como o cdrom
$ top             => mostra informações do sistema, como o uso de cpu 
$ top -p 2255     => mostra somente as informações de um único processo, no caso o 2255
$ uptime          => O comando uptime  tem como principal função nos informar quanto tempo faz que o sistema está operando, ou seja, ligado.
$ free  -h        => vê o quanto de memória RAM tenho livre
$ dmesg | less    =>  Ele mostra para mim as várias informações durante o boot (salva os logs).
$ syslogd         => um servidor de arquivos log que roda em background (ele faz o gerenciamento desses arquivos)
$ ps              => mostra todos os processos que estão rodando no shell atual  
$ ps -e           => mostra todos os processos do sistema 
$ ps -ef          => mostra todos os processos do sistema com mais detalhes  ex: ps -ef | grep "vi"   - usamos o grep para buscar informações na lista
$ pstree          => Este utilitário lista os processos em execução usando o formato de árvore.
$ ps x            => Mostra os processos, seus números de identificação e os comandos usados para rodá-los
$ jobs            => Lista os processos inicializados a partir do terminal.
$ bg              => Este comando faz com que um processo (identificado por num), que está sendo executado em primeiro plano, passe a ser executado em segundo plano.
$ [processo] &    => esse E comercial depois do nome de algum programa faz com que ele fique rodando em segundo plano ex: gedit &
$ fg              => Este comando move processo em segundo plano (background) para o primeiro plano (foreground). O processo pode ser identificado pelo seu número (PID) ou pela ordem de entrada do processo em background.
$ kill  2801      => comando para encerrar um processo, no caso o processo nº 2801 que era o editor VI
$ kill  -9 2801   => -9 faz com que o um processo seja encerrado forçadamente 
$ service [programa] stop  => para parar a execução de algum programa
$ service [programa] start => para iniciar algum programa
$ dig www.alura.com.br => Dig (Domain Information Groper) é uma linha de comando que executa a pesquisa de DNS por consultas de nomes de servidores e mostra o resultado para você. Por padrão, o dig envia a consulta DNS para o nome do servidor listado no resolvedor (/etc/resolv.conf). A menos que seja solicitado a consultar um nome de servidor específico.
$ ping 198.168.0.17    => O comando PING (Packet Internet Groper) é uma ferramenta bastante conhecida e amada! Seu principal propósito é gerenciar o status de conectividade da rede com um dispositivo através de um IP. Com o ping, você tem acesso ao tempo de envio e recebimento de resposta de uma rede. Ele funciona enviando uma série de mensagens ICMP (Internet Control Message Protocol) ao host de destino e aguarda por uma resposta echo do host ou dispositivo. Assim, somos informados sobre o funcionamento da rede.
$ ifconfig             => O comando é usado para configurar (e posteriormente manter) as interfaces de rede. É usado durante o boot para configurar a maioria das interfaces de rede para um estado utilizável. Depois disto, sua utilização é normalmente necessária somente durante depurações ou quando for necessário melhorar a configuração do sistema.
$ host www.google.com  => O host realiza pesquisas de DNS, convertendo nomes de domínio em endereços IP e vice-versa. Quando nenhum argumento ou opção é fornecido, o host imprime um breve resumo dos argumentos e opções da linha de comando .
$ localhost            => Localhost is a hostname that refers to the computer system on which the calling program is running, which means the machine will talk to itself when we call localhost. It helps us to check the network services in the machine, even during network hardware failures. When using “localhost” the network services are accessed through the logical network interface called loopback. The IP address of the loopback interface is 127.0.0.1. Thus, the localhost resolves to 127.0.0.1 as part of the name resolution.
$ route                => Nas redes de computadores, um roteador é um dispositivo responsável por encaminhar o tráfego de rede. Quando os datagramas chegam a um roteador, o roteador deve determinar a melhor maneira de direcioná- los para seu destino. No Linux , BSD e outros sistemas similares ao Unix, o comando route é usado para visualizar e fazer alterações na tabela de roteamento do kernel . A sintaxe do comando é diferente em diferentes sistemas; aqui, quando se trata de sintaxe de comando específica, discutiremos a versão do Linux. A rota em execução na linha de comandos sem nenhuma opção exibe as entradas da tabela de roteamento. Isso nos mostra como o sistema está configurado atualmente. Se um pacote entrar no sistema e tiver um destino no intervalo de 192.168.1.0 a 192.168.1.255 , ele será encaminhado para o gateway * , que é 0.0.0.0 – um endereço especial que representa um destino inválido ou inexistente. Portanto, nesse caso, nosso sistema não roteará esses pacotes. Se o destino não estiver nesse intervalo de endereços IP, ele será encaminhado para o gateway padrão (neste caso, 192.168.1.2 , e esse sistema determinará como encaminhar o tráfego para a próxima etapa em direção ao seu destino.
$ ip route show        => assim como o "route" ele mostra as rotas configuradas
$ ip addr show         => assim como o "ifconfig" ele mostra informações da rede, como o IP da minha máquina
$ netstat              => netstat (“estatísticas da rede”) é uma ferramenta de linha de comando que exibe conexões de rede (de entrada e saída), tabelas de roteamento e muitas interfaces de rede (controlador de interface de rede ou interface de rede definida por software) e estatísticas de protocolo de rede. É usado para encontrar problemas na rede e determinar a quantidade de tráfego na rede como uma medida de desempenho.
$ netstat -tlnp        => mostra o número de portas -n que estão escutando -l do tipo de comunicação TCP -t. O -p também é importante para eu saber o ID do meu processo que está rodando, saber se está okay. (TCP é essa comunicação de ponto a ponto, um dispositivo se comunica com outro, eu tenho que enviar os dados e a ordem dos dados é importante. Então estou te enviando o começo da pagina HTML e eu não quero que você renderize o final da pagina HTML antes do começo, a ordem é importante, por exemplo.)
$ netstat -tlnp | grep 80 => O netstat -tlnp lista os protocolos por números e o grep diz qual porta listar.
$ id                    => Este comando informa o UID, o GID e os grupos de um determinado usuário.
$ id root               => mostra o UID do meu usuário root
$ id -nG                => O -G exibe todos os grupos aos quais o usuário pertence, porém por padrão exibe o id dos grupos. Para exibir os nomes devemos combinar o -G com a opção -n.
$ useradd               => Este comando cria um novo usuário sem alocar recursos.
$ useradd -m            => Na maioria das distros do Linux, ao criar uma nova conta de usuário com o comando useradd o diretório inicial do usuário não é criado.Use a opção -m ( --create-home ) para criar o diretório inicial do usuário como /home/username ex:sudo useradd -m username. Este comando cria o diretório inicial do novo usuário e copia os arquivos do diretório /etc/skel para o diretório inicial do usuário.
$ userdell -r           => Para deletar um usuário e "-r" para deletar o diretório home dele também
$ groupadd nome_grupo   => Para adicionar um grupo
$ groupdel grupo        => Este comando deleta um grupo de usuários do sistema.
$ groupmod [opções] grupo => Este comando modifica um grupo de usuários do sistema.
$ usermod -a -G nome_grupo nome_user => Para adicionar um user em um grupo, -a de append e -G de grupo secundário (-g principal)
$ newgrp nome_grupo     => Este comando muda, temporariamente, o grupo do usuário. Isto significa que o usuário passa a usar o grupo teste na sessão e que, se ele criar um novo arquivo, este pertencerá ao grupo teste. Entretanto, se o usuário abrir outro terminal, o grupo do usuário será o grupo linux, pois a alteração para o grupo teste é temporária e só vale para a sessão em curso.
$ sudo passwd novo_user => useradd não adiona senha ao usuário, por isso usar passwd depois de adicionar
$ su nome_do_user => Muda de usuário. Este comando permite mudar de usuário em um ambiente shell. Caso o nome do usuário não seja fornecido, assume-se que o objetivo é se tornar o usuário root.Na distribuição Ubuntu, usa-se o comando sudo quando se deseja executar comandos com os privilégios de outro usuário. Portanto, deve-se usar sudo no lugar de su caso o objetivo seja se tornar o usuário root. Para sair do user digite "exit"
$ last            => mostra quando foram os últimos acessos dos usuários
$ sudo -i         => roda um shell para o usuário root, mesmo que a senha do root não tenha sido definida
$ ln              => Este comando cria ligações (links) entre arquivos. Há dois conceitos de ligação em sistemas Unix:Ligação direta – define mais um nome para um arquivo (um arquivo pode ter diversos nomes). O arquivo será removido  do disco quando o último nome for removido. Não há algo como um nome original, todos os nomes tem o mesmo status.Ligação simbólica ou dymlink – define um caminho para um arquivo. Ligações simbólicas podem apontar para arquivos em diferentes sistemas de arquivo e não necessitam apontar para arquivos que realmente existem.
$ ln -s /etc/passwd teste  => Para criar, no diretório atual, um link simbólico chamado teste para o arquivo /etc/passwd. -s : cria uma ligação simbólica (soft link).
$ objdump -d <ARQ_EXE>     => mostra o código assembly de um arquivo executável (binário)
$ hexdump <ARQ_EXE>        => mostra o código binário em hexadecimal de um arq executável
$ nc -lvp port_number      => Sobe um servidor TCP usando netcat (nc)
$ nc -lvup port_number     => Sobe um servidor UDP
```

## Como ver meu IP Público Pelo Terminal  
```
$ wget -qO- http://ipecho.net/plain
$ dig +short myip.opendns.com @resolver1.opendns.com
$ nslookup -querytype=TXT o-o.myaddr.l.google.com ns1.google.com
$ nslookup myip.opendns.com resolver1.opendns.com
```
## DIRETÓRIOS IMPORTANTES  
```
/etc/apt/sources.list       => The sources.list file is a key factor in adding or upgrading applications to your Ubuntu installation. This is also used by your system for system updates. The file is basically the roadmap for your system to know where it may download programs for installation or upgrade.
/usr/share/doc              => Então, no diretório /usr/share/docs é comum termos documentação sobre as mais variadas coisas, programas, comandos e etc. Nesse diretório é onde os programas instalam suas documentações, por padrão. Então, podemos, por exemplo, buscar a documentação do zip. Para isso, digitaremos ls /usr/share/doc/zip (irá aparecer no caso do zip que o software sofreu atualizações, então digite $less /usr/share/doc/zip/WHATSNEW)
/                           => O root directory é o diretório básico da nossa hierarquia de diretórios. Na medida que entramos nos diretórios, os diretórios filhos, filhas e filhos desse diretório.
/bin                        => O bin são arquivos binários, "comandos binários essenciais" ("su", "tar","cat", o "ls", o "cp", "mount") para quando levantamos o nosso sistema em um modo de um único usuário, quando me logo no meu sistema. Quem vai instalar essas coisas no "/bin"? A minha distribuição.    
/sbin                       => Vamos ter mais um monte de arquivos binários ou links para programas que queremos executar que servem para administração e reparo do sistema. Só que, em geral, só vão ser usados os super usuários. Diferente, por exemplo, do "/bin/cp" que eu como usuário qualquer posso usar, esses do "/sbin" do "super bin", são programas que vão ser usados por padrão por super usuários. Por exemplo, o "fdisk". O "fdisk" está no "/sbin". Por quê? Porque se eu quiser limpar uma partição, reparticionar um HD, coisas extremamente perigosas, não é para usuário qualquer, é para nosso super usuário. E
/boot                       => Diretório boot é onde vamos ter os arquivos para bootar a máquina ("kernel","grub"). Em "ls /boot" temos o "Vmlinuz-4.2.0-16-generic", isso é o kernel do Linux. 
/usr                        => Daqui podemos lembrar do "u", unchaging files, arquivos que não mudam. Ficam no "/usr". Temos no padrão, "/usr". Então hierarquia de diretórios para leitura, somente leitura. Por quê? Porque são arquivos para utilizarmos no nosso computador. "/Usr/bin" e "/usr/sbin" são programas que estão disponíveis depois que bootamos nossa máquina e estão disponíveis para nós, seja para um usuário qualquer, "/usr/bin" ou para um super usuário, "/usr/sbin".
/lib                        => É nesse diretório que ficam as bibliotecas necessárias para os binários disponíveis em /bin e /sbin.
/usr/lib                    => Outro diretório “populado” é o “/usr/lib“ (Aqui ficam as bibliotecas que são para os binários disponíveis em /usr/bin e /usr/sbin), onde ficam armazenadas bibliotecas usadas pelos programas. A função destas bibliotecas lembra um pouco a dos arquivos .dll no Windows. As bibliotecas com extensão “.a” são bibliotecas estáticas, que fazem parte de um programa específico, enquanto as terminadas em “.so.versão” (xxx.so.1, yyy.so.3, etc.) são bibliotecas compartilhadas, usadas por vários programas.
/usr/src                    => Que é usada para armazenar o código fonte de programas e também o código fonte do kernel (caso disponível). A pasta “/usr/X11R6” era originalmente destinada a armazenar os componentes do X, responsável pelo ambiente gráfico, mas ela está caindo em desuso.
/usr/local                  => é reservada a programas e scripts que você instalar manualmente
/usr/local/bin              => É no diretório /usr/local que é recomendado por arquivos que são instalados pelo administrador do sistema. Enquanto em diretórios como /bin, /sbin ou /usr/bin, temos binários que já vem com a distribuição, no /usr/local podemos por nossos próprios binários, por exemplo. Nesse caso, podemos por o script no /usr/local/bin, que já está na variável de ambiente $PATH.
/dev                        => "Dev" é de devices. São os aparelhos que temos conectados a nossa placa mãe. Não significa aparelho e somente uma câmera externa. São os "devices" conectados com esse cara. Por exemplo, um HD. Em Ls /dev/, temos, "sd", "sda1", "sda2", "sda5", "sdb", "sdb1". Temos aqui também o "/dev/random" que retorna um número aleatório, usado em criptografia, o "dev/null" que "engole" informações e some com elas. O diretório “/dev“, que é de longe o exemplo mais exótico de estrutura de diretório no Linux. Todos os arquivos contidos aqui, como, por exemplo, “/dev/hda”, “/dev/dsp”, “/dev/modem”, etc., não são arquivos armazenados no HD, mas sim ponteiros para dispositivos de hardware. Por exemplo, todos os arquivos gravados no “arquivo” “/dev/dsp” serão reproduzidos pela placa de som, enquanto o “arquivo” “/dev/mouse” contém as informações enviadas pelo mouse.
/mnt                        => O diretório “/mnt” (de “mount”) recebe este nome justamente por servir de ponto de montagem para o CD-ROM (/mnt/cdrom), drive de disquetes (/mnt/floppy), drives Zip e outros dispositivos de armazenamento. O uso do diretório /mnt é apenas uma convenção. Você pode alterar o ponto de montagem do CD-ROM para /CD, ou qualquer outro lugar se quiser. Isso é configurável através do arquivo “/etc/fstab”, onde vai a lista de todos os dispositivos usados pelo sistema e as pastas em que cada um é montado.
/media                      => Qual era a diferença entre "/mnt" e "/media"? Os dois diretórios era para montar sistemas de arquivos. Por exemplo, Pendrive, CD e etc. A regra geral era que se era um mount fixo, por exemplo, um driver de CD, um driver de DVD, é uma coisa fixa. Nesse cara vai ser montado no "/media". E se é uma coisa temporária, por exemplo, um Pendrive, um HD externo temporário tipo esse cara, o que vou fazer é montar no "/mnt". Esse seria o padrão a ser seguido. Mas não é uma regra fixa.
/etc                        => É que nesse diretório vamos ter arquivos de configuração ( não deve conter arquivos binários, e sim arquivos de configuração). Por exemplo, no "etc" vamos ter um diretório chamado "X11" onde estão configurações do programa "X11" que é um gerenciador gráfico que estamos utilizando no desktop do Ubuntu. 
/etc/fstab                  => Em "/etc/fstab" fica guardada a informação de quais particões serão montadas no boot da máquina
/etc/hosts                  => Em "/etc/hosts" temos os arquivos de hosts de DNS 
/etc/init.d                 => Em "/etc/init.d" temos os arquivos executávels do processo de inicialização da nossa máquina 
/etc/shadown                => "/etc/shadown" é o lugar em que ficam as senhas do computador (senhas criptografadas)
/etc/passwd                 => "/etc/passwd" ficam as informações da conta do usuário  
/root                       => O root é o usuário com maior nível de autorização dentro do Linux. Por exemplo, o root pode criar novos usuários, remover usuários, alterar a configuração do sistema, etc.
/proc                       => O “/proc” ou “procfs” é um pseudo filesystem que nos permite interagir e observar as estruturas internas do kernel Linux em formato de arquivos. Nele podemos configurar comportamentos do kernel, como o ip forwarding, limites de memória compartilhada, limites de semáforos, habilitar/desabilitar ipv6,  comportamento de cache do filesystem e também obter informações sobre uso de memória, estados dos processos, dentre vários outros itens. É através dele que muita das ferramentas que conhecemos como “top”, “free”, “vmstat”, “ps” e várias outras conseguem obter seu dados. Em "/proc/meminfo"  informações bem baixo nível sobre como está nossa memória total, "swap", disponível, livre de verdade, bufferizado, cacheado, um monte de tipos de situações que a memória pode estar. Em "/proc/cpuinfo" temos várias informações sobre o meu cpu, "/proc/loadaverage" diz para mim o quanto está sendo utilizado os processadores da minha máquina, "/proc/version" informa versões dp meu sistema                         
/sys                        => A pasta /sys (de system) basicamente mapeia chamadas diretas com o kernel Linux. A maioria dos arquivos contidos lá podem ou não gerenciar hardware de forma direta. Não veja os arquivos dentro de /sys como “arquivos e pastas”, mas sim como um painel de controle de kernel: Cada arquivo contido dentro de cada pasta permite enviar comandos diretamente para o Kernel, sem passar por processos. Além disso, o status de cada parte do kernel pode ser lido diretamente de tais arquivos. 
! Os diretórios /proc e /sys não existem de fato no nosso computador. São sistemas de arquivos especiais que são montados virtualmente através do procfs e sysfs.É verdade que usamos os diretórios /proc e /sys para obter informações sobre os processos e kernel. Porém eles ficam disponíveis na forma de arquivos de texto, e não de binários. Outros programas binários é que podem ler essas informações em texto presente nesses diretórios. 
/var/log                    => mostra os arquivos de log
/temp                       => Nesse diretório podemos por arquivos temporários que normalmente não são preservados entre os reboots do sistema.
```

## VARIÁVEIS DE AMBIENTE E LOCAIS

```
criei um arquivo de texto chamado mostra_idade em mateus@mateus-VitualBox == /home/mateus
digite os comandos abaixo para relembrar variáveis de ambiente e de shell
$ env FULL_NAME='Mateus V de Castro' AGE=19 OPERATIONAL_SYSTEM='Linux UBUNTU' bash mostra_idade
$ export NOME='Daniel'
$ echo $NOME
$ bash mostra_idade

rode os comandos abaixo (para ver var de ambiente e de shell):
====== var de shell/local
$ AMBIENTE=desenvolvimento           => criamos a var de shell (local) AMBiENTE com valor desenvolvimento
$ echo $AMBiENTE                     => mostra a var local chamada desenvolvimento
$ AMBIENTE=                          => zeramos/apagamos a variável
$ echo $AMBIENTE                     => verificando que zeramos msm
====== var de ambiente
$ export AMBIENTE=desenvolvimento    => criamos a var de ambiente AMBiENTE com valor desenvolvimento
$ echo $AMBiENTE                     => mostra a var de ambiente chamada desenvolvimento
$ AMBIENTE=                          => NÃO ZERAMOS a variável
$ echo $AMBiENTE
$ env                                => ela ainda está presente em env !!
$ export -n AMBIENTE                 => AGORA sim a variável foi apagada do env mas não do shell !!
$ unset AMBIENTE                     => para apagar tanto do shell quanto do env !!!

====== variáveis de ambiente do venv
$ echo $PS1                          => toda a formatação do meu prompt "mateus@mateus-VitualBox", pode ser alterada, ver "https://bashrcgenerator.com/"
$ echo $PS2                          => Caracter para quando tem uma quebra de linha com enter dentro de aspas "" ou ''
$ echo $UID                          => ID do meu usuário 
$ echo $HISTFILE                     => Local em que é armazenado o histórico de comandos dados no shell 
$ echo $PATH                         => Quando executamos um comando, o executável desse comando será procurado nos diretórios definidos no valor dessa variável. 
$ echo $MANPATH                      => A variável $PATH indica para o shell onde ele deveria buscar os comandos e da mesma maneira esta variável $PATH ajuda a buscar comandos, existe também a variável $MANPATH. Essa variável diz para o man, onde ele deve procurar os manuais. Se a variável é vazia ele procura um arquivo de configuração e este arquivo está em cat /etc/manpath.config

====== variável de ambiente EDITOR

==== Entrar no editor vim
$ EDITOR=/usr/bin/vi
$ /usr/bin/vi                        => para entrar no editor
$ :q                                 => para sair do editor

Navegação

Setas - Navegam no arquivo. "$" - Vai para o final da linha atual. "0" (zero) - Vai para o ínicio da linha. Shift + "g" - Vai para a 
última linha do texto. "Número da linha" + Shift + g - Para ir pra uma linha específica do texto (3 + Shift + g => vai para a linha 3). 
"/" + palavra ou frase + Enter - Faz uma busca no arquivo pelo texto especificado. "n" - Vai para a próxima ocorrência do texto 
especificado. Shift + "n" - Vai para a ocorrência anterior do texto especificado.

Edição de texto

"i" - inclui texto (na posição atual). "a" - adiciona texto (na posição posterior). Shift + "a" - adiciona texto (fim da linha). "Esc" 
- Sai do modo edição de texto para o modo navegação.

"x" - Remove caracteres (n x remove n caracteres). "dd" - Remove uma linha (n dd remove n linhas). "yy" - Copia a linha atual. "Número 
de linhas" + "yy" - Copia X linhas a partir da atual. "p" - Cola o texto no arquivo a partir da posição atual. "Número de vezes" + "p" 
- Cola um texto N vezes a partir da posição atual. ":w"- salva o arquivo. ":q!" - Sai do arquivo sem salvar. ":wq" - Salva e sai do 
arquivo.

==== Entrar no editor Nano
$ EDITOR=/bin/nano
$ /bin/nano
```

## Script Linux

```
#!/bin/bash    # shebang

# compacta_logs.sh ANO [ANO...]

# encontra todo arquivo ou diretório que tenha log e ANO no nome, compacta tudo na pasta logs.zip e executa o wc para vermos quantos arquivos foram compactados
# rodando esse script no interpretador bash que foi infomado no início do arquivo
# Para rodar, use bash compacta_logs.sh  OU
# "chmod +x compacta_logs.sh" e depois /home/mateus/compacta_logs.sh

echo $0   # $0 é o caminho relativo ou absoluto para o nosso programa
echo $1   # é o primeiro argumento que eu posso informar ao script ao executá-lo, 
echo $#   # é o número de argumentos que passei para o meu script
echo $*   # mostra todos os argumentos que passei para o meu script

echo "Compactando logs de ${1} em `pwd`"

find . -name="*logs*" -name="${1}" | zip -@ ${HOME}/logs.zip | wc -l  # -name="${1}" sempre usar aspas duplas, aspas simples significam que a variável não deve ser interpretada

for ANO in 2016 2017
do
	echo "Compactando logs de ${ANO} em `pwd`"
	find . -name="*logs*" -name="${ANO}" | zip -@ ${HOME}/logs.zip | wc -l  
done


lista='banana maca chocolate'
for i in $lista
do
	echo $i
done


for i in `ls`
do
	echo Existe o arquivo $i
done


for i in *.txt       # itera por todos os arquivos .txt
do
	echo Existe o arquivo $i
done

# for ANO in $*        # fazer um for para cada argumento informado pelo usuário no terminal   ex: $ campacta_logs.sh 2016 2017 2018 2019 2020                   
# do
# 	 echo "Compactando logs de ${ANO} em `pwd`"
# 	 find . -name="*logs*" -name="${ANO}" | zip -@ ${HOME}/logs.zip
# done


exit 0     # saída 0 significa sucesso
```

## Estender o volume da máquina virtual

```
ver : https://sourcedigit.com/16391-change-ownership-set-write-permission-on-ext4-partition-in-linux-ubuntu/
    : https://www.youtube.com/watch?v=cF4qIpOvkkA
    : https://www.youtube.com/watch?v=6wXZ38RfKxg


=> no Windows, no cmd, na pasta do Virtual Box

vboxmanage modifyhd "D:\UBUNTU\Ubuntu 20.04.vdi" --resize 51200  => modifica a maquina para 50GB -- 50*1024=51200

=> No linux particionar com o 'Gparter', montar a unidade em 'Discos' e depois:

$ sudo fdisk -l                     => ver o nome das partições
$ sudo blkid                        => mostra os UUID(s) das unidades
$ ll /media/                        => mostra as unidades montadas
$ sudo chown mateus:mateus /media/mateus/D   => conseguir permissão de leitura e gravação no disco D, já montado, do tipo ext4 que foi particionado no Gparter
```

## Instaláveis para tornar o Linux em um ambiente de desenvolvimento

```
$ sudo apt install build-essential default-jdk libssl-dev exuberant-ctags ncurses-term ack-grep silversearch-ag fontconfig imagemagick libmagickwand-dev software-properties-commom git vim-gtk3 curl perl -y
```


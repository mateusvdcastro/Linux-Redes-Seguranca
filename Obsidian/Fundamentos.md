**[Ethical Hacking in 12 Hours - Full Course - Learn to Hack!](https://www.youtube.com/watch?v=fNzpcB7ODxQ)
[Cyber Security Full course - 11 Hours | Cyber Security Training For Beginners | Edureka](https://www.youtube.com/watch?v=lpa8uy4DyMo) 
[Network Programming with Python Course (build a port scanner, mailing client, chat room, DDOS)](https://www.youtube.com/watch?v=FGdiSJakIS4&list=PLQIXaoKWER84rsnx72tYwKDyz_isF69RR)

Playlist Redes Fábio Akita:
[Introdução a Redes: Como Dados viram Ondas? | Parte 1](https://www.youtube.com/watch?v=0TndL-Nh6Ok&list=PLdsnXVqbHDUcTGjNZuRYCVj3AZtdt6oG7)

https://pypi.org/project/bcrypt/
https://github.com/pyca/bcrypt/

Scripts de encriptação de senhas: #bcrypt, #PBKDF2, #Argon2 (Django e Rails usando isso) e para completar a senha é necessário o uso de salt (concatena o hash da senha e mais uma fatia de hash gerada pela máquina).

Hackers antecipadamente sabendo que usam bcrypt e PBKDF2 para encriptação, mantém bases de dados já “hasheadas”, pegando palavras em inglês e usando “leet code” de bases próprias ou compradas. Essas tabelas hashes pré computadas são chamadas de: rainbow tables.

  
Esforço em brute force:

26 caracteres do alfabeto x 2 maiúsculas e minúsculas = 52
10 números
30 caracteres especiais (mais ou menos)
52 + 10 + 30 = 92 letras 
Uma senha de 10 caracteres tem 92^10 possibilidades = 42 quintilhões de possibilidades
* Cada caractere a mais dificulta em 92 vezes o esforço de um hacker

  
Autenticação de 2 fatores: usam o algoritmo #HMAC-SHA1. Ao se registrar em um app deste tipo, ele gera um QR Code ou senha “segredo”, esse segredo fica criptografado no app e no servidor. A cada passagem de tempo 30/60 segundos ele pega a hora atual, gera um hash, soma ao seed “segredo”, usando o algoritmos HMAC-SHA1, e entrega os números para autenticação (6 digitos). O servidor faz o mesmo processo, se bater os dados do aplicativo com o do servidor naquele mesmo horário, ele permite a sua entrada no app.

No que se trata de malwares, download de executáveis de aplicativos piratas são campeões em trazê-los. Como os #ransomware (malware que encripta arquivos). 

Para verificar se um PC possui vírus é recomendado queimar um pen drive com o Kaspersky/Avira/Comodo e bootar o PC nele. Esse antivírus roda antes do SO executar, não dando chance para o malware se esconder dos antivírus. 

Para evitar Ransomware no Linux é recomendado usar Time shift/Snapshot replication e para Windows o back Blaze.

Senhas para entrar no computador não servem para nada. Se eu tirar o HD ou SSD de um PC e colocar em outro, tenho acesso a todas as informações. (No MAC se ligar e segurar a tecla T, o computador entra em modo Target Disk Mode e vira um “Pen Drive”. Posso conectar um USB e ver todos os dados em outro PC). 

## Boas práticas

- Senhas geradas sempre aleatoriamente, maior número de caracteres possíveis (> 12) e com a maior diversidade de caracteres diferentes
- App bitwarden para guardar senhas (gerar uma senha grande para cada site e impossível de decorar) (bitwarden, 1password, lastpass). 
- PASSPHRASE > password “minhamaeusaperucadenoite”, “tenhoodedodopetorto” (são frases que só você sabe e serão usadas para entrar no app de senhas escolhido)
- Usar autenticação de 2 fatores
- Arquivos importantes devem ficar em um HD externo (existem scripts que encriptam dados sem o usuário saber)
- Ativar TPM e Secure Boot na BIOS do sistema
- Usar sistemas de VPN (Nord VPN, Express VPN)
- Encriptar os drivers da máquina no Windows, habilitar o BitLocker, no MAC o FileVault e no Linux se chama LOOX.
- Se tiver produtos Apple usar o find my mac. Pode apagar todos os dados remotamente.
- Não jogar HDs fora sem furar todos os discos e quebrar. Pois é possível reconstruir os dados.
- Veracrypt para guardar informações muito secretas!

3 fatores de segurança:

- Alguma coisa que você sabe (senha) => PASSPHRASE/senha
- Alguma coisa que você tem => Aplicativo de 2 fatores (ou Yublco)
- Alguma coisa que você é => Digital ou Reconhecimento facial (celulares modernos possuem uma memória separada do SO, controlada independente da CPU e que não ficam junto dos dados e aplicativos que armazenam a digital e reconhecimento facial. Essa memória é chamada de SECURE ENCLAVE - IOS é o T2 e no Windows TPM (Trusted Platform Module)).  

## Más práticas

  

- Mesma senha para tudo
- Anotar senhas em arquivos texto e deixar na Nuvem
- Baixar instaladores de softwares piratas
- Código 2 fatores via SMS
- Senhas de até 8 a 11 caracteres
- Má prática de escolher senhas e guardar no SGBD: escolhendo palavras, fazer leet code e passar uma função de hash sha512 (windows antigamente tinha um sistema chamado NTLM, que fazia esse HASH de senha de usuário e guardava em um banco. Com isso, hackers conseguem comparar as senhas desse banco com os hashes gerados por eles)
- Nunca baixar softwares que dizem atualizar os drivers do PC automaticamente. A maioria são FEARWARE.
  

## Qual a diferença de usar SHA256 ou Bcrypt para criptografia?

A diferença deles está no tempo de encriptação.

Sha512 - Surgiu para ser rápido, por exemplo criptografar um PDF e criar assinaturas digitais. Mas não serve para fazer hash de senhas por ser mais fraco

#bcrypt e #PBKDF2 - Tem em seu design uma demora na encriptação para dificultar brute force

! [https://haveibeenpwned.com/](https://haveibeenpwned.com/) (registra grandes escandalos de vazamento hacker e mantém bases de dados dos dados vazados)

!Kevin D. Mitnick (Hacker famoso)

## ( Selo de Segurança é Marketing)

  

Organizações grandes precisam de processos burocráticos entre atividades (como no exemplo de um trabalhador de startup subindo um servidor na conta AWS da empresa. Se o mesmo for demitido, somente ele sabe da existência daquela máquina e se perder informações que podem ser relevantes para a segurança da empresa). Desta forma, vem formas de governança e boas práticas como:  

#COBIT - Control Objectives for Information and Related Technologies
#TOGAF - The Open Group Architecture Framework
Eles são frameworks de boas práticas para segurança.

  

## (Introdução a Redes: Como Dados viram Ondas? | Parte 1 e 2)

  

- Planos de internet falando em Megabits, sabendo que 1 byte são 8 bits. Se falarmos em uma plano de 300 Megabits teremos 300/8 = 37.5 megabytes. 
- Cabos de fibra óptica são feitos de fibra de vidro e têm a capacidade de chegar até 10 Gbits/s em uma faixa de 5 a 10Km. 
- Cabos de rede com entrada RJ-45 são do tipo CAT 5e ou 6, e transmitem dados em 1000Mbps (1 Gigabit/seg). 
- Quanto maior a frequência de um sinal wifi, mais difícil fica atravessar paredes e obstáculos. Redes 2.4GHz (1300Mbps) alcançam maiores distâncias enquanto a 5 Ghz  (1300 Mbps) é mais rápida mas de menor alcance.
- O Modem (modulador-demodulador) recebe esse nome por ser um modulador, ou seja, converte sinal elétrico (analógico) em binários (sinal digital). 
- As telecomunicações mudaram seus modos de transmissão de dados (chamadas telefônicas, arquivos) de conexão Circuit Switch para Packet Switching, e mudaram as sessões de stateful para stateless, permitindo escalabilidade. 

No primeiro, era necessário abrir uma única sessão ponta a ponta (como o telefone de copinho), e a transmissão era total da informação. 

Agora, na segunda abordagem, os dados são transmitidos em pacotes, cada pacote, por exemplo, contendo 1500 bytes. Assim, os dados são segmentados, e assinam o destinatário (IP do usuário) e adicionam metadados importantes para o destinatário construir pedaço a pedaço o pacote novamente em ordem. A cada pacote que chega, o destinatário devolve um ACK(acknowledgment) se o pacote veio corretamente ou NAK(Negative Acknowledgment). 

Ou seja, em Circuit Switch a sessão era fechada ponta a ponta, então funcionava como uma rodovia de mão única. Agora com Packet Switching, enquanto um pacote é transmitido outro pacote de outra requisição pode ser enviado na sequência, funcionando como uma rodovia de várias faixas. 

[[Discos]]
  



>[!NOTE]
   > [[#bip_flip]]
   >Todo HD, SSD, Pendrive e etc, guarda informações binárias gravadas em um chip, ou como nos HDs, em fitas magnéticas. Assim, como bits não são nada mais que cargas eletromagnéticas, todos estes dispositivos estão sujeitos a interferência eletromagnética, ocasionando no “flip” de bits (1 vira 0 ou 0 vira 1). Existem estudos que mostram a possibilidade de ter um bit flip por gigabyte por ano em dispositivos de armazenamento. Além disso, várias razões podem causar esses “flips”, alguns estudos falam até mesmo de raios cósmicos que são bombardeados na atmosfera terrestre. Na ciência da computação este erro de flip recebeu certas técnicas para verificar a integridade dos dados, por exemplo, se tivermos 11 bits de dado e cada bloco no HD guarda 16 bits, este bloco irá receber esses 11 bits e mais 5 bits para controle e paridade. Assim, é feito um algoritmo de verificação se na transmissão desse bloco de dados na rede ou no HD houve algum “bit flip”, o nome desse algoritmo se chama HAMMING CODE. Com isso, é muito comum em sistemas de armazenamento em Nuvem terem o ECC (Error Correction Code) que utilizam esse algoritmo. Para CDs existe também o algoritmo de Reed-solomon code. Para que os bits de controle não ocupem boa parte do armazenamento do disco, as buscas são feitas em busca binária, assim, para dados de 256 bits (ao invés de 16 bits), teremos somente 8 bits de redundância (2^8 = 16). Mas claro que em sistemas reais, um bloco de dados do sistema costuma ter 4 Kbytes de dados e um bloco de rede 1500 bits MTU (Maximum Transmission Unit). Mas somente programas espaciais usam Hamming e Reed-solomon, HD e SSD normais usam variações disso. Além disso, existem algoritmos sendo pesquisados para eliminar esses bits de redundância ou reduzir o tempo de execução do algoritmos, como o LDPC (Low-Density Parity-Check Code).

#Reed-solomon_Code: O(n^2)

#LDPC Code: O(n)


 Em redes, compensa mais reenviar um dado corrompido do que corrigir o dado em um algoritmo deste tipo. Usam Checksums em “Internet 16 bits”.

## Como sua Internet Funciona | Introdução a Redes Parte 3

[[Network]] **Maior parte do conteúdo se encontra aqui!

##  Como Funciona Sockets, Cliente, Servidor e a Web? | Introdução a Redes Parte 4

#sockets Os sockets fornecem uma maneira padrão e flexível para que os programas se comuniquem entre si em uma rede, permitindo a troca de dados e informações de forma eficiente e confiável. Eles são identificados por um endereço IP e um número de porta. Existem diferentes tipos de sockets, como sockets de fluxo (TCP) e sockets de datagrama (UDP), que determinam o comportamento da comunicação.

Enquanto um sistema de 32 bits pode endereçar até 4 GB de memória RAM (2^36), um sistema de 64 bits pode endereçar até 16 exabytes de memória RAM (2^64). Cada #processo da máquina enxerga de 0 a 16 exabytes, no entanto, o SO lida com isso disponibilizando somente o que está disponível na memória física. O sistema operacional é responsável por atribuir porções deste espaço de endereçamento virtual a cada processo em execução no sistema. Cada processo recebe uma faixa de endereços virtuais para sua própria utilização, e o sistema operacional garante que essas faixas de endereços não se sobreponham com as de outros processos.

Para ver a comunicação entre processos: [[Processos]].

Quando um programa precisa estabelecer uma ligação com um endereço IP e uma porta específica em um sistema operacional, ele realiza uma chamada de sistema conhecida como "bind". Essa chamada de sistema instrui o sistema operacional a associar uma determinada porta e um endereço IP a um soquete específico, que é uma interface de comunicação para o programa.

Aqui está uma visão geral do processo:

1. **Criação do Soquete:** Primeiro, o programa cria um soquete usando uma chamada de sistema como `socket()`. O tipo de soquete pode ser especificado (por exemplo, TCP ou UDP) e o sistema operacional aloca recursos necessários para o soquete.
    
2. **Configuração do Endereço e Porta:** Em seguida, o programa configura os detalhes do endereço IP e da porta para o soquete. Isso é feito através da estrutura de dados sockaddr_in (para IPv4) ou sockaddr_in6 (para IPv6), onde o endereço IP e a porta são definidos. Após a configuração, esses detalhes são passados para a chamada de sistema `bind()`.
    
3. **Chamada de Sistema Bind:** O programa invoca a chamada de sistema `bind()` com o descritor de soquete e a estrutura de dados que contém o endereço IP e a porta. O sistema operacional então associa esses detalhes ao soquete especificado.
    
4. **Atribuição de PID:** O processo que realizou a chamada de sistema `bind()` é identificado pelo PID (identificador de processo). O PID é um número único atribuído pelo sistema operacional a cada processo em execução no sistema. Quando o processo solicita a ligação de um endereço IP e uma porta, essa operação está associada ao PID do processo que a solicitou.
    
5. **Permissões e Restrições:** Dependendo das permissões de usuário e das políticas de segurança do sistema operacional, pode haver restrições sobre quais portas podem ser vinculadas e por quais processos. Por exemplo, apenas processos com privilégios elevados podem vincular a portas abaixo de 1024 no Unix-like sistemas.
    

Em resumo, o processo de ligação (bind) de um endereço IP e uma porta envolve a criação de um soquete, a configuração dos detalhes do endereço e da porta, a chamada de sistema `bind()` para associar esses detalhes ao soquete e a identificação do processo que realizou essa operação pelo PID. Isso permite que o programa comunique-se com outros programas na rede usando o endereço IP e a porta especificados.




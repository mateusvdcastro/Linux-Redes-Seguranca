## Conteúdo de Redes/Segurança e configurações de aparelhos CISCO 

https://www.alura.com.br/artigos/como-armazenar-senhas-no-banco-de-dados-de-forma-segura
https://www.alura.com.br/artigos/seguranca-de-sua-aplicacao-e-os-frameworks-ataque-ao-github
https://www.alura.com.br/artigos/autenticacao-de-forma-segura-com-criptografia

1. Quando um computador está atrás de um NAT (Network Address Translation), como é o caso de ter um IP privado e ser acessado através de um endereço NAT do roteador, e precisa se conectar a outro computador que está em uma região diferente, geralmente a conexão direta entre eles não é possível devido ao NAT. Nesse cenário, técnicas de NAT traversal, como STUN (Session Traversal Utilities for NAT) e TURN (Traversal Using Relays around NAT), são utilizadas para estabelecer a conexão.
    
2. **Funcionamento do STUN e TURN**: O STUN permite que um cliente descubra seu próprio endereço IP público e a porta atribuída pelo NAT. Isso é útil para estabelecer a comunicação ponto a ponto sempre que possível. No entanto, em casos em que a comunicação direta não é possível (por exemplo, devido a NATs restritivos ou firewalls), o TURN é utilizado como uma solução de último recurso. O TURN age como um servidor intermediário que retransmite o tráfego entre os clientes quando a comunicação direta não é viável.
## OSI:

O início do desenvolvimento e construção de redes de telecomunicações foi um pouco difícil, cada fabricante de equipamento de rede tinha a sua solução proprietária, o que impossibilitava a comunicação com equipamentos de outros fabricantes. Desta forma, caso optasse por um fabricante, o cliente só poderia comprar equipamentos de mesma marca, gerando assim o chamado vendor lock-in, quando ficamos presos a um fabricante.
Com o intuito de evitar esses problemas, a International Organization for Standardization (ISO) desenvolveu alguns modelos para garantir a padronização dos protocolos de comunicação, permitindo equipamentos de diferentes fabricantes se comunicarem. Um desses modelos de padronização é o modelo #OSI (Open System Interconnection).
Mas como o modelo OSI faz para garantir a comunicação entre os equipamentos de diversos fabricantes? Para isso, ele pega todo o processo de comunicação e divide em sete camadas, onde cada uma fica com um conjunto de protocolos que vai ser responsável por uma função específica.

Camada 7: #Application (Aplicação)  ( #HTTP, FTP, SMTP) => A camada de aplicação (Application - 7) engloba tudo aquilo que faz interação com o usuário final. Ela funciona como uma interface permitindo a comunicação de dados na rede. Quando acessamos um site como o blog da Alura, ou enviamos um e-mail, utilizamos protocolos como o HTTP para acesso de sites e SMTP para o envio de e-mails. Esses protocolos estão presentes na camada de aplicação.

Camada 6: #Presentation (Apresentação) (.mp3, .jpg)  => Assim que os dados começam a ser transmitidos, eles são passados para a responsabilidade da camada de apresentação (Presentation - 6). Essa camada é responsável por formatar os dados em um padrão que é compreendido pelo dispositivo da outra ponta, além de também ser responsável por realizar a criptografia dos dados, caso exista. Um exemplo é quando acessamos um site, a página está formatada em "HTML", podemos ter imagens em formato ".jpeg" nesse mesmo site, e um anúncio sonoro formatado em ".mp3". Desta forma, a camada de apresentação transformará esses dados transmitidos pela camada de aplicação em formatos padronizados que são capazes de serem interpretados.

Camada 5: #Session (Sessão)  => Em um computador, podemos ter diversas aplicações rodando simultaneamente, como páginas web abertas ou ouvindo música. A camada de sessão é responsável pela separação dessas aplicações. Quando fazemos requisições web, a camada de sessão irá garantir que os dados voltem para a aplicação que iniciou a comunicação e não para as outras.

!!! Essas camadas citadas até o momento (Application, Presentation, Session) são de responsabilidade do sistema operacional, como por exemplo o Windows ou o Linux, e não são de responsabilidade dos equipamentos de rede que iremos estudar durante o curso.

Camada 4: #Transport (Transporte) ( #TCP, #UDP, Portas) => Chegando na camada de transporte, o dado transmitido é chamado de segmento (segment). A primeira responsabilidade é a de atribuir portas de comunicação com o intuito de identificar o serviço que queremos acessar. Por exemplo, podemos ter um servidor que possua serviços web e de e-mail, como o servidor identificaria qual serviço gostaríamos de acessar? Utilizando as portas de comunicação, sendo cada uma é responsável por um protocolo, o HTTP utiliza a porta 80, o SMTP utiliza a 25. Outra responsabilidade da camada de transporte é informar como o transporte dos dados será realizado. A primeira forma de transporte é TCP (Transmission Control Protocol), ela garante a integridade dos dados, caso algum dado seja perdido na comunicação entre o cliente e o servidor, ocorrerá uma retransmissão do dado perdido. Esse protocolo é conhecido como orientado a conexão (Connection-Oriented). Porém essa transmissão é mais lenta, e se eu estiver jogando ou conversando em uma chamada de vídeo? A forma de transporte UDP (User Datagram Protocol) não utiliza essa verificação de integridade dos dados ganhando mais velocidade. O protocolo UDP também é conhecido como não orientado a conexões (Connectionless). 

!!! Todo dado que passou por essas camadas será chamado de Segment 

Camada 3: #Network (Rede) ( #Roteadores, #IP) => Uma vez que os segmentos foram processados pela camada de transporte, os segmentos serão passados para a camada de rede (Network - 3), nesse ponto os dados serão chamados de pacotes (packets). A responsabilidade da camada de rede seria encapsular e colocar o endereçamento lógico, sendo a forma mais comum desse endereçamento lógico o endereço IP. Além dessa atribuição dos endereços lógicos, a camada de rede é responsável por definir a melhor rota para envio desses pacotes ao destinatário. Por exemplo, quando colocamos no nosso browser o endereço da Alura, esses pacotes serão transmitidos por vários roteadores intermediários até chegar ao servidor onde possui o conteúdo. Tais roteadores serão responsáveis por encontrar a melhor rota nesse percursos, dessa forma, concluímos que os roteadores são equipamentos que atuam na camada de rede.

!!! Todo dado que passou por essas camadas será chamado de Packets

Camada 2: #Data-link (Enlace de dados) ( #MAC) => Essa camada é responsável por encapsular esses pacotes e acrescentar o chamado endereçamento físico, nesta etapa os dados são chamados de quadros (frames). O endereço físico é uma identificação unica e vem inserido na placa de rede, são os endereços MAC (Media Access Control). Desta forma, os #Switches são equipamentos que atuam na camada de enlace de dados.

!!! Todo dado que passou por essas camadas será chamado de Frames

Camada 1: #Physical (Física) (HUBs) =>  Pense na camada física como a responsável por estabelecer a conexão e o transporte do sinal elétrico usando os cabos e conectores. Os HUBs atuam na camada física. 


Ver: https://www.alura.com.br/artigos/conhecendo-o-modelo-osi
   https://pt.wikipedia.org/wiki/Protocolo_(ci%C3%AAncia_da_computa%C3%A7%C3%A3o)

![[Pasted image 20240429180025.png]]

#IP: O termo IP (Internet Protocol) é um número identificador dado ao seu computador, ou roteador, ao conectar-se à rede. É através desse número que seu computador pode enviar e receber dados na internet. O IP é definido pelo seu provedor de Internet. Ele pode ser estático (não mudar) ou dinâmico (mudando de tempos em tempos).
!Classes do IP: ver imagem. A IETF (Internet Engineering Task Force) determinou que existiriam ao todo 5 classes de endereços IP, indo de ordem alfabética da classe A até a classe E. Porém as duas últimas classes não são usadas para serem endereçadas as máquinas. A classe D seria usada para multicast (termo usado quando queremos nos comunicar com somente algumas máquinas de nossa rede) e a classe E seria uma classe experimental. Portanto as classes de IP que podem ser endereçadas para máquinas seriam a classe A, B e C.
#IP_Privado: Os endereços internos privados não são roteados na Internet e nenhum tráfego pode ser enviado a eles da Internet, eles apenas deveriam funcionar dentro da rede local. Esses são endereços IP reservados. Esses endereços são destinados ao uso em redes locais fechadas e a alocação de tais endereços não é controlada globalmente por ninguém. O acesso direto à Internet usando um endereço IP privado não é possível. Nesse caso, a conexão com a Internet é via NAT (a tradução do endereço de rede substitui o endereço IP privado por um público). Os endereços IP privados na mesma rede local devem ser exclusivos e não podem ser repetidos.
       * Note que o IP da minha máquina é um IP Privado, estão, para acessarmos a internet a nossa provedora nos dá um ip público que pode ser visto no site: https://meuip.com.br/
#IP_Público: São endereços públicos globais usados na Internet. Um endereço IP público é um endereço IP usado para acessar a Internet. Os endereços IP públicos (globais) são roteados na Internet, ao contrário dos endereços privados. A presença de um endereço IP público em seu roteador ou computador permitirá que você organize seu próprio servidor (VPN, FTP, WEB, etc.), acesso remoto ao seu computador, câmeras de vigilância de vídeo e acesse-os de qualquer lugar da rede global. Com um endereço IP público, você pode configurar qualquer servidor doméstico para publicá-lo na Internet: Web (HTTP), VPN (PPTP / IPSec / OpenVPN), mídia (áudio / vídeo), FTP, unidade de rede NAS, servidor de jogos, etc.
       * Pode ser visto em: https://meuip.com.br/
#TCP: Protocolo de Controle de Transmissão (do inglês: Transmission Control Protocol, abreviado TCP) é um dos protocolos de comunicação, da camada de transporte da rede de computadores do Modelo OSI, que dão suporte a rede global Internet, verificando se os dados são enviados na sequência correta e sem erros via rede. É complementado pelo protocolo da Internet, normalmente chamado de, TCP/IP. Neste protocolo da camada de transporte (camada 4 OSI) se assentam a maioria das aplicações cibernéticas, como o SSH, FTP, HTTP — portanto, a World Wide Web, devido sua versatilidade e robustez. O Protocolo de controle de transmissão provê **confiabilidade**, entrega na sequência correta e verificação de erros dos pacotes de dados, entre os diferentes nós da rede, para a camada de aplicação. Aplicações que não requerem um serviço de confiabilidade de entrega de pacotes podem se utilizar de protocolos mais simples como o User Datagram Protocol (UDP), que provê um serviço que enfatiza a redução de latência da conexão. 
! O protocolo TCP encontra-se acima da camada onde o IP está localizado e ele é responsável por realizar o transporte da minha informação. Além do protocolo TCP, essa camada possui também outro protocolo bastante conhecido, o UDP.
![[Pasted image 20240429180930.png]]
#ICMP: ICMP, sigla para o inglês Internet Control Message Protocol (em português, Protocolo de Mensagens de Controle da Internet), é um protocolo integrante do Protocolo IP, definido pelo RFC 792, é utilizado para comunicar informações da camada de rede, sendo o uso mais comum para fornecer relatórios de erros à fonte original. Qualquer computador que utilize IP precisa aceitar as mensagens ICMP e alterar o seu comportamento de acordo com o erro relatado. Os gateways devem estar programados para enviar mensagens ICMP quando receberem datagramas que provoquem algum erro.
#ARP: O ARP é o protocolo utilizado para fazer o mapeamento entre o endereço IP e o endereço MAC de um dispositivo. Isso é necessário porque o MAC encontra-se um nível abaixo do IP e eu preciso dele para poder transmitir as informações. Em redes de computadores, temos protocolos que possuem hierarquias diferentes. Para poder chegar até o IP que está na camada 3, eu preciso passar pelo MAC que está na camada 2, pense como se fosse escalar uma pirâmide, não dá pra chegar ao topo sem passar pelo meio dela!
#TLS: (Transport Layer Security) seria um protocolo de criptografia utilizado para segurança da informação (usado no HTTPS). Ele seria a evolução do protocolo SSL (Secure Sockets Layer).
#T568A: Padrão para o cabo de internet, desenvolvido pela associação internacional de Telecomunicações (Telecomunication industry association - TIA). Eles definiram o padrão de cores que deveria ser seguido. O T568B, utlizado na outra ponta do cabo, tem os cabos invertidos para fazer corretamente a passaem de entrada e saída de dados de uma máquina para outra, informaçoes estão na imagem salva nesta pasta
	T568A ordem: Branco e verde, verde, branco e laranja, azul, branco e azul, laranja, branco e marrom, marrom
	T568B ordem: Branco e laranja, laranja, branco e verde, azul, branco e azul, verde, branco e marrom, marrom
	As placas de rede dos computadores transmitem, por padrão, nas posições 1 e 2. As placas de rede dos computadores recebem por padrão nas posições 3 e 6. As placas de rede dos hubs transmitem por padrão nas posições 3 e 6. As placas de rede dos hubs recebem por padrão nas posições 1 e 2.
	Se tentarmos fazer a conexão de dois computadores com cabo direto e conseguirmos pingar a máquina, provavelmente as placas de rede possuem um padrão auto-MDIX que é capaz de detectar que colocamos um cabo “errado”, mas consegue realizar a correção das polaridades via software 
#Hub: Aparelho que permite fazer a conexão de rede com várias máquinas https://www.google.com/search?q=ethernet+hub&sxsrf=APq-WBva_gdk-gLwFgRs6xiklwWP5SIz4A:1645466536375&source=lnms&tbm=isch&sa=X&ved=2ahUKEwj8p4_DsJH2AhWHEbkGHY5EBMUQ_AUoAnoECAEQBA&biw=1536&bih=764&dpr=1.25
       * Uma das limitações do hub: ele não consegue aprender aonde os computadores estão interconectados e sempre passará as informações para todos os dispositivos conectados com a porta, com exceção de quem enviou a requisição (exemplo quando uso o comando ping). O nome disso é Broadcast. Imagine um usuário fazendo o download de 500 mb e todos os dispositivos recebendo essa informação... Causa uma lentidão na rede. Em relação ao hub, precisamos falar também sobre a segurança da informação. A requisição que fizemos entre o segundo computador e o laptop, o hub desconhece aonde está conectado o laptop. Logo, ele enviará para todos os dispositivos que estiverem conectados. Se uma das máquinas tiver um usuário malicioso, ele pode fazer o que chamamos de análise de protocolo e decifrar o que está sendo enviado pelo segundo computador. O hub representa uma lentidão, além da vulnerabilidade da segurança.

#Roteador: A função do roteador é interconectar redes encaminhando seus pacotes de dados, os Switches e hubs são usados somente para conexão na minha rede local.
       * Para conectar um computador com um roteador, uso um cabo cruzado (CISCO CABO CONSOLE RJ45 PARA DB9), e usamos o app PUTTY para acessá-lo
       * cofigurando Roteador na aba cli:
```
 $ ?                        => mostra algumas informações
 $ wr                       => para salvar todas as configurações do roteador, ou seja, passar da memória volátil para a não volátil
 $ show running-config      => mostrando tudo oq está configurado
 $ show ip route            => ver a tabela com todas as rodas que o roteador possui
 $ ip route <ip> <ip_mask> <interface> => definir uma rota  ex: ip route 150.1.1.8 255.255.255.252 serial 0/1/0
 $ enable      => para subir em privilégio administrativo
 $ configure terminal => para entrar no modo de configuração do roteador
 $ interface fastEthernet 0/0 => para começar a configurar uma porta do roteador
 $ no shutdown                => agora a porta estará habilitada e acesa na cor verde
 $ exit                       => sair das configurações dessa porta
 $ interface fastEthernet 0/1 => para entrar nas configurações da outra porta
 $ no shutdown                => agora a porta estará habilitada e acesa em verde
 $ ip address 192.168.3.5 255.255.255.0 => como não temos um aparelho DHCP vamos dar um ip manualmente (192.168.3.5 = gateway) e informar a máscara de rede
 $ CTRL + Z                   => sair da configuração
 $ ping 192.168.3.2           => verificar se a conexão foi feita com sucesso com a máquina da porta 0/1
 $ configure terminal => para entrar no modo de configuração do roteador
 $ interface fastEthernet 0/0 => para começar a configurar uma porta do roteador
 $ ip address 191.168.3.7 255.255.255.0 => (191.168.3.7 = gateway) Lembrando que temos que configuras o roteador e o computador na mesma rede nessa porta, por isso obedecer a máscara de rede
 $ CTRL + Z                   => sair da configuração
 $ ping 191.168.3.1           => verificar se a conexão foi feita com sucesso com a máquina da porta 0/0, agora temos a conexão das duas portas feitas        
 $ show ip interface brief    => ver meus gateways configurados
 Ir em config do PC1 e colocar o seu gateway => 191.168.3.7
 Ir em config do PC2 e colocar o seu gateway => 192.168.3.5
 No PC1 $ ping 192.168.3.2    => Agora meu PC1 consegue se comunicar com o PC2 que está em uma rede diferente da dele
 No PC2 $ ping 191.168.3.1    => Agora meu PC2 consegue se comunicar com o PC1 que está em uma rede diferente da dele
```
#Switch: Veio como um substituto aos Hubs, por ser mais seguro (O Hub não consegue aprender onde um equipamento está localizado, o Switch sim). Quando um dispositivo quer se comunicar com outro, ele vai necessitar passar pelo Switch e ele informa dentro do pacote qual é seu endereço MAC e o Switch grava essa informação em sua memória, para que não tenha que "vazar" a informação para outros computadores que não seja o que enviou a informação e está esperando a resposta, uma vez que ele salvou o endereço dele e sabe para quem devolver. 
       * Uma das limitações do switch: Métodos usados por usuários maliciosos seria de inserir vários endereços #MAC falsos para “lotar” a memória do Switch, uma vez que a memória esteja cheia, o Switch não vai conseguir definir quem está onde e ele passa a atuar como um Hub. Para contornar esse risco, podemos configurar a porta do Switch para aceitar um número máximo de endereços MAC, ao ultrapassar esse limite a porta é desligada e o ataque não teria sucesso.
       * O protocolo #STP é utilizado pelos #Switches como uma forma de prevenir que loops aconteçam em nossas redes.
       * O endereço FF-FF-FF-FF-FF-FF será interpretado como sendo um endereço broadcast e será passado para todas as portas do Switch com exceção da porta a qual enviou essa informação
       * No caso de todos os Switches estarem configurados com a prioridade padrão 32.768. Qual será o critério que o protocolo do STP irá adotar para eleger o Switch Root? Uma vez que as prioridades do Switch estiverem configuradas com o mesmo valor padrão, o Switch Root será o Switch que tiver o menor endereço MAC. A porta root seria a porta que os outros Switches definiram como sendo a melhor porta de acesso ao Switch Root. Os modos de operação das portas do Switch Root seriam no modo Designado.
       * A análise que o protocolo STP realiza para eleger o Switch Root seria através dos valores de prioridade e endereço MAC presentes dentro do protocolo BPDU. Esse conjunto de valores de prioridade e endereço MAC é conhecido como Bridge-ID. O primeiro critério que o STP irá analisar será o valor de prioridade, o Switch que apresentar menor prioridade será eleito como Root. Caso ocorra um empate entre as prioridades, o Switch irá analisar os endereços MAC e o que apresentar o menor endereço MAC é que será eleito como Root.
         $ show mac-adrress-table => ver todos os endereços MAC salvos na memória
       * Evitando ataque de lotação de memória com endereços MAC:
         $ configure terminal
         $ interface fa0/2
         $ switchport mode access
         $ switchport port-security mac-address 00E0.B0AE.A127 => com isso habilitamos somente um endereço MAC nesta porta, caso um novo computador tente enviar informações a porta será desligada.
         $ show port-security interface fa0/2
#VLAN no Switch:
       * Uma rede local virtual, normalmente denominada de VLAN, é uma rede logicamente independente. Várias VLANs podem coexistir em um mesmo comutador, de forma a dividir uma rede local em mais de uma rede, criando domínios de broadcast separados
       * As Vlans (Virtual Lans) são usadas para segmentação de redes e priorização de tráfego. Hoje em dia as redes corporativas trafegam diferentes tipos de dados em suas redes, como por exemplo, podemos ter tráfego de dados, vídeo e voz e acaba sendo necessário lidar com esses diferentes tipos de tráfego de uma maneira a priorizar um sobre o outro.
 ```
$ ?                    => mostra algumas informações
$ enable               => para subir em privilégio administrativo
$ show vlan brief      => mostra todos os números de vlan sendo utilizadas 1-1005, usar apenas números livres
$ configure terminal   => para entrar no modo de configuração do switch
$ vlan 10              => colocamos o número da vlan que queremos configurar
$ name VENDAS          => seguimentar as vlans por setor da empresa, por isso vamos nomeá-la
$ exit                       => sair das configurações dessa vlan
$ CTRL + Z                   => sair da configuração
$ show vlan brief            => vemos que ela foi adicionada, mas ainda não tem interfaces
$ configure terminal   => para entrar no modo de configuração do switch
$ interface range fastEthernet 0/1 - 2 => com range podemos configurar mais de uma porta do switch de uma só vez
$ switchport mode access     => O comando switchport mode access indicaria que essa porta está conectada a um dispositivo final
$ switchport access vlan 10  => definir qual vlan essa porta está associada
$ exit                       => sair das configurações dessa vlan
$ CTRL + Z                   => sair da configuração
$ show vlan brief            => agora vemos que a vlan de vendas está associada as portas 0/1 e 0/2
```

#Portas_Trunk:
       * As portas trunk são portas configuradas para realizar o transporte de múltiplas Vlans entre Switches ou entre Switches e roteadores:
```
 $ enable               => para subir em privilégio administrativo
 $ show vlan brief      => mostra todos os números de vlan sendo utilizadas 1-1005, usar apenas números livres
 $ configure terminal   => para entrar no modo de configuração do switch
 $ interface range fastEthernet 0/3 => porta que iremos configurar em modo trunk
 $ switchport mode trunk            => definindo a porta em modo trunk
 $ CTRL + Z                         => sair da configuração
 $ show interfaces trunk            => mostra as portas que estão trabalhando em modo trunk e quais números de vlan elas passam
```

**Comunicação entre duas vlans atraves do roteador e configurando o DHCP**:
```
* no switch
 $ enable  
 $ configure terminal                   
 $ interface fastEthernet 0/5           
 $ switchport mode trunk                
 $ show interfaces trunk
* no roteador
 $ enable                     => para subir em privilégio administrativo
 $ configure terminal         => para entrar no modo de configuração do roteador
 $ interface fastEthernet 0/1 => para começar a configurar uma porta do roteador
 $ no shutdown                => agora a porta estará habilitada e acesa em verde
 $ CTRL + Z                   => sair da configuração
 $ ip dhcp pool VLAN10          => O conjunto de endereços IP disponíveis, já descontados os endereços das faixas de exelusão, é conhecido como Pool de endereços.
 $ network 192.168.10.0 255.255.255.0  => definir o endereço de rede e máscara de rede
 $ exit          
 $ ip dhcp pool VLAN20                 => O conjunto de endereços IP disponíveis, já descontados os endereços das faixas de exelusão, é conhecido como Pool de endereços.
 $ network 192.168.20.0 255.255.255.0  => definir o endereço de rede e máscara de rede
 $ exit
 $ interface fastEthernet 0/1.1        => vamos dividir a fasEthernet em duas sub interfaces, uma para a Vlan10 e outra para a 20 
 $ encapsulation dot1Q 10              =>
 $ ip address 192.168.10.1 255.255.255.0  => definindo um ip para essa sub rede
 $ exit 
 $ interface fastEthernet 0/1.2        => vamos dividir a fasEthernet em duas sub interfaces, uma para a Vlan10 e outra para a 20
 $ encapsulation dot1Q 20
 $ ip address 192.168.20.1 255.255.255.0  =>  definindo um ip para essa sub rede
 $ exit 
 $ ip dhcp pool VLAN10
 $ default-router 192.168.10.1         => DHCP gateway
 $ exit 
 $ ip dhcp pool VLAN20
 $ default-router 192.168.20.1         => DHCP gateway               
 $ exit          
```

#DHCP: O protocolo DHCP é um protocolo de cliente/servidor que fornece automaticamente um host ip (protocolo IP) com seu endereço IP e outras informações de configuração relacionadas, como a máscara de sub-rede e o gateway padrão.
```
* cofigurando Roteador na aba cli:
 $ enable                      => para subir em privilégio administrativo
 $ configure terminal          => para entrar no modo de configuração do roteador
 $ interface fastEthernet 0/0  => para começar a configurar uma porta do roteador
 $ no shutdown                 => agora a porta estará habilitada e acesa em verde
 $ exit                        => sair das configurações dessa porta
 $ ip dhcp pool ALURA          => O conjunto de endereços IP disponíveis, já descontados os endereços das faixas de exelusão, é conhecido como Pool de endereços.
 $ network 192.168.0.0 255.255.255.0  => definir o endereço de rede e máscara de rede
 $ default-router 192.168.0.1  => definir um gateway padrão para todas as máquinas conectadas a essa rede
 $ exit
 $ interface fastEthernet 0/0  => Para configurarmos a porta 0/0 do roteador
 $ ip address 192.168.0.1 255.255.255.0     => Definir o IP dessa porta 0/0 que como já informamos antes servirá como gateway
Ir na aba Descktop de cada computador e mudar de Static para DHCP
```
* Quando um cliente não possui endereço IP ele não sabe a quem perguntar, então ele precisa sair perguntando para todo mundo que está na mesma rede quem poderá fornecer um endereço IP. Quando essa comunicação é feita para todos os dispositivos, chamamos isso de Broadcast.

**Servidor web**: Referente ao hardware, um #servidor web é um computador que armazena arquivos que compõem os sites (por exemplo, documentos HTML, imagens, folhas de estilo, e arquivos JavaScript) e os entrega para o dispositivo do usuário final. Está conectado a Internet e pode ser acessado através do seu nome de domínio (DNS), como por exemplo mozilla.org. Referente ao software, um servidor web inclui diversos componentes que controlam como os usuários acessam os arquivos hospedados (armazenados para disponibilização), no mínimo um servidor HTTP. Um servidor HTTP é um software que compreende URLs (endereços web) e HTTP (o protocolo que seu navegador utiliza para visualizar páginas web.
```
* cofigurando Roteador na aba cli:
 $ enable                      => para subir em privilégio administrativo
 $ configure terminal          => para entrar no modo de configuração do roteador
 $ interface fastEthernet 0/1  => configurar a porta 0/1
 $ no shutdown                 => agora a porta estará habilitada e acesa em verde
 $ ip address 8.8.8.1 255.0.0.0
* Agora ir no servidor:
 Em ip configuration > interface > static > ipv4 = 8.0.255.255 > Subnet mask = 255.0.0.0 > gateway > 8.8.8.1 
* Colocar um html para o projeto do google:
 Ir em Services > Http > indice 5 > edit > apagar tudo > 
								<html>
								<h1>GOOGLE</h1>
								<input type="search">
								<input type="button" value="Buscar">
								</html>
* Agora ir em um dos PCs e em web digitar o ip do servidor: 8.0.255.255
```

#DNS: O sistema DNS da internet funciona praticamente como uma agenda de telefone ao gerenciar o mapeamento entre nomes e números. Os servidores DNS convertem solicitações de nomes em endereços IP, controlando qual servidor um usuário final alcançará quando digitar um nome de domínio no navegador da web.
```
* No servidor DNS:
 Em ip configuration > interface > static > ipv4 = 8.1.0.0 > Subnet mask = 255.0.0.0 > gateway > 8.8.8.1
* Fazer o DNS do ip do google:
 Ir em Services > DNS > dns service = on >  name = www.google.com > address = 8.0.255.255 > add
* Ir no roteador DHCP para informarmos quem será o DNS (note que em ip configuration de cada máquina não tem um dns setado, o DHCP irá informar):
 $ enable                      => para subir em privilégio administrativo
 $ configure terminal          => para entrar no modo de configuração do roteador
 $ ip dhcp pool ALURA          => acessar o poll que criamos antes
 $ dns-server 8.1.0.0          => agora o DHCP sabe qual IP de DNS ele deve passar aos computadores
 Ir nos computadores e dar refresh mudando de Static para DHCP
* O serviço web utiliza a porta de comunicação 80 para o protocolo HTTP e 443 para a versão segura do protocolo HTTP (HTTPS), enquanto que o protocolo DNS utiliza a porta de comunicação 53
```

#STP (Spanning tree protocol):
* Spanning Tree Protocol (referido com o acrónimo STP) é um protocolo para equipamentos de rede que permite resolver problemas de loop em redes comutadas cuja topologia introduza anéis nas ligações, auxiliando na melhor performance da rede. O protocolo STP possibilita a inclusão de ligações redundantes entre os computadores, provendo caminhos alternativos no caso de falha de uma dessas ligações. Nesse contexto, ele serve para evitar a formação de loops entre os comutadores e permitir a ativação e desativação automática dos caminhos alternativos. Para isso, o algoritmo de Spanning Tree determina qual é o caminho mais eficiente (de menor custo) entre cada segmento separado por bridges ou switches. Caso ocorra um problema nesse caminho, o algoritmo irá recalcular, entre os existentes, o novo caminho mais eficiente, habilitando-o automaticamente.
```
 $ enable                      => para subir em privilégio administrativo
 $ show spanning-tree vlan 10  => mostra informações do switch root e do atual (bridge ID) 
 $ show spanning-tree vlan 20
 $ enable
 $ configure terminal
 $ spanning-tree vlan 10 priority 0 => para definir um switch como root da vlan 10 manualmente
 $ spanning-tree vlan 20 priority 0 => para definir um switch como root da vlan 20 manualmente
```

#Máscara_de_Rede: A máscara de rede é usada como forma de comparação para determinar se dois equipamentos estão na mesma rede. Para isso ela vai dividir o endereço IP em dois grupos, de rede e hosts (máquinas).

#Defaut_gateway: O default gateway é o endereço IP o qual será responsável por encaminhar pacotes para redes externas, é o IP do meu roteador.

#Broadcast: Broadcast seria um termo usado quando a comunicação é feita para todos os dispositivos que estão na mesma rede.
!Vamos fazer agora a tradução do endereço IP de loopback para a url www.cursoderedesdaalura.com: Caso seja Windows: Abrir bloco de notas como administrador e abrir o arquivo hosts localizado em C:\Windows\System32\drivers\etc e insira na última linha o mapeamento 127.0.0.1 www.cursoderedesdaalura.com e teste o ping para essa url
!Para modificar o IP da minha máquina manualmente:  Vamos até no ícone de conectividade, depois em "configurações de rede", "Ethernet". Em seguida, clicaremos em "Ethernet", ao ser aberta uma nova janela, selecionaremos "Propriedades". Será aberta uma nova janela, buscaremos pela opção "Protocolo IP Versão 4(TCP/IPv4)", depois em "Propriedades". Na nova janela, selecionaremos "Usar o seguinte endereço IP" e escreveremos o IP que ele deverá usar para fazer o teste.

#Classful e #Classless: Nas redes Classful utilizamos as máscaras de rede respectivas a sua classe de endereços IP. Já nas redes Classless não teríamos esse vínculo entre endereços IP e máscaras de redes, somos livres para ajustar a máscara de rede para nossa necessidade independente de qual classe estarmos usando.  (classful ex: 255.255.255.0 , classless ex: 255.255.254.0)
           * Devemos desenvolver um projeto e o arquiteto de redes do projeto que estamos desenvolvendo disse que todos os endereços IP devem possuir máscara de rede /19. Que máscara de rede seria essa? A anotação CIDR seria a referência de quantos bits 1 nós temos em nossa máscara de rede. A máscara de rede possui ao todo 32 bits sendo separados em quatro intervalos com 8 bits por intervalos. Teremos então: 11111111.11111111.11100000.00000000 Se nós transformarmos esse valor em decimal, teremos: 255.255.224.0 Embora a forma oficial de representação e configuração da máscara de rede para endereços IPv4 seja por essa forma decimal (255.255.224.0) é comum no dia-a-dia utilizar essa anotação CIDR (/19).

#ACL: Listas de acesso ou do inglês (ACL) são listas as quais contém políticas de permissão ou negação de acesso por parte de clientes. Dessa forma, conseguimos criar políticas por usuário de quais protocolos e serviços que podem ser utilizados
```
* Uma vez que a lista de acesso não possui nenhuma configuração para tratamento de um pacote de informação, a lista irá descartar esse pacote. 
* No roteador:
 $ enable                                     
 $ configure terminal                          
 $ ip access-list extended SERVIDOR-GERENTES  => Criando uma lista de acesso
 $ no ip access-list extended SERVIDOR-GERENTES  => Para excluir uma lista de acesso
 Retirar os ips de dinâmico para estático para não inutilizar a lista
 $ permit tcp 172.16.2.131 0.0.0.0 172.16.3.2 0.0.0.0 => informando o ip do computador que desejamos permiter acesso e o "Source wildcard bits" que seria para indicar para a lista de acesso qual parte do ip deve igual e qual a parte pode ser diferente, quando temos mais de um computador querendo se comunicar. Depois devemos colocar o ip de destino que no caso seria o servidor e também informar o "Source wildcard bits"
 $ permit tcp 172.16.0.2 0.0.0.0 172.16.3.2 0.0.0.0   => outro computador com permissão a este servidor
 $ deny tcp 172.16.2.128 0.0.0.255 172.16.3.2 0.0.0.0 => Isto quer dizer que se não for nenhum desses endereços (172.16.2.131 e 172.16.0.2), o pacotinho será negado! Feito isso, vamos permitir que os outros protocolos de comunicação trabalhem normalmente, sem que o ACL exclua o pacote e derrube a comunicação dos demais computadores
 $ deny tcp 172.16.0.0 0.0.0.255 172.16.3.2 0.0.0.0
 $ permit ip any any                                  => Com o #permit ip any any, estamos permitindo qualquer tráfego que não seja destinado ao servidor. Uma vez que estamos colocando any, isso indica que qualquer endereço IP de origem assim como qualquer endereço IP de destino será aceito. Essa configuração é comumente utilizada nas listas de acesso para permitir que todo tráfego que esteja fora do nosso foco da lista de acesso continue funcionando normalmente.
 $ exit
 $ ip dhcp excluded-address 172.16.2.131  => como estou usando estaticamente esses indereços ips eu preciso que o dhcp os exclua para que ele não acabe os entregando para outros computadores e cause conflito na rede
 $ ip dhcp excluded-address 172.16.0.2
 $ interface fastEthernet 0/1.1 
 $ ip access-group SERVIDOR-GERENTES in  
 $ exit  
 $ interface fastEthernet 0/1.2 
 $ ip access-group SERVIDOR-GERENTES in 
```
#WAN: Wide Area Network  => As redes LAN são redes geograficamente pequenas, que geralmente estão concentradas em apenas um local, tais redes são de responsabilidade do cliente final. As redes WAN são redes de longa extensão geográfica, redes de provedores de serviços costumam possuir suas redes em diferentes cidades e estados acomodando diversos clientes.
#LAN: Local Area Network
#NAT: Isso acontece porque nosso roteador possui a configuração chamada NAT, essa configuração vai converter o endereço IP privado que temos em nossas máquinas para IP públicos que nosso provedor de serviços nos fornece.
```
* configurando NAT 
! Fazer nos dois roteadores, o seu e no do provedor
$ enable    
$ configure terminal   
$ interface serial 0/1/0   
$ no shutdown  
$ ip address 150.1.1.1 255.255.255.252  => Roteador 1, este é o ip público
$ ip address 150.1.1.2 255.255.255.252  => Roteador 0
!
!Faremos então a tradução dos IPs públicos para os privados
No roteador do cliente roteador 0:
$ enable    
$ configure terminal  
$ ip access-list standard NAT     => O tipo standard analisa a origem dos endereços e nesse caso estamos só preocupados com a origem e não com o possível destino que esses endereços planejam acessar
$ permit 172.16.0.0 0.0.255.255   => Tanto o setor de vendas quanto o de finanças começam com 172.16 por isso já estamos permitindo todos os computadores da rede com 0.0.255.255 de poderem ser traduzidas para um ip público
$ exit
$ interface fastEthernet 0/1.1    
$ ip nat inside   
$ exit   
$ interface fastEthernet 0/1.2    
$ ip nat inside   
$ exit   
$ interface serial 0/1/0    
$ ip nat outside   
$ exit   
$ ip nat inside source list NAT interface serial 0/1/0 overload   => Com esse comando, diremos que será traduzido os endereços IPs que estão na rede (inside), e especificamos quais são esses endereços IPs que estão na lista NAT para a interface serial 0/1/0. Entretanto, seremos um pouco cuidadoso, porque só temos um endereço IP público, mas temos vários usuários na rede que podem estar acessando a internet ou qualquer outro recurso externo simultaneamente. Para especificar que a configuração da tradução tem que englobar todos esses endereços IPs internos de forma simultânea, colocaremos o overload. Com o overload, é dito que todos os usuários podem estar usando simultaneamente o endereço IP público 150.1.1.2. Depois disso, usamos a tecla "Enter" e teoricamente já criamos a lista de acessos com os endereços IPs que devem ser traduzidos. Nós especificamos as interfaces internas e externas, e associamos a nossa lista com esses IPs privados, para ela ser traduzida para a interface                                                                              serial 0/1/0, que irá conter o endereço público, e também especificamos a forma de tradução overload, dizendo que pode ocorrer mais de um usuário estar usando um recurso da internet ao mesmo tempo. 
$ show ip nat translations   => Para vermos todas as traduções feitas
```
#RIP:
      * O protocolo de roteamento RIP é um dos mais antigos protocolos de roteamento e tem como métrica a quantidade de saltos (hops) para definir a melhor rota. O protocolo RIP vai definir como a melhor rota aquela onde apresentar a menor quantidade de saltos (hops) para chegar até o destino. Dessa forma, parâmetros como velocidade do link não é analisada por esse protocolo e com isso podemos ter a escolha de uma rota menos eficiente (por isso a maioria das vezes utilizamos OSPF).
```
No roteador (router 1)
$ enable
$ configure terminal
$ router rip    => habilita o protocolo
$ version 2
$ no auto summary
$ network 150.1.1.0
$ network 150.1.1.4   
No roteador (router 2)
$ enable
$ configure terminal
$ router rip
$ version 2
$ no auto summary
$ network 150.1.1.4
$ network 150.1.1.8
$ show ip route 
```
#OSPF: 
      * O protocolo de roteamento OSPF (Open Shortest Path First) é enquadrado na categoria de protocolo de roteamento dinâmico de interior gateway, responsável em encaminhar os pacotes de rede pelo melhor caminho possível.
      * O protocolo OSPF permite que tenhamos uma divisão de nossa rede separada por áreas, possuindo dentre outras vantagens a possibilidade de isolar possíveis problemas. Quando rotas são informadas de uma área para a outra damos o nome de inter area.
      * O protocolo OSPF utiliza a velocidade do link como métrica para definição da melhor rota. A fórmula para o cálculo dessa métrica seria chamada de custo e utiliza a velocidade padrão de 100 Mbps dividida pela velocidade do link. Por exemplo, caso a velocidade do link seja de 10 Mbps nós termos o custo de 100 Mbps / 10 Mbps = 10, dessa forma quanto maior a velocidade do link menor será o resultado dessa divisão e consequentemente será uma rota melhor de acordo com o OSPF.
      * Através da divisão por áreas conseguimos isolar possíveis problemas e instabilidades que possam ocorrer em uma área, não necessitando assim informar todos esses detalhes para outras áreas sobrecarregando a rede.
```
No roteador (router 3):
$ enable
$ configure terminal
$ router ospf 1   => router ospf <num_identificação>, para habilitar o ospf
$ network 170.1.1.0 0.0.0.255 area 0
$ network 180.1.1.0 0.0.0.255 area 0
No roteador (router 4):
$ enable
$ configure terminal
$ router ospf 1   => router ospf <num_identificação>, para habilitar o ospf
$ network 180.1.1.0 0.0.0.255 area 0
$ network 190.1.1.0 0.0.0.255 area 1
$ show ip route
```
#BGP:
      * BGP (Border Gateway Protocol) é o protocolo subjacente ao sistema de roteamento global da Internet. Ele gerencia como os pacotes são roteados, de rede para rede, por meio da troca de informações de roteamento e acessibilidade entre roteadores de ponta. 
      * A internet seria formada por uma série de provedores de serviços informando as rotas que cada um conhece para outro provedor de serviço, essa comunicação feita entre vários provedores é normalmente feita pelo protocolo BGP
      * Os números de Autonomous System são números usados para identificar redes de provedores de serviços e que permitem que um provedor de serviço troque informações com outros provedores de serviços vizinhos.
```
No roteador (router 2):
$ enable
$ configure terminal
$ router bgp 1000  =>
$ neighbor 160.1.1.2 remote-as 2000  => neighbor <ip> <AS> ver: https://bgp.he.net/country/BR
No roteador (router 3):
$ enable
$ configure terminal
$ router bgp 2000 
$ neighbor 160.1.1.1 remote-as 1000
$ network 170.1.1.0 mask 255.255.255.252
$ network 180.1.1.0 mask 255.255.255.252 
$ network 190.1.1.0 mask 255.255.255.252
No roteador (router 2):
$ show ip route
$ configure terminal
$ router bgp 1000
$ network 150.1.1.0 mask 255.255.255.252
$ network 150.1.1.4 mask 255.255.255.252
$ network 150.1.1.8 mask 255.255.255.252
No roteador (router 3):
$ enable
$ configure terminal
$ router ospf 1
$ redistribute bgp 2000 subnets   => redistribuir as redes que foram aprendidas via protocolo BGP para os outros roteadores
No roteador (router 4):
$ show ip route
No roteador (router 2):
$ enable
$ configure terminal
$ router rip
$ default-information originate => Para definir o Router5 como portão de saída padrão da rede, selecionaremos o roteador, e no seu terminal usaremos o comando default-information originate, o qual informa aos demais roteadores que se comunicam via protocolo RIP que este é o portão de saída padrão da rede.
No roteador (router 0):
$ configuration terminal   
$ no ip route 150.1.1.8 255.255.255.252 serial 0/1/0
$ ip route 0.0.0.0 0.0.0.0 serial 0/1/0  => A rota default é a rota de saída padrão de uma rede, caso nenhuma entrada mais específica esteja presente na tabela de roteamento do roteador, a rota default irá assumir e encaminhará os dados para a interface que foi configurada
```
#IPV6:
      Ver: https://www.alura.com.br/artigos/entendendo-o-ipv6
      * O desenvolvimento do protocolo IPv6 foi necessário porque a quantidade de endereço IPv4 públicos chegaram a um fim. Dessa forma, uma das preocupações no desenvolvimento desse novo protocolo era com relação a quantidade de endereços disponíveis para evitar assim que um novo protocolo precisasse ser desenvolvido. O IPv6 é capaz de fornecer aproximadamente 3.4×10 ^ 38 endereços, o que faz com que o esgotamento de endereços IPv6 seja muito improvável mesmo pensando a longo prazo.
      * O protocolo IPv6 possui ao todo 8 intervalos com 16 bits em cada intervalo, o que totalizaria 128 bits no protocolo IPv6
      * O protocolo IPv6 permite que seja realizada uma abreviação :: quando ocorrer uma sequência de intervalos de bits 0. Porém essa abreviação só pode ser realizada uma vez no endereço IPv6. Em nossa rede, o endereço IPv6 apresentado possui duas abreviações e dessa forma, não é um endereço IPv6 válido e não irá funcionar.
      * Ao analisar o endereço IPv6 3002:ABD2:8712:5634:9231:7622:6621:9012 / 48 Qual deveria ser o endereço IPv6 de um outro dispositivo para eles estarem na mesma rede? A máscara de rede do endereço IPv6 é /48, isso indica que os 48 primeiros bits devem ser iguais entre os dispositivos para que eles estejam na mesma rede. Dessa forma, outro dispositivo deverá começar com o intervalo 3002:ABD2:8712 para estar na mesma rede desse endereço IPv6.
```
No switch (switch 2):
$ enable
$ configure terminal
$ interface fastEthernet 0/10   
$ switchport access vlan 30
$ show vlan brief
No servidor (servidor 5):
Vá em IPV6 configuration
$ 2001:0BAA:0000:0000::AAAA / 64  => em ipv6 address static
$ 2001:0BAA:0000:0000::BBBB       => em ipv6 gateway
No roteador (router 0):
$ enable
$ configure terminal
$ ipv6 unicast-routing  
$ interface fastEthernet 0/1.3  
$ ipv6 address 2001:0BAA:0000:0000::BBBB/64 => já podemos dar um "do ping 2001:0BAA::AAAA" e ver que temos comunicação com o server
$ exit
$ interface fastEthernet 0/1.1
$ ipv6 address 2000:0BAA:0000:0000::BBBB/64 => vlan de vendas
$ exit
$ interface fastEthernet 0/1.2
$ ipv6 address 2002:0BAA:0000:0000::BBBB/64 => vlan de finanças
Nos computadores:
Ge. Finanças
$ 2002:0BAA:0000:0000::AAAA/64 =>  Ge.Finanças em ipv6 em ip configuration
$ 2002:0BAA:0000:0000::BBBB    => gateway
Fun.Vendas
$ 2000:0BAA:0000:0000::AAAA/64
$ 2000:0BAA:0000:0000::BBBB
Ge.Vendas
$ 2000:0BAA:0000:0000::CCCC/64
$ 2000:0BAA:0000:0000::BBBB
Fun.Finanças
$ 2002:0BAA:0000:0000::CCCC/64
$ 2002:0BAA:0000:0000::BBBB
```
#SSID:
      O SSID (Service Set Identifier) é um texto de até 32 caracteres que identifica as redes sem fio. É esse nome que os dispositivos utilizam para se conectar. Cada ponto de acesso tem seu SSID que o identifica na rede. Em alguns casos, podemos ter na mesma rede vários pontos de acesso com o mesmo SSID. Neste caso, é comum ouvir o termo ESSID (Extended Service Set ID). No primeiro curso de redes vimos que existem os endereços IPs que os computadores utilizam para se comunicar e, além dos endereços IPs, existem os endereços MAC. Esses endereços são fixos e associados a placa de rede do dispositivo. Quando utilizamos vários SSID na mesma rede, as máquinas utilizam o endereço MAC para saber qual o access point que estão conectadas. Em redes sem fio, isso é chamado de BSSID (Basic Service Set ID). O BSSID nada mais é do que o endereço MAC do ponto de acesso. Mesmo sem ter mais de um access point com o mesmo nome, os dispositivos sempre utilizam o BSSID para realizar a comunicação com o ponto de acesso.
      Ver: https://www.lifewire.com/wireless-standards-802-11a-802-11b-g-n-and-802-11ac-816553
Canais de Wifi:
      Ver: https://www.microsoft.com/pt-br/p/wifi-analyzer/9nblggh33n0n?activetab=pivot:overviewtab

#WEP: 
      * WEP significa Wired Equivalent Privacy, e foi introduzido na tentativa de dar segurança durante o processo de autenticação, proteção e confiabilidade na comunicação entre os dispositivos Wireless.
      * Ele possui o pobrema de ter seu sinal interceptado
#WPA: 
      * WPA (Wi-Fi Protected Access) é um protocolo de comunicação via rádio. É um protocolo WEP melhorado. Também chamado de WEP2, ou TKIP (Temporal Key Integrity Protocol), essa primeira versão do WPA (Wi-Fi Protected Access) surgiu de um esforço conjunto de membros da Wi-Fi Aliança e de membros do IEEE, empenhados em aumentar o nível de segurança das redes sem fio ainda no ano de 2003, combatendo algumas das vulnerabilidades do WEP.
      Ver: https://pt.wikipedia.org/wiki/WPA2_(AES)
#Firewall:
      * O firewall é usado para dividir uma rede segura (rede interna) de uma rede não segura (por exemplo, a internet) e podemos assim controlar o tráfego que é permitido ou negado entre a rede interna e a rede externa. De forma geral, um usuário que esteja na rede interna poderá acessar recursos que estão na rede externa, porém um usuário da rede externa não terá permissão de acessar recursos da rede interna.
      * A região desmilitarizada (DMZ) seria a região na qual temos recursos que devem ser acessados por usuários da internet. Dessa forma, conseguimos isolar essa região de recursos que precisam ser acessados externamente dos recursos que devem ser acessados somente por usuários de nossa rede interna.
      * Os firewalls stateful conseguem guardar em sua memória informações das requisições internas que foram iniciadas. Quando ocorre um retorno desse pacote o firewall compara com sua tabela de memória elementos como endereço IP, portas de comunicação, etc e com isso consegue definir que trata-se de uma informação de retorno e com isso permitirá acesso a rede interna.
      * O Reverse Shell seria a forma na qual o comando de uma máquina é obtida através de uma conexão da máquina alvo com a máquina de ataque. Ou seja, a conexão é estabelecida na direção reversa ao qual o ataque é realizada. Esse tipo de ataque torna-se muito útil, pois é possível que equipamentos de segurança como o Firewall nos conceda permissão de acesso a rede interna uma vez que nosso pacote é um retorno a uma requisição que foi originada por um usuário interno a rede.
      * Inbound - Tráfego que chega até o firewall em direção ao servidor/rede. Outbound - Tráfego originado no servidor/rede com destino a outras redes.
      * Ao criar um Security Group da AWS por default (máquinas Linux), é criada uma regra que permite que você faça a conexão através do protocolo SSH (porta 22).
      * pfSense - Logo após a instalação, sem termos feito nenhuma customização, é possível acessar o pfSense através do browser (porta 80) e também através do console do próprio firewall. Por default, o acesso via SSH vem desabilitado. Para um gerenciamento seguro, é recomendável que você desabilite o acesso à porta 80 ( a porta padrão do HTTP) e habilite o gerenciamento web exclusivamente pela porta 443 (HTTPS).
      * O posicionamento das regras dentro de um firewall é pré-requisito para o correto funcionamento do mesmo. Uma boa prática é colocar logo no início as regras responsáveis por tratar o maior volume de requisições, dessa maneira você otimiza os recursos (memória, CPU, etc) utilizados pelo firewall.
#Proxy e #Proxy_Reverso:
      * Ngix é um Proxy Reverso. Um proxy é um intermediário entre as requisições cliente-servidor, usado para por exemplo filtrar resquisições eliminando 
        as indesejadas (bloquear em uma empresa o acesso a redes sociais/sites adultos). Mas, o conceito padrão de proxy é algo que fica no lado do cliente 
        interceptando os pacotes de rede. Como nesse caso o proxy está no lado do servidor, chamamos de proxy reverso.


```bash
$ ping       # Verifica a conectividade no nível de IP para outro computador TCP/IP enviando mensagens de solicitação de eco do Protocolo ICMP. O recebimento de mensagens de resposta de eco correspondentes é exibido, juntamente com os tempos de ida e volta. 
$ ipconfig   # Exibe todos os valores atuais de configuração de rede TCP/IP e atualiza as configurações de protocolo DHCP e DNS (sistema de nomes de domínio). Usado sem parâmetros, o ipconfig exibe endereços IPv4 (protocolo IP versão 4) e IPv6, máscara de sub-rede e gateway padrão para todos os adaptadores.
#TTL: O TTL seria uma informação dentro do pacote do IP que informa qual é a máxima quantidade de hops que minha informação pode passar antes de ser descartada. É a quantidade de máquinas que ela vai poder passar no caminho.
$ ipconfig /all # Exibe mais informações, inclusive o número de série da minha placa de Rede (MAC ou Endereço Físico) usado no protocolo ARP do aparelho Switch
$ dig www.youtube.com # Retorna uma tabela com diversos IPs dos servidores DNS do YT mais próximos da minha região. Com esses vários IPS o computador faz o load balancer dos IPS, ou seja, uma aba ele usa um endereço e outra aba ele usa outro endereço para balancear a carga. Em cname: A = IPv4 e AAAA = IPv6
$ tracert -d    # O traceroute seria usado para verificar a rota que minha informação percorreu até chegar o destino. (traceroute -n no linux)
               # Output: "*" Quando nós temos uma máquina que retornou (*) e passou a informação para uma próxima máquina, isso provavelmente indica que o administrador dessa máquina desabilitou a resposta ao nosso chamado. O que acontece seria que esse tipo de teste pode ser interpretado como uma tentativa de “scanear” possíveis portas abertas e vulnerabilidades que possam existir, caso seja usado por um usuário malicioso, pode ser usada como uma forma de reconhecimento da rede dessa possível vítima para que assim possa explorar possíveis falhas.
$ nslookup          # Exibe informações que você pode usar para diagnosticar a infraestrutura do DNS (Sistema de Nomes de Domínio). Antes de usar essa ferramenta, você deve estar familiarizado com o trabalho do DNS. A ferramenta de linha de comando nslookup estará disponível somente se você tiver instalado o protocolo TCP/IP.
$ ping 127.0.0.1 || ping localhost # É um endereço interno da placa de rede, usado para testar se os protocolos TCP/IP estão funcionando. Ele é conhecido como endereço de loopback, pois o sinal é enviado e recebido por ele mesmo.
$ netstat           # ver netstat --help
```


#iptables 
```bash
!Um alternativa ao firewall pfSense, o iptables já vem instalado no Kernel do Linux
$ systemctl status iptables.service  # Verifica os status do Ip Tables
$ systemctl stop iptables.service    # Desativa o firewall
$ systemctl start iptables.service   # Ativa o firewall
$ iptables -L -n    # O iptables é um programa escrito em C, utilizado como ferramenta que configura regras para o protocolo de internet IPv4 na tabela de filtragem de pacotes, utilizando os módulos e framework do kernel Linux. Com -L nós listamos as regras criadas. Iptables trabalha com 3 tabelas: INPUT: para os dados que chegam ao servidor. OUTPUT: para os dados que saem do servidor. FORWARD: para os dados que passam pelo servidor.  
$ iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT # geralmente a primeira regra que deve ser colocada no firewall. Quando um pacote chega até o iptables, e tem o seu acesso concedido, o firewall coloca isso em memória. Logo, ele sabe que a origem "A" está falando com o servidor "B", e fica com essa tabela em memória, para ele poder se referenciar a essa conexão. Então algumas tabelas ficam em memória. Esta regra é criada, para que tudo o que foi aceito, tudo o que está conectado, ou seja, uma vez foi permitido, deixamos passar. Se essa for a primeira regra, também economizaremos recursos do firewall. Assim, se uma nova conexão HTTP chega ao servidor, por exemplo, ela não precisará ir até a regra da porta HTTP do firewall, já que se houver uma conexão pronta em memória, a conexão será aceita.
$ iptables -A INPUT -i lo -j ACCEPT     #  (!importante) Isso permite a conexão de diferentes serviços que estão rodando na minha máquina. Partindo do princípio que tudo está funcionando na mesma máquina (servidor web, banco de dados, entre outras aplicações), quando o servidor web consulta o banco de dados, por exemplo, qual é o IP de origem? Não é o IP associado à interface ethernet, e sim o IP da interface loopback. Por isso passamos a flag -i (de interface) e especificamos o campo lo (de loopback). Se não houver uma regra desse tipo no firewall, as conexões internas na mesma máquina não irão funcionar.
$ iptables -A NOME_DA_CHAIN -p PROTOCOLO -s ENDEREÇO_DE_ORIGEM -d ENDEREÇO_DE_DESTINO --dport PORTA_DE_DESTINO -j AÇÃO_DA_REGRA # Definindo uma regra pelo iptables ex: iptables -A INPUT -p tcp -s 0.0.0.0/0 -d 138.197.34.9 --dport 80 -j ACCEPT // iptables -A INPUT -p tcp --dport 443 -j ACCEPT // iptables -A INPUT -p tcp -d IP_SERVIDOR --dport 22 -j ACCEPT // iptables -i INPUT 5 -p tcp -d IP_SERVIDOR --dport 22 -j LOG (Como as regras são processadas sequencialmente, é necessário criar primeiro a regra tipo LOG e depois a regra em questão. Caso essa ordem seja invertida, não haverá pacotes a serem logados, uma vez que eles já encaixaram na regra anterior.)
$ iptables -i INPUT 1 -p tcp --dport http -j ACCEPT  # -i para adicionar a regra na posição que desejar, neste caso na posição 1 (INPUT 1). Isso ajuda a economizar processamento, pois estamos colocando as regras mais importantes primeiro, para que sejam processadas primeiro.     
$ iptables -P INPUT DROP     # O ideal é só aceitarmos o que deixamos explícito nas regras, se o pacote não encaixar em nenhuma delas, ele deve ser descartado. Vamos então mudar a política do iptables. Bem simples. Utilizamos a flag -P para especificar que estamos alterando a policy da chain INPUT para DROP.
$ iptables -D INPUT 1  # Para excluir somente uma regra. Utilizamos o flag -D para especificar que queremos excluir uma regra. Em seguida dizemos em que chain a regra a ser excluída se encontra, e passamos o número dela, o número 1 representa que a regra é a primeira da lista, da chain INPUT.
$ iptables -F   # limpar todas as regras do ip tables
$ iptables-save > regras-firewall # Já vimos como criar as regras, mas ainda não sabemos como salvá-las, então se o servidor acabar sendo desligado ou reiniciado, as mesmas são perdidas. Como o iptables-save nos retorna tudo o que está rodando na memória, podemos salvar esse conteúdo em um arquivo
$ iptables-restore < regras-firewall # Agora o arquivo regras-firewall possui todas as nossas regras criadas, que são as regras a serem aplicadas no firewall. Assim como salvamos as regras, podemos restaurá-las, através de outra ferramenta, a iptables-restore
$ sudo apt-get install iptables-persistent # Para usuários de sistemas baseados no Debian, há um pacote que nos auxilia nesse processo, iptables-persistent. Esse pacote, quando instalado, criará o arquivo rules.v4, dentro do diretório /etc/iptables/. Esse arquivo basicamente possui como conteúdo o retorno do comando iptables-save, e ao reiniciarmos o servidor, ele será automaticamente carregado, colocando as regras em memória. Caso criemos uma nova regra, basta refazermos o arquivo: $ iptables-save > /etc/iptables/rules.v4
#Ver: https://www.alura.com.br/artigos/protegendo-seu-servidor-com-iptables
     #https://www.youtube.com/watch?v=oZ36N2KhqHY&ab_channel=Hack3r         
# Ataque feito burlando o iptables com conexão reversa
```


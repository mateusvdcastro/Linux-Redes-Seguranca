Para alcançar um alto nível de anonimato na internet, é necessário empregar várias camadas de proteção, envolvendo tanto ferramentas tecnológicas quanto práticas de comportamento digital seguro. A seguir, uma explicação de cada método mencionado e outras estratégias adicionais, bem como uma análise de como um criminoso poderia ser rastreado, mesmo com essas proteções.

### 1. **Mudança de Localização Geográfica**

- **O que é:** A mudança de localização geográfica envolve se conectar à internet a partir de diferentes locais físicos, dificultando o rastreamento baseado em padrões de uso.
- **Como funciona:** Ao se conectar a redes Wi-Fi públicas ou de terceiros (ex: cafés, bibliotecas), o endereço IP atribuído será diferente do que você teria ao usar sua própria conexão doméstica. Isso ajuda a mascarar sua identidade.
- **Limitações:** Se não houver outras camadas de anonimato, como uma VPN ou Tor, o provedor de internet do Wi-Fi usado pode ainda identificar o dispositivo.

### 2. **Wi-Fi de Terceiros**

- **O que é:** Conectar-se a redes Wi-Fi que não são de sua propriedade para ofuscar a origem do tráfego.
- **Como funciona:** O uso de Wi-Fi público ou de terceiros adiciona uma camada de anonimato, pois o endereço IP será diferente do habitual.
- **Limitações:** Essas redes podem ser monitoradas e registradas, além do risco de intermediação maliciosa (ataque man-in-the-middle).

### 3. **VPN (Virtual Private Network)**

- **O que é:** Um serviço que criptografa seu tráfego e o roteia através de servidores em diferentes locais, mascarando seu endereço IP real.
- **Como funciona:** Ao usar uma VPN, todo o seu tráfego de internet é criptografado e enviado para um servidor da VPN antes de acessar o destino final. Isso oculta sua verdadeira localização e identidade.
- **Limitações:** A VPN em si pode ser um ponto de falha se o provedor for obrigado a entregar logs ou se estiver comprometido. Além disso, pode haver uma queda na velocidade de conexão.

### 4. **VPS (Virtual Private Server)**

- **O que é:** Um servidor virtual que você pode usar para navegar na web, enviar e-mails ou executar outras tarefas, escondendo a origem real do tráfego.
- **Como funciona:** Você pode configurar um VPS em um país diferente e usar isso como um intermediário para sua atividade na internet. Assim, seu tráfego parecerá vir do VPS.
- **Limitações:** Se o VPS não for configurado corretamente, pode vazar informações identificáveis. Além disso, o provedor de VPS pode registrar logs que comprometam seu anonimato.

### 5. **Proxychains**

- **O que é:** Uma ferramenta que permite encadear vários proxies (intermediários) para aumentar o anonimato.
- **Como funciona:** Ao usar Proxychains, seu tráfego passa por uma série de proxies antes de alcançar o destino final, mascarando ainda mais a origem do tráfego.
- **Limitações:** Cada proxy adicionado pode reduzir a velocidade da conexão e aumentar a latência. Além disso, se um dos proxies for comprometido, pode haver um vazamento de informações.

### 6. **Tor (The Onion Router)**

- **O que é:** Uma rede de anonimato que roteia o tráfego através de múltiplos nós voluntários, ocultando a origem e o destino do tráfego.
- **Como funciona:** Tor criptografa e retransmite seu tráfego através de vários nós na rede, dificultando a rastreabilidade.
- **Limitações:** Tor é conhecido por ser lento devido ao número de saltos entre os nós. Além disso, o nó de saída pode ser monitorado, e sites podem bloquear o tráfego proveniente da rede Tor.

### 7. **Outros Métodos de Anonimato**

- **Navegadores Focados em Privacidade:** Use navegadores como o Brave ou versões modificadas do Firefox, que priorizam a privacidade.
- **Redes Mesh:** Utilizar redes descentralizadas que não dependem de um ponto central de controle pode adicionar uma camada extra de anonimato.
- **Criptografia de Dados:** Use criptografia de ponta a ponta para proteger as comunicações, como em mensageiros seguros (Signal, por exemplo).
- **Sistemas Operacionais Seguros:** Usar sistemas operacionais focados em anonimato, como Tails ou Qubes OS, que não deixam rastros no hardware.

### **Rastreamento de Criminosos que Usam Essas Ferramentas**

Apesar do uso de múltiplas camadas de anonimato, existem formas de rastrear um criminoso:

- **Erros Humanos:** Mesmo o uso das melhores ferramentas pode ser comprometido por erros como login em contas pessoais ou uso de informações identificáveis.
- **Correlações de Tráfego:** Em alguns casos, é possível correlacionar o tráfego de entrada e saída de um serviço (como uma VPN ou Tor) para tentar identificar padrões.
- **Comprometimento de Provedores:** Se o provedor de VPN ou VPS mantiver logs, esses podem ser requisitados por autoridades.
- **Ataques de Engenharia Social:** Enganar a pessoa para revelar informações pode ser mais fácil do que quebrar a criptografia usada por essas ferramentas.
- **Monitoramento de Atividades Online:** Mesmo em redes seguras, as autoridades podem monitorar atividades suspeitas e correlacionar informações através de diferentes plataformas.

### **Conclusão**

O anonimato completo na internet é difícil de alcançar, e requer a combinação cuidadosa de múltiplas ferramentas e práticas seguras. Cada camada adicionada pode complicar o processo de rastreamento, mas nenhuma é infalível sozinha. Manter o anonimato requer constante vigilância e a capacidade de minimizar erros humanos, que são frequentemente o elo mais fraco.

```
& proxychains ping google.com // utiliza vários proxys encadeados intermediários
& nano /etc/proxychains4.conf // configura o tipo de proxy (proxy via rede tor por padrão)
& sudo apt install tor
& sudo service tor start
& sudo service tor status
& proxychains firefox ou & sudo -u <user> proxychains firefox

```

# Darkweb

On tor browser:
hidden.wiki
tor.link

# Zero day attacks

Bugtraq

Scam List
http://xsenvh7wqrup322bqinzycaalhxnnonowu33yvtw7eofrr37prtp4iyd.onion/veri

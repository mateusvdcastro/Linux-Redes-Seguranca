# Notes and studies about Linux, Network and Information Security

<a href="https://github.com/mateusvdcastro/Linux-Redes-Seguranca/edit/main/README.md#linux"> <ul><li> Linux </li></ul> </a>
<a href="https://github.com/mateusvdcastro/Linux-Redes-Seguranca/edit/main/README.md#como-ver-meu-ip-p%C3%BAblico-pelo-terminal"> <ul><li> Obter meu IP Público </li></ul> </a>

## Linux

> terminal: (o app do terminal executa um console, que roda um programa chamado shell do interpretador bash) <br>
> command options arguments    ex: type -t ls                    obs: no geral segue esta ordem, mas existem comandos que fogem a regra

- O comando Linux dpkg, trabalha em uma camada mais baixa do que os utilitários APT. O dpkg é na verdade é o responsável pelo gerenciamento de pacotes no LINUX em distribuições baseadas em Debian, como por exemplo Ubuntu e Kali Linux.

   ` $ man dpkg ` 

- Com o -k buscamos a palavra chave e buscamos diversas referências para a palavra chave.

   ` $ man -k printf `
- Ver todos os pacotes instalados
   
   ` $ dpkg --list  `
- Instala um pacote
   
   ` $ sudo dpkg -i nomedoarquivo.deb `
- Remove o pacote
   
   ` $ sudo dpkg -r nomedoarquivo.deb `
- Apaga o pacote e todos os arquivos relacionados
   
   ` $ sudo dpkg -P ou --purge `
- Para alterar a senha do super usuário
```
$ passwd 
```
- Instala um programa
```
$ sudo apt-get install nomedopacote
```
- Instala todas as dependências não resolvidas do nosso sources.list
```
$ sudo apt-get -f install               
```
- Lista os arquivos da pasta atual
```
$ ls           
```
- Lista com detalhes - teremos o conteúdo de dentro do diretório
```
$ ls -l          
```
- Mostra o help (-h) do ls, ou seja, obter ajuda para comandos externos (não builtin) normalmente utiliza-se a opção --help.
```
$ ls --help   
$ ls -h        
```
- Lista todos os arquivos inclusive os ocultos que iniciam com .
```
$ ls -a         
```
-  Executa o all e o type (-a e -l) juntos
```
$ ls -la       
```
### Como ver meu IP Público Pelo Terminal

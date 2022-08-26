<?php

   error_reporting(E_ALL); 
   ini_set('display_errors', '1');

   session_start(); // inicial a sessao
   #header("Content-type: image/jpeg"); // define o tipo do arquivo
   

    function captcha($largura, $altura, $tamanho_fonte, $quantidade_letras){
        
        $imagem = imagecreate($largura, $altura); // define a largura e a altura da imagem
        
        $fonte = "/var/www/html/bruteforce4/arial.ttf"; //voce deve ter essa ou outra fonte de sua preferencia em sua pasta
        
        $branco  = imagecolorallocate($imagem,255,255,255); // define a cor preta
        $preto = imagecolorallocate($imagem,0,0,0); // define a cor branca

	

        // define a palavra conforme a quantidade de letras definidas no parametro $quantidade_letras
        $palavra = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz23456789"), 0, ($quantidade_letras));
        $_SESSION["palavra"] = $palavra; // atribui para a sessao a palavra gerada
        
        for($i = 1; $i <= $quantidade_letras; $i++){
            imagettftext($imagem, $tamanho_fonte, 0, ($tamanho_fonte*$i + 4), ($tamanho_fonte + 10), $preto, $fonte, substr($palavra,($i-1),1));
            // atribui as letras a imagem
        }
        
        imagejpeg($imagem); // gera a imagem
        imagedestroy($imagem); // limpa a imagem da memoria
        
        $_SESSION["resultado"] = $palavra;
    }

    $largura = $_GET["l"]; // recebe a largura
    $altura = $_GET["a"]; // recebe a altura
    $tamanho_fonte = $_GET["tf"]; // recebe o tamanho da fonte
    $quantidade_letras = $_GET["ql"]; // recebe a quantidade de letras que o captcha terá
    
    captcha($largura,$altura,$tamanho_fonte,$quantidade_letras);
    // executa a funcao captcha passando os parametros recebidos
    
    
    
    
    
?>

<?php

// Start the session
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST"){

	$err = "Captcha incorreto";

	$userN = trim($_POST["username"]);
	$passW = trim($_POST["password"]);
	$captcha = trim($_POST["captcha"]);
	
	//echo $captcha." = ".$_SESSION["resultado"];
	
	if($captcha == $_SESSION["resultado"]){

		$userlist = file('users.txt');

		$success = false;
		

		foreach ($userlist as $user) {
		
		    $user_details = explode('|', $user);    
		    
		    if (trim($user_details[0]) == $userN) {
		    
		    	if (trim($user_details[1]) == $passW){
		    
				$success = true;
				
				$err = "";
				
				header("location: bemvindo.php");
				
				break;
			}
			
			$err = "Senha incorreta";
			
			break;
		    }
		    
		    $err = "Usuário inexistente";
		    
		}		
	}
	
}


?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>GoHacking Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>

<center>
    <div class="wrapper">
    
        <div class="form-group"><img src="https://cdn2.downdetector.com/static/uploads/c/300/666d7/download-2_xNf9njH.png" \></div>
        
        <br \>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
            <div class="form-group">
                <label>Usuário</label>
                <input type="text" name="username" class="form-control">
                <span class="invalid-feedback"></span>
            </div>    
            
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control">
                <span class="invalid-feedback"></span>
            </div> 
            
             <div class="form-group">
                <label><img src="captcha.php?l=150&a=50&tf=20&ql=5" \></label>
                <input type="text" name="captcha" class="form-control">
                <span class="invalid-feedback"></span>
            </div> 
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div>
            
            <p style="color:red" ><?php echo $err; ?></p>
            
            <br \>
            
            <p>Quer conhecer mais sobre os cursos?</p>
        </form>
    </div> 
</center>  
</body>
</html>
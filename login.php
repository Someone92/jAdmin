<?php 
$title = "Login | jAdmin";
include("include/header.php");

if(isset($_POST['action_login'])){
	$identification = $_POST['username'];
	$password = $_POST['password'];
	if($identification == "" || $password == ""){
		$msg = "Inloggning misslyckad. Vänligen försök igen.";
	}else{
		$login = \Fr\LS::login($identification, $password, isset($_POST['remember_me']));
		if($login === false){
			$msg = "Inloggning misslyckad. Vänligen försök igen.";
		}else if(is_array($login) && $login['status'] == "blocked"){
			$msg = "Too many login attempts. You can attempt login after ". $login['minutes'] ." minutes (". $login['seconds'] ." seconds)";
		}
	}
}
?>
<div id="login-container">
    <div id="login-form">
        <?php
        if(isset($msg)) {
            echo "<p>$msg</p>";
        }
        ?>
        <h1><span>jAdmin</span></h1>
        <form action="login.php" method="POST">
            <div class="name">
                <input type="name" name="username" placeholder="Användarnamn" required>
                <i class="fa fa-user fa-lg"></i>
                
            </div>
            
            <div class="password">
                <input type="password" name="password" placeholder="Lösenord" required>
                <i class="fa fa-lock fa-lg"></i>
            </div>
            
            <button type="submit" name="action_login">Login</button>
        </form>
    </div>
</div>
<?php include("include/footer.php"); ?>
<?php 
   session_start();
   include('../includes/db.php'); 
   include ('../includes/php_login_control/login_control_users.php');
   $nome_utente = $db->query("SELECT username FROM users WHERE user_id='$_SESSION[user_id]'");  
?>

<!DOCTYPE html>
<html>
    <head>
        <title>the website</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    </head>
    <body>
       	<p>
	     See player's panel for the implementation of the website
	</p>
        <header>
            <?php include ('../includes/php_menu/menu.php'); ?>
        </header>        
    </body>
</html>

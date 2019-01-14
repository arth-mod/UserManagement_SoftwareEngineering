<?php

    session_start();
    include('../includes/db.php');
    include ('../includes/php_login_control/login_control_admin.php');
    $nome_utente = $db->query("SELECT a_username FROM admin WHERE admin_id='$_SESSION[admin_id]'");  
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin page</title>
        <link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
    </head>
    <body>
        <p>
	    See admin's panel for the implementation
	</p>
        <header>
            <?php include ('../includes/php_menu/menu_admin.php'); ?>
        </header>       
    </body>    
</html>

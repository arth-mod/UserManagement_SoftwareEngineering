<?php
    session_start();
    
    if(isset($_POST['submit'])){
    
      $a_user = $_POST['a_user'];
      $a_pass = $_POST['a_pass'];
      
      include ('../includes/db.php');
      
      if (empty($a_user) || empty($a_pass)) {
      
          echo 'Insert all your data';
	  
      }else{
      
          $a_user = strip_tags($a_user);
          $a_user = $db->real_escape_string($a_user);
          $a_pass = strip_tags($a_pass);
          $a_pass = $db->real_escape_string($a_pass);
          $a_pass = md5 ($a_pass);          
          $query = $db->query("SELECT admin_id, a_username FROM admin WHERE a_username='$a_user' AND a_password='$a_pass'");
          if($query->num_rows ==1){
	  
              while($row = $query->fetch_object()){
	      
                  $_SESSION['admin_id'] = $row->admin_id;
		  
              }
	      
              header('Location: index.php');
              exit();
	      
          }else{
	  
              echo 'Wrong Information';
          }
      }
          
    }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login Admin</title>
        <link rel="stylesheet" type="text/css" href="../css/style_admin.css"/>
    </head>
        <div id="container">
            <form id="container_login" action="login.php" method="post" >
                <h3>Login:</h3><br/>
                <label>Insert your information.</label>
                <p>
                    <label>Username:</label>
                    <input type="text" placeholder="Insert your username" name="a_user"/><br/>
                </p>
                <p>
                    <label>Password:</label>
                    <input type="password" placeholder="Insert your password" name="a_pass"/><br/> 
                </p>
                <p>
                    <input type="submit" name="submit" value="Login">
                </p>
            </form>
        </div>
    </body>
</html>

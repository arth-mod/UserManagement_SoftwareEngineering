<?php
    session_start();
    
    if(isset($_POST['submit'])){
    
      $user = $_POST['user'];
      $pass = $_POST['pass'];
      include ('../includes/db.php'); 
      if (empty($user) || empty($pass)) {
      
          echo 'Insert your data';
	  
      }else{
      
          $user = strip_tags($user);
          $user = $db->real_escape_string($user);
          $pass = strip_tags($pass);
          $pass = $db->real_escape_string($pass);
          $pass = md5 ($pass);          
          $query = $db->query("SELECT user_id, username FROM users WHERE username='$user' AND password='$pass'");
          if($query->num_rows ==1){
	  
              while($row = $query->fetch_object()){
	      
                  $_SESSION['user_id'] = $row->user_id;
              }
	      
              header('Location: index_users.php');
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
    <title>Login Users</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
        <form id="container_login" action="login_users.php" method="post">
            <h3>Login:</h3><br/>
            <label>Insert your information.<br/> If you don't have an account, register <a href='registration_users.php'>here.</a></label>
            <p>
                <label>Username:</label>
                <input type="text" placeholder="Insert your username" required="required" pattern="\w*"  name="user"/><br/>
            </p>
            <p>
                <label>Password:</label>
                <input type="password" placeholder="Insert your password" required="required" pattern="\w*" name="pass"/><br/>
            </p>
            <p>
                <input type="submit" name="submit" value="Login">
            </p>
        </form>
</body>
</html>

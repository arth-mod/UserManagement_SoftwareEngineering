<?php 
    session_start();
    include('../includes/db.php');
    
    if (isset($_POST['submit'])){
    
            $nome =  $_POST['nome'];
            $cognome = $_POST['cognome'];
            $email =  $_POST['email'];
            $user = $_POST['user'];
            $pass = md5($_POST['pass']);
            $conf_pass = md5($_POST['conf_pass']);
            if ($nome && $cognome && $email && $user && $pass && $conf_pass){
    
            if ($pass == $conf_pass){
            
            $query = $db->query("INSERT INTO users (nome, cognome, email, username, password) VALUES ('$nome' , '$cognome' , '$email' , '$user' , '$pass') ")
                    or die ('Registration failed'. mysqli_error());
                    header('Location: login_users.php');
                    exit();    
                    echo "Registration successfull";
            }else{
                echo "Passwords don't match";
            }
   
        }else{
            echo "Fill all the fields and try again!!";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registrazione User</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    </head>             
                <form id="container_registration" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <h3>Register:</h3>
                    <label>Insert your information.<br/> If you have already an account, login <a href='login_users.php'>here.</a></label>
                    <label>Name:</label>
                    <input type="text" placeholder="Insert your name" required="required" pattern="[A-Za-z]*" name="nome"/><br/>
                    <label>Last name:</label>
                    <input type="text" placeholder="Insert your last name" required="required" pattern="[A-Za-z]*" name="cognome"/><br/>
                    <label>Email:</label>
                    <input type="email" placeholder="Insert your email"  required="required" name="email"/><br/>
                    <label>Username:</label>
                    <input type="text" placeholder="Insert your username"  required="required" pattern="\w{1,10}" name="user"
                           oninvalid="this.setCustomValidity('No more than 10 characters for the username')" oninput="setCustomValidity('')"/><br/>
                    <label>Password:</label>
                    <input type="password" placeholder="Insert your password"  required="required" pattern="\w{5,}" name="pass" 
                           oninvalid="this.setCustomValidity('At least 5 characters for the password')" oninput="setCustomValidity('')"/><br/>
                    <label>Repeat Password:</label>
                    <input type="password" placeholder="Confirm your password" required="required" pattern="\w{5,}" name="conf_pass"/><br/>
                    <input type="submit" name="submit" value="Register"/>
                </form>    
    </body>
</html>


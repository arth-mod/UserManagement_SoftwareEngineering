<?php
    include('../includes/db.php');
    ?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
            sfHover = function() {
                var sfEls = document.getElementById("nav").getElementsByTagName("LI");
                for (var i=0; i<sfEls.length; i++) {
                    sfEls[i].onmouseover=function() {
                        this.className+=" sfhover";
                    }
                    sfEls[i].onmouseout=function() {
                        this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
                    }
                }
            }
            if (window.attachEvent) window.attachEvent("onload", sfHover);
        </script>
	</head>
	<body>
        
        <nav id="menuContent">
            <ul>
                <li>
                    <a href="#" id="saluto"><?php
                    foreach ($nome_utente as $utente_online){
                    ?>
                    Welcome  <?= $utente_online["username"]?>!
                    <?php
                    }
                    ?></a>
                    </li>    
                    <li><a href="logout.php">Log Out</a> </li>
                        
                
                <li>
                    <a href="newpage.php">Profile player</a>
                </li> </ul>   
               
        </nav>
		
       </body>
       </html>
       
       
      
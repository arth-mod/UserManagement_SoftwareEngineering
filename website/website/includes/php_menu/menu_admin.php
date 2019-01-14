<?php
    include('../includes/db.php');
?>

<!DOCTYPE html>
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
        <nav id="menuContent">
            <ul>
                <li>
                    <a href="#" id="saluto"><?php
                    foreach ($nome_utente as $admin_online){
                    ?>
                    Welcome  <?= $admin_online["a_username"]?>!
                    <?php } ?>
                    </a>
                </li>
                <li>
		    <a href="logout.php">Log Out</a>
	        </li>
            </ul>
        </nav>
        
       
       
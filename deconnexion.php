<?php
   session_start();
   session_destroy();
   echo "Vous avez bien été déconnecté(e).";
   header('Location: index.php');
   // Faire SetInterval

?>

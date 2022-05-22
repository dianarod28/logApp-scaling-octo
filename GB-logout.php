<?php
     session_start();
     session_destroy();
     header('Location: GB-login.php');
?>
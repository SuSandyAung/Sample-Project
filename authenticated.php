<?php
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] == 'false') {
    echo "<div class='alert alert-success'>Please Login </div>";
    header('Location: login.php');
}
?>
<?php
$username = null;
$password = null;
if(empty($_SESSION['authenticated']))
{
      // echo "<div class='alert alert-success'>Please Login </div>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!empty($_POST["username"]) && !empty($_POST["password"])) 
    {

        include 'config/database.php';
        $con = mysqli_connect('localhost','root','','test') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM user WHERE UserName='" . $_POST["username"] . "' and Password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) 
        {

           session_start();
           $_SESSION["id"] = $row['id'];
           $_SESSION["name"] = $row['UserName'];
           $_SESSION["authenticated"] = 'true';
           header('Location: index.php');
        } else 
        {

             header('Location: login.php');  
             $message = "wrong name ";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
    } 
    else 
    {
        echo 'alert("Invalid username and password")';
        header('Location: login.php');
    }
} else 
{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="page">
    <section class = "container" id="content"> 
        <header id="banner">
        <hgroup>
            <h1 style="text-align: center;">Login</h1>
        </hgroup>        
       </header>
       




        <form id="login" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>
                          <label for="username">UserName:</label>
                    </td>
                    <td>
                         <input id="username" name="username" type="text" required>
                    </td>

                </tr>
                <tr>
                    <td>
                         <label for="password">Password:</label>
                    </td>
                    <td>
                         <input id="password" name="password" type="password" required>     
                    </td>

                </tr>
                <tr>
                    <td>
                    </td>

                    <td>
                          <input type="submit" value="Login">
                    </td>

                </tr>
               
            </table>
             
           
        </form>
    </section> 
  
</div>
      
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>


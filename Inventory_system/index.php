<?php
session_start();

if (isset($_SESSION['username']))
{
    if($_SESSION['privilege']==="admin")
    {
        header("Location: admin/index.php");
    }
    else
    {
        header("Location: user/borrowed.php");
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <script language="javascript" type="text/javascript">
      window.history.forward();
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System | Login</title>
    <link rel="stylesheet" href="style.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

</head>
<body class="bg-dark">
    <div class="login">
    <form class="form card justify-content-center" action="Login.php" method="POST">
        <div class="card_header">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30" height="30">
            <path fill="none" d="M0 0h24v24H0z"></path>
            <path fill="currentColor" d="M4 15h2v5h12V4H6v5H4V3a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6zm6-4V8l5 4-5 4v-3H2v-2h8z"></path>
            </svg>
            <h1 class="form_heading text-secondary">Sign in</h1>
        </div>
        <div class="field">
            <label for="username" class="text-secondary">Username</label>
            <input class="input" name="username" type="text" placeholder="Username" id="username" required>
        </div>
        <div class="field">
            <label for="password" class="text-secondary">Password</label>
            <input class="input" name="user_password" type="password" placeholder="Password" id="password" required>
        </div>
        <div class="footer p-2 text-center">
            <div class="row">
                <div class="col">
                    <input type="radio" id="admin" name="account" value="admin">ADMIN
                </div>
                <div class="col">
                    <input type="radio" id="employee" name="account" value="employee">EMPLOYEE
                </div>
            </div>
        </div>
        <div class="field">
            <button>Login</button>
        </div>  
    
    </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technology Store</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" >
  <script src="<?php echo BASE_URL; ?>public/js/popper.min.js"></script>
  <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js" ></script>

  <script src="https://kit.fontawesome.com/fb3aa5052d.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="container bg-light">
    <div class="row">
        <div class="col-md-4"><img src="<?php echo BASE_URL; ?>public/img/logo.jfif" alt="brand"></div>
        <div class="col-md-4"></div>
          
    </div>

</header>
<div class="container">
<form action="#" method=post>
<table>
<tr>
<td>Username</td><td><input type="text" name=inputUsername></td>
</tr>
<td>Password</td><td><input type="password" name=inputPassword></td>
</tr>
<tr>
<td colspan=2><input type="submit" name='login' value="Login"> <input type="Reset" value=Reset></td>
</tr>
</table>
</form>
</div>


   <footer class="container-fluid row bg-dark">
   @copyright 2021
    </footer>



</body>
</html>
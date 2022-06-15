<?php if(empty($_SESSION['name'])){ ?>
  <h1>Unauthorised Access</h1>
  <p>Click here to return <a href="index.php">Home</a></p>
  <p>Click here to <a href="login.php">Log In</a></p>
<?php exit;} ?>

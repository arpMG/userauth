<?php
  session_start();
  //Login Logic
  $error_message = "";
  if(isset($_POST['login'])){
    $email = filter_input(INPUT_POST, 'email');

    $dataFilePath = "data/";
    $file = new SplFileObject($dataFilePath."users.csv");
    $file->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY);

    $login_success = false;
    foreach($file as $user){
      if(empty($user)) break;
        if(strcasecmp($user[2], $email)==0 && password_verify($user[3], $_POST['password'])==0){
          $login_success = true;
          $_SESSION['name'] = $user[1] . " " . $user[0];
          break;
        }
    }
    if($login_success){
      $_SESSION['username'] = $email;
      header("location: private.php");
      exit;
    }else{
      $error_message = "Your username or password does not match";
    }
  }
?>
<?php $title = "Login"; ?>
<?php include('templates/head.php'); ?>

      <!-- Page specific code -->

      <h1>Log In</h1>
      <form method="post">
        <fieldset class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </fieldset>
        <fieldset class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </fieldset>
        <p class="error"><?php echo $error_message;?></p>
        <button type="submit" name="login" class="btn btn-primary">Submit</button>
      </form>

      <!-- End Page specific code -->
<?php include('templates/foot.php'); ?>

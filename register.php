<?php
//Registration logic
  $data = [];
  $error = "";
  if(isset($_GET['register'])){

    //collect and filter inputs
    $data['surname'] = filter_input(INPUT_GET, 'surname');
    $data['firstname'] = filter_input(INPUT_GET, 'firstname');
    $data['email'] = filter_input(INPUT_GET, 'email');

    //Open users table in append mode
    $dataFilePath = "data/";
    $file = new SplFileObject($dataFilePath."users.csv", 'a+');
    $file->setFlags(SplFileObject::READ_CSV|SplFileObject::SKIP_EMPTY);

    //does email already exist?
    foreach($file as $user){
        if(strcasecmp($user[2], $data['email'])==0){
          $error = "EXISTS";
          break;
        }
    }

    if(empty($error)){
      $data['password'] = password_hash($_GET['password'], PASSWORD_DEFAULT);
      $file->fputcsv($data);

      //log them straight in?
      //  header('location: index.php'); //or members area
      //  set session var
      //OR Take them to log in page?
      header('location: login.php');

    }

    //Close file
    $file = null;

  }
?>
<?php $title = "Register"; ?>
<?php include('templates/head.php'); ?>

        <!-- Page specific code -->

        <h1>Register</h1>
        <p>Be part of all the fun.</p>
        <form method="get" id="register_form">
          <fieldset class="form-group">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required
              <?php if(!empty($data['firstname'])){echo "value='".$data['firstname']."'";} ?> >
          </fieldset>
          <fieldset class="form-group">
            <label for="surname">Surname</label>
            <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" required
            <?php if(!empty($data['surname'])){echo "value='".$data['surname']."'";} ?> >
          </fieldset>
          <fieldset class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required
            <?php if(!empty($data['email'])){echo "value='".$data['email']."'";} ?> >
          </fieldset>
          <fieldset class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
          </fieldset>
          <fieldset class="form-group">
            <label for="password_confirm">Password</label>
            <input type="password" class="form-control" id="password_confirm" placeholder="Password Confirm" required>
          </fieldset>

          <?php if(strcmp($error, "EXISTS")==0){?>
            <p class="text-danger">A user with that email address already exists. <a href="login.php">Log In</a></p>
          <?php } ?>
          <!-- Note: If you have a password confirm field, you can check either on the client side or server (or both for BEST practice) -->
          <!-- <button type="submit" name="register" class="btn btn-primary">Submit</button> -->

          <!-- Note: if you use the button to run JS, create a hidden field with the name to check
            as the button will not be submitted -->
          <button type="button" onclick="check_passwords();" class="btn btn-primary">Submit</button>
          <input type="hidden" name="register">
        </form>

        <script>
        //Move this code into a app.js file, which you can link to in the footer files
          function check_passwords(){
            var pw1 = document.getElementById('password').value;
            var pw2 = document.getElementById('password_confirm').value;

            if(pw1 === pw2){
               document.getElementById('register_form').submit();
            }else{
              alert("Your passwords do not match");
            }
          }
        </script>

<!-- End Page specific code -->
<?php include('templates/foot.php'); ?>

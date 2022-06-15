<?php
include_once('classes/user.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create and Edit Your Profile</title>
    <?php
      $user = new User();
      if(isset($_GET['submit'])){

        $user->set_name($_GET['first'], $_GET['surname']);
        $user->set_dob($_GET['dob']);
      }

     ?>
  </head>
  <body>
    <h1>Profile Page</h1>
    <form>
      <label for="firstname">First name</label>
      <input type="text" name="first" required value="">
      <label for="surname">Surname</label>
      <input type="text" name="surname" required value="">
      <label for="dob">Date of Birth</label>
      <input type="date" name="dob" value="" required>
      <input type="submit" name="submit" value="Submit">
    </form>
    <pre>
<?php
print_r($user);
echo "Hi ".$user->get_full_name();
 ?>
    </pre>
  </body>
</html>

<?php $title = "Profile"; ?>
<?php include('templates/head.php'); ?>

<!-- Page specific code goes here -->
<?php include('auth.php'); ?>
<?php include_once('classes/user.php'); ?>
<?php
$user = new User();
if (isset($_GET['submit'])) {

  $user->set_name($_GET['first'], $_GET['surname']);
  $user->set_dob($_GET['dob']);
}

?>

<h1>Profile Page</h1>
<?php
print_r($user);
echo "Hi " . $user->get_full_name();
?>
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

      <!-- End Page specific code -->
<?php include('templates/foot.php'); ?>

    
  </head>
  <body>
    

    </pre>
</body>

</html>
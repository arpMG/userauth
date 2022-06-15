<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <a class="nav-item nav-link active" href="index.php">Home</a>
      <a class="nav-item nav-link " href="public.php">Public Page</a>
      <a class="nav-item nav-link " href="private.php">Private Page</a>
    </ul>
    <ul class="navbar-nav">
    <?php if(!empty($_SESSION['name'])){ ?>
        <a class="nav-item nav-link" href="logout.php">Sign Out</a>
        <span class="navbar-text">
          Logged in as <?php echo $_SESSION['name']; ?>
        </span>
    <?php  }else{ ?>
        <a class="nav-item nav-link" href="register.php">Register</a>
        <a class="nav-item nav-link" href="login.php">Log In</a>
    <?php }  ?>
    </ul>
  </div>
</nav>

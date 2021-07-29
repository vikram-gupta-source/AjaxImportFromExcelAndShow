<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <a class="navbar-brand" href="index.php">Creaa Design</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
     
      <ul class="nav navbar-nav navbar-right">
      <?php
if($_SESSION["name"]) {
    ?>
    <li><a href="home.php" >Upload Employee</a></li>
<li><a href="list_of_employee.php" >View Employee</a></li>
<li> <a href="logout.php" tite="Logout"> Welcome <?php echo $_SESSION["name"]; ?> Logout. </li></a>

    <?php
}else {
    header("Location:login.php");
    
}
?>
     </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
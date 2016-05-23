<?php 
include'cekLogin.php';
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-th-list" 

      <?php 
      
      if(!isset($_SESSION['username'])) {
      ?>
id="myBtn"
<?php 
}
else { $user_name = $_SESSION['username'];
?>
onclick="openNav()"
<?php
 }
 ?>
    ></span></a>
    </div>
    <ul class="nav navbar-nav">
      
      <li><a href="../"><?php 
      $lokasi=array("callCenter" => "CALL CENTER INFORMATION",
                    "input" => "INPUT TICKET SUPPORT",
                    "phoneBook" => "PHONE BOOK",
                    "record" => "DATA RECORD",
                    "memberBook" => "DATA MEMBER");
      echo strtr(basename (dirname($_SERVER['PHP_SELF']),"/"),$lokasi);?></a></li>  
    </ul> 
    <ul class="nav navbar-nav navbar-right">
      <!--<li><a href="#"><span class="glyphicon glyphicon-user">glyphicon glyphicon-th-list</span> Sign Up</a></li>-->
      <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
      <li><a href="#"><?php echo $full_name; ?></a></li>
      <li><a id="demo"></a></li>
    </ul>
  </div>
</nav>
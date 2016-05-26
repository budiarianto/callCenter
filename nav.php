<?php 
include'cekLogin.php';
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li><a class="navbar-brand" href="#"><span class="glyphicon glyphicon-th-list" 

        <?php 
        
          if($username==""):
            echo"id='myBtn'";
          else:
            echo "onclick='openNav()'";
          endif;

         ?>
                                            ></span></a></li>
        <li><a class="navbar-brand"  href="../" title="Dashboard"><span  class="glyphicon glyphicon-dashboard"></span></a></li> 
        <li><a class="navbar-brand"  href="#" title="Menu"><?php 
        $lokasi=array("callCenter" => "CALL CENTER INFORMATION",
                      "input" => "INPUT TICKET SUPPORT",
                      "phoneBook" => "PHONE BOOK",
                      "record" => "DATA RECORD",
                      "memberBook" => "DATA MEMBER",
                      "settings"=>"SETTINGS");
        echo strtr(basename (dirname($_SERVER['PHP_SELF']),"/"),$lokasi);?></a></li>  
      </ul>                                      
    </div>
    <div class="collapse navbar-collapse" >
      <ul class="nav navbar-nav">
        
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <!--<li><a href="#"><span class="glyphicon glyphicon-user">glyphicon glyphicon-th-list</span> Sign Up</a></li>-->
        <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
        <li><a href="#"><?php echo $full_name; ?></a></li>
        <li><a id="demo"></a></li>
      </ul>
    </div>  
  </div>
</nav>
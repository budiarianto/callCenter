<!DOCTYPE html>
<html>
<head>
<title>Call Center</title>
<meta http-equiv="refresh" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
/* modal login */
.modal-header, h4, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 30px;
}
.modal-footer {
    background-color: #f9f9f9;
}  


.sidenav {
height: 100%;
width: 0;
position: fixed;
z-index: 1;
top: 0;
left: 0;
background-color: #111;
overflow-x: hidden;
transition: 0.5s;
padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<div id="main" class="container-fluid">
  <?php
  include '../sidenav.php';
  ?>
  <div class='w3-container top'>
    <?php
    include '../cekLogin.php';
    include '../nav.php';
    
    ?>
  </div>
</div>
<form class="form-horizontal" role="form" method="POST" action="prosesAdd.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="member_name">Nama:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="member_name" name="member_name" value="" required="true" placeholder="Nama Lengkap">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
    <div class="col-sm-5"> 
      <input type="number" class="form-control" id="phone_number" name="phone_number" value="" required="true" placeholder="Phone Number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Alamat:</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="5" id="address" name="address"  required="true" placeholder="Alamat"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" name="email" value=""  required="true" placeholder="Email@email.com">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Group:</label>
    <div class="col-sm-4">
      <select class="form-control" name="pb_group_id">
        <?php
        $qgroup=mysql_query("select * from phone_book_group where is_active=1");
        while ($rowgroup = mysql_fetch_assoc($qgroup)) {
        ?>
        <option value="<?php echo $rowgroup['pb_group_id']; ?>"><?php echo $rowgroup['pb_group_title']; ?></option>
        <?php 
          }
        ?>  
      </select>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Simpan</button>
    </div>
  </div>
</form> 
<script>
//==== jam
var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
    }
//===== sidenav
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}

//===== login
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });

    $("#myBtnPhone").click(function(){
         $("#myModalPhonebook").modal();
    });
});


</script>
</body>
</html>
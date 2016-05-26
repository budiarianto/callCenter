<!DOCTYPE html>
<html>
<head>
<title>Call Center</title>
<meta http-equiv="refresh" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/callCenter/bootstrap/css/bootstrap.min.css">

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
  session_start();
  include '../sidenav.php';
  ?>
  <div class='w3-container top'>
    <?php
    include '../cekLogin.php';
    include '../nav.php';
    include '../koneksi.php';
    ?>
  </div>
</div>
<form id="myForm" class="form-horizontal" role="form" method="POST" action="addNumber.php">
<input type="hidden" name="usergroup" id="usergroup" value="<?php echo $_SESSION['usergroup']; ?>"/>
  <div class="form-group">
    <label class="control-label col-sm-2" for="member_name">Nama:</label>
    <div class="col-sm-1">
      <select class="form-control" id="title" name="title">
        <?php if($_SESSION['title']!=""): ?>
        <option value="<?php echo $_SESSION['title']; ?>"><?php echo $_SESSION['title']; ?></option>
        <?php endif; ?>
        <option value="Mr.">Mr.</option>
        <option value="Ms.">Mrs.</option>
      </select>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="member_name"  name="member_name" required="true"  value="<?php echo $_SESSION['membername']; ?>"/>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Alamat:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="address" name="address"  required="true" placeholder="Alamat" value="<?php echo $_SESSION['address']; ?>" />
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>"  required="true" placeholder="Email@email.com">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" >Group:</label>
    <div class="col-sm-2">
      <select class="form-control" name="pb_group_id" id="pb_group_id">
        <option value="<?php echo $_SESSION['pb_group_id']; ?>"><?php echo $_SESSION['pb_group_id']; ?></option>
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
    <label class="control-label col-sm-2" for="phone_number">Phone Number:</label>
        <div id="dynamicInput">
          <div class="form-inline col-sm-10">
            <input class="form-control" type="number" name="phoneNumber" id="phoneNumber">
            <select name="tipePhone" id="tipePhone" class="form-control">
                <option value="Seluler">Seluler</option>
                <option value="Kantor">Kantor</option>
                <option value="Rumah">Rumah</option>
                <option value="Utama">Utama</option>
                <option value="Faks Kantor">Faks Kantor</option>
                <option value="Faks Rumah">Faks Rumah</option>
                <option value="Lainnya">Lainnya</option>
                <option value="Khusus">Khusus</option>
            </select>
            &nbsp;
            <a href="#" onclick="tambah();" ><span class="glyphicon glyphicon-plus"></span></a>
            <?php
                $usergroup=$_SESSION['usergroup'];
                $qnumber=mysql_query("SELECT * FROM phone_book where extra_fld1='$usergroup'");
                while($row = mysql_fetch_assoc($qnumber)){ 
            ?>
            <br>
            <input class="form-control" type="number" name="phoneNumber" id="phoneNumber" value="<?php echo $row['phone_number']; ?>">
            <select name="tipePhone" id="tipePhone" class="form-control">
                <option value="<?php echo $row['extra_fld3']; ?>"><?php echo $row['extra_fld3']; ?></option>
                <option value="Seluler">Seluler</option>
                <option value="Kantor">Kantor</option>
                <option value="Rumah">Rumah</option>
                <option value="Utama">Utama</option>
                <option value="Faks Kantor">Faks Kantor</option>
                <option value="Faks Rumah">Faks Rumah</option>
                <option value="Lainnya">Lainnya</option>
                <option value="Khusus">Khusus</option>
            </select>
            <?php
                } 
            ?>
          </div>
        </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="submit" />  
    </div>
  </div>
</form>
<div id="status"><b></b></div>

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

//=====
function tambah(){
    
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "addNumber.php";
    var title = document.getElementById("title").value;
    var membername = document.getElementById("member_name").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var pb_group_id = document.getElementById("pb_group_id").value;
    var phoneNumber = document.getElementById("phoneNumber").value;
    var tipePhone = document.getElementById("tipePhone").value;
    var usergroup = document.getElementById("usergroup").value;
    
    var vars = "title="+title+"&membername="+membername+"&address="+address+"&email="+email+"&pb_group_id="+pb_group_id+"&phoneNumber="+phoneNumber+"&tipePhone="+tipePhone+"&usergroup="+usergroup;
    hr.open("POST", url, true);
    // Set content type header information for sending url encoded variables in the request
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
    location.reload();
}
</script>
</body>
</html>


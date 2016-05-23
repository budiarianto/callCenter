
<!DOCTYPE html>
<html>
<head>
<title>Call Center</title>
<meta http-equiv="refresh" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

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
/* SIDE NAV */
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
<body >
<div id="main" class="container-fluid">
  <?php
  include '../sidenav.php';
  ?>
  <div class='w3-container top'>
    <?php
    include '../nav.php';
    ?>
  </div>
  <?php
    include '../login.php';
    
    ?>
 
  <h2></h2>
  <?php
  $id=$_GET['id'];
  $qedit=mysql_query("select * from ticket_support where result_id='$id'");
  $row = mysql_fetch_assoc($qedit);
  ?>
  <div class="container">
      <form class="form-horizontal" role="form" method="post" action="prosesEdit.php">
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Waktu :</label>
          <div class="col-sm-3">
             <div class='input-group date' id='datetimepicker1'>
                <input type='text' class="form-control" name="datetime"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Penelepon :</label>
          <div class="col-sm-5">
             <input type="text" class="form-control" id="penelepon" name="penelepon" placeholder="Isi data penelepon ..." required="true" value="<?php echo $row['penelepon']; ?>">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">No Telpon / HP :</label>
          <div class="col-sm-5">
             <input type="number" class="form-control" id="notlp" name="notlp" placeholder="No Telpon / HP ..." required="true"  value="<?php echo $row['notlp']; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Perusahaan :</label>
          <div class="col-sm-5">
             <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Perusahaan ..." required="true"  value="<?php echo $row['perusahaan']; ?>" >
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Keperluan :</label>
          <div class="col-sm-10">
             <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan ..." required="true"  value="<?php echo $row['keperluan']; ?>" >
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Status :</label>
          <div class="col-sm-3">
            <select class="form-control" id="status" name="status">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Tujuan Penerima :</label>
          <div class="col-sm-5 ">
            <div class="input-group">
               <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Tujuan Penerima ..." required="true"  value="<?php echo $row['penerima']; ?>" >
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-search"></span>
                  </span>
            </div>      
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">User :</label>
          <div class="col-sm-3">
             <input type="text" class="form-control" id="user" name="user" readonly="true"  value="<?php echo $row['user']; ?>">
          </div>
        </div>

        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-2 success">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          <div class="col-sm-offset-2 col-sm-2">
            <a href="/callCenter/record/" class="btn btn-warning">Cancel</a>
          </div>  
        </div>
          <input type="hidden" name="updateBy" value="<?php echo $emp_code; ?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
      </form>
  </div>
</div>
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
});

//====  

  $(function () {
      $('#datetimepicker1').datetimepicker({defaultDate: "<?php echo $row['createDate']; ?>"});
  });
</script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

</body>
</html>
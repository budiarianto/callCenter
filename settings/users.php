
<!DOCTYPE html>
<html>
<head>
<title>Call Center</title>
<meta http-equiv="refresh" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="/callCenter/bootstrap/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="bootstrap.min.js"></script>

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
		include '../cekLogin.php';
		
		?>
	
	<ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="#">Users</a></li>
	  <li role="presentation"><a href="engid.php">PC Call</a></li>
	  <li role="presentation"><a href="#">Messages</a></li>
	</ul>
	&nbsp;
	<table class="table table-bordered">
		<thead>
			<tr>
				<td>No.</td>
				<td>User</td>
				<td>Full Name</td>
				<td>PC ID</td>
				<td>Eng ID</td>
				<td>Last Login</td>
			</tr>
		</thead>
		<tbody>
		<?php
		
		$no=1;
		$quser=mysql_query("select * from tuser");
		while ( $row = mysql_fetch_assoc($quser)) {
			$is_login=$row['is_login'];
		?>
			<tr 
				<?php
					if($is_login==1):
						echo"class='success'";
					endif;
				?>
				>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['emp_code']; ?></td>
				<td><?php echo $row['full_name']; ?></td>
				<td><?php echo $row['is_pc']; ?></td>
				<td><?php echo $row['eng_id']; ?></td>
				<td><?php echo $row['last_login']; ?></td>
			</tr>
		<?php	
		$no++;
		}
		?>
			
		</tbody>
	</table>
    
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

</script>
</body>
</html>
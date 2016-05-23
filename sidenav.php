<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#"><?php
  	session_start();
  	echo $_SESSION['username'];?></a>
  <a href="/callCenter/input">Input</a>
  <a href="/callCenter/record/">Data Record</a>		
  <a href="/callCenter/phoneBook">Phone Book</a>
  <a href="/callCenter/memberBook">Data Customer</a>
  <a href="#">Setting</a>		
  
  <a href="/callCenter/logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a>			
</div>

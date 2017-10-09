<?php
	include ( "check_login.php" );
            include ( "header.php" );
?>

<div id="mySidenav" class="sidenav" style="font-family: Lato, sans-serif;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="menu.php">Menu</a>
  <a href="AddLabs.php">Labs</a>
  <a href="registerRequests.php">Register Requests</a>
  <a href="../">Home Page</a>
</div>
<p>Click on the element below to open the side navigation menu.</p>
<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

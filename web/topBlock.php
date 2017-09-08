<?php
if(isset($_SESSION["status"])){
	if($_SESSION["status"] == 0 || $_SESSION["status"] == 10 || $_SESSION["status"] == 20){
		include "formConnect.php";
	} elseif ($_SESSION["status"] == 1){
		include "userConnected.php";
	}
}
?>
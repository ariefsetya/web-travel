<?php

	if(isset($_GET['m'])){
		$modul = $_GET['m'];
		if(isset($_GET['p'])){
			$page = $_GET['p'];
			if(file_exists("tampilan/".$modul."/".$page.".php")){
				include "tampilan/".$modul."/".$page.".php";
			}else{
				include 'tampilan/error/404.php';
			}
		}else{

			if(file_exists("tampilan/".$modul."/data.php")){
				include "tampilan/".$modul."/data.php";
			}else{
				include 'tampilan/error/404.php';
			}
		}
	}else{
		include 'dashboard.php';
	}
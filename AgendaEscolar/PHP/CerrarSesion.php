<?php
	session_start([
    	'cookie_lifetime' => 86400,
    	'gc_maxlifetime' => 86400,
	]);
	session_destroy();
	echo "<script> location.href='../' </script>";
?>
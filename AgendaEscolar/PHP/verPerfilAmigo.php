<?php
  session_start([
      'cookie_lifetime' => 86400,
      'gc_maxlifetime' => 86400,
  ]);

  $user=$_POST['postuserAmigo'];

  $_SESSION['amigo'] = $user;

?>
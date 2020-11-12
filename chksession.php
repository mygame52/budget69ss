<?php session_start();
// Files Name : chksession.php

if ($sess_id <> session_id() or $user_ == " " ) {
	header("Location : login.html");
	exit();
} 
?>
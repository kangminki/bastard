<?php

session_start();

if($_SESSION['authcate']) {
	unset($_SESSION['authcate']);
}

header("Location: http://{$_SERVER['SERVER_NAME']}/");
die();

?>
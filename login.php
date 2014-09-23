<?php

session_start();

if(array_key_exists('authcate', $_POST)) {
	$_SESSION['authcate'] = $_POST['authcate'];
} else {
}

header("Location: http://{$_SERVER['SERVER_NAME']}/");
die();
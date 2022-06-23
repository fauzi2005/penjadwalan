<?php
require "../config/functions.php";

session_destroy();

$url = BASE_URL . 'login/';

header("Location: $url");	
?>
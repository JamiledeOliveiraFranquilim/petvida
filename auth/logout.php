<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: /petvida/index.php');
exit;

<?php
session_start();
//cara cara menghapus session
$_SESSION = [];
session_unset();
session_destroy();

//menghapus cookie
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);

//link ke halaman login
header("Location: login.php");
exit;

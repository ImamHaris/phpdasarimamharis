<?php
session_start();
//cara cara menghapus session
$_SESSION = [];
session_unset();
session_destroy();

//link ke halaman login
header("Location: login.php");
exit;

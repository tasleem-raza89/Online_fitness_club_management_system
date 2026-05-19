<?php
session_start();
session_destroy(); // Logout karega
header("Location: index.php"); // Homepage par wapas bhej dega
exit();
?>

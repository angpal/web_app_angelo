<?php
session_start();
session_unset();
session_destroy();
echo "Goodbye";
header("location:../pages/contact.php");
?>
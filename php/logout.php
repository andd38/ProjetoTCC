<?php 
session_start();
session_unset();
session_destroy();

print("<script> location.href='../php/login.php?status=logout';</script>");
?>
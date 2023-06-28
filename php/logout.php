<?php 
session_start();
session_unset();
session_destroy();

print("<script> location.href='../html/login.html'; </script>");
?>
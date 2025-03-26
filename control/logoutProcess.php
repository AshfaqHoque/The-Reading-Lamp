<?php
session_start();
session_destroy();
header("refresh: 0.2; url = ../view/index.php");
?>
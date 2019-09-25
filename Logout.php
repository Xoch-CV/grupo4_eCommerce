<?php
session_start();

require "functions.php";

setcookie(COOKIE_REMEMBER, "", -1);

session_destroy();

header('location:index.php');

<?php
require_once 'config.php';

session_start();

session_destroy();

unset($_SESSION['level']); 
unset($_SESSION['username']); 
unset($_SESSION['status']); 

header('location: login.php?message=logout_success');
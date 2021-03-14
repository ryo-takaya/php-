<?php

session_start();
$_SESSION['num']++;
echo $_SESSION['num'];
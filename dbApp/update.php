<?php
  require_once '../functions.php';


  try{
      dbOpen();

  } catch (PDOException $e) {
      $e->getMessage();
  }


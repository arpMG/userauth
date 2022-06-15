<?php
if (session_status() !== PHP_SESSION_ACTIVE)
{
  session_start();
}

//Global Vars
if(!isset($_SESSION['username'])){
  $_SESSION['usernname'] = '';
}

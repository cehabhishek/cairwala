<?php 
error_reporting(0);
session_start();
$aa=rand(10000000,999999999);
$ab=md5($aa);
$ac=substr($ab,0,8);
$ad=strtoupper($ac);
$ad;
if(!isset($_SESSION["SystemID"]))
{
 	$_SESSION["SystemID"]=$ad;
} 

?>
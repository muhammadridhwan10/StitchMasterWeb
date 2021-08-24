<?php 
date_default_timezone_set("Asia/Bangkok");
$baseUrl= "http://".$_SERVER['HTTP_HOST']."/stich/";
$mysqli = new mysqli("localhost","root","","stichind_app_stich");
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
 ?>
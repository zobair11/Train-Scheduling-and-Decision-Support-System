<?php date_default_timezone_set('Asia/Dhaka');
include"conn.php";
$timez=Date('H:i');
$q1=$_GET['q1'];
$q2=$_GET['q2'];
echo $str="INSERT INTO `real_time_pos`( `train_id`,`lat`,`lon`,`station_location`,`timez`,`waiting_time`) VALUES ('00','$q1','$q2','CUET','$timez','00')";
mysql_query($str);


?>
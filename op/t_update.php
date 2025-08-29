<?php
include "../login/condb.php";


    $id = $_POST['e_id'];
    $room = $_POST['room'];
    $tdate = $_POST['tdate'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];


$sql = "
        UPDATE exam SET room = '$room',
            tdate = '$tdate',
            starttime = '$starttime',
            endtime = '$endtime'

            WHERE e_id = $id
	";

$result = mysqli_query($conn,$sql);
if($result){
    echo '<script>alert("บันทึกข้อมูลการสอบ")</script>'; 
    echo"<script>window.location = 'test.php';</script>";    
}else{
    echo '<script>alert("ไม่สามารถบันทึกข้อมูลการสอบได้")</script>'; 
}
mysqli_close($conn); //closeDB
?>


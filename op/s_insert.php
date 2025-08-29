<?php
include "../login/condb.php";


    $sname = $_POST['sname'];
    $sid = $_POST['subid'];
    $depart = $_POST['department'];
    $semes = $_POST['semester'];
    $years = $_POST['years'];
    $u_id = $_POST['u_id'];

//$sql = "INSERT INTO student(title,fname,lname,grade,school) VALUES('$s_title',"$f_name","$l_name","$s_grade","$s_school")";
$sql = "
    INSERT INTO subject
	VALUES ('','$sname','$sid','$depart','$semes','$years','$u_id')
	";

$result = mysqli_query($conn,$sql);
if($result){
    echo '<script>alert("บันทึกข้อมูลรายวิชาแล้วคัฟฟ")</script>'; 
    echo"<script>window.location = 'op_home.php';</script>";    
}else{
    echo '<script>alert("ไม่สามารถบันทึกข้อมูลข้อมูลรายวิชาได้")</script>'; 
}
mysqli_close($conn); //closeDB
?>


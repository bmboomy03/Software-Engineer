<?php
include "../login/condb.php";

$id = $_GET['s_id'];
$sql = "DELETE FROM subject WHERE s_id = '$id' ";
    if(mysqli_query($conn,$sql)){
        echo '<script>alert("ลบข้อมูลรายวิชาเรียบร้อย")</script>'; 
        echo '<script>window.location = "op_home.php";</script>';    
    }else{
        echo"Error : " . $sql ."<br>" . mysqli_error($conn);
        echo '<script>alert("ไม่สามารถลบข้อมูลรายวิชาได้")</script>'; 
    }
mysqli_close($conn); //closeDB
?>

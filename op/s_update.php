<?php
    include "../login/condb.php";

    $id = $_POST['s_id'];
    $sname = $_POST['sname'];
    $sid = $_POST['subid'];
    $depart = $_POST['department'];
    $semes = $_POST['semester'];
    $years = $_POST['years'];
    //$u_id = $_POST['u_id'];
    

    
    $sql = "
            UPDATE subject SET sname = '$sname',
            subid = '$sid',
            department = '$depart',
            semester = '$semes',
            years = '$years'

            WHERE s_id = $id
             " ;
            

    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<script>alert("แก้ไขข้อมูลรายวิชาแล้ว")</script>'; 
        echo"<script>window.location = 'op_home.php';</script>";    
    }else{
        echo '<script>alert("ไม่สามารถแก้ไขข้อมูลได้")</script>'; 
    }
    mysqli_close($conn); //closeDB
?>


        

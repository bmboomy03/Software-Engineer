<?php
include "../login/condb.php";

// ตรวจสอบการส่งข้อมูลจากฟอร์ม
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sid = $_POST['s_id'];
    $uid = $_POST['u_id'];
    $sect = $_POST['section'];
    $num = $_POST['numstd'];
    $stime = $_POST['starttime'];
    $etime = $_POST['endtime'];
    $pg = $_POST['pageprint'];
    $ans = $_POST['answer'];
    $comm = $_POST['comment'];
    $file = $_FILES['efile'];

    if ($file['type'] !== 'application/pdf') {
        echo '<script>alert("กรุณาอัพโหลดไฟล์ PDF เท่านั้น");</script>';
        exit;
    }

 
     // ย้ายไฟล์ไปยังโฟลเดอร์ที่ต้องการ
     $target_dir = "../docs/";
     $target_file = $target_dir . basename($file["name"]);
     
 
     if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $stat = 'อัพโหลดไฟล์ข้อสอบ';
        // บันทึกข้อมูลลงในฐานข้อมูล
        $sql = "
        INSERT INTO exam (section, numstd, starttime,endtime, pageprint, answer, efile,estatus,comment,s_id,u_id) 
                    VALUES ('$sect','$num','$stime','$etime','$pg','$ans','$target_file','$stat','$comm','$sid','$uid')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("บันทึกข้อมูลเรียบร้อยแล้ว");</script>'; 
            echo "<script>window.location = 'pf_home.php';</script>";    
        } else {
            '<script>alert("ไม่สามารถบันทึกข้อมูลข้อมูลรายวิชาได้: ' . $conn->error . '")</script>'; 
        }
    } else {
        echo "เกิดข้อผิดพลาดในการอัพโหลดไฟล์";
    }
}
    
              
mysqli_close($conn); // ปิดการเชื่อมต่อ
?>


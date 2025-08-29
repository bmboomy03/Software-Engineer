<?php
    include "../login/condb.php";

    $id = $_POST['u_id'];
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addr = $_POST['addr'];
    //$image = $_POST['img_name'];
    
    /* if(is_uploaded_file($_FILES['t_pic']['tmp_name']) ){
        $new_image_name = 't_'.uniqid().".".pathinfo(basename($_FILES['t_pic']['name']),PATHINFO_EXTENSION);
        $image_upload_path= "./img/tch/".$new_image_name;
        move_uploaded_file($_FILES['t_pic']['tmp_name'],$image_upload_path);
    }else {
        $new_image_name = "$image";
    } */

    
    $sql = "
            UPDATE users SET fname = '$f_name',
            lname = '$l_name',
            email = '$email',
            phone = '$phone',
            addr = '$addr'

            WHERE u_id = $id
             " ;
            

    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<script>alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>'; 
        echo"<script>window.location = 'profile.php';</script>";    
    }else{
        echo '<script>alert("ไม่สามารถแก้ไขข้อมูลได้")</script>'; 
    }
    mysqli_close($conn); //closeDB
?>


        

<?php
    include "../login/condb.php";

    $id = $_POST['u_id'];
    $type = $_POST['utype'];
    //$image = $_POST['img_name'];
    
    /* if(is_uploaded_file($_FILES['t_pic']['tmp_name']) ){
        $new_image_name = 't_'.uniqid().".".pathinfo(basename($_FILES['t_pic']['name']),PATHINFO_EXTENSION);
        $image_upload_path= "./img/tch/".$new_image_name;
        move_uploaded_file($_FILES['t_pic']['tmp_name'],$image_upload_path);
    }else {
        $new_image_name = "$image";
    } */
    
    $sql = "
            UPDATE users SET utype = '$type'
        
            WHERE u_id = $id
             " ;
            
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<script>alert("แก้ไขข้อมูลเรียบร้อยแล้ว")</script>'; 
        echo"<script>window.location = 'a_home.php';</script>";    
    }else{
        echo '<script>alert("ไม่สามารถแก้ไขข้อมูลได้")</script>'; 
    }
    mysqli_close($conn); //closeDB
?>


        

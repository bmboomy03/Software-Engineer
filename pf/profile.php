<?php 
session_start();
if (!isset($_SESSION["type"])){  //check session
	  Header("Location: ../login/condb.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{ 
    include "../login/condb.php";
    $id = $_SESSION["uid"];
    $type = $_SESSION["type"];
    $sql = "SELECT * FROM users WHERE u_id = '$id'";
    $result = mysqli_query($conn,$sql);
        
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<section class="section">
            <div class = "container - " >
            <div class = "row">
                <div class="col ">
                <div class="h4 text-center alert alert-warning mb-5 mt-5" role="alert">ข้อมูลอาจารย์</div>
                <?php
                
                    /* $sql = "SELECT * FROM users WHERE u_id = '$id' ";
                    $result = mysqli_query($conn,$sql); */
                    while($row = mysqli_fetch_array($result)){
                ?>
                <!-- <div class = "row">
                    <div class="col-md-6 mb-3">
                <img src="img/tch/<?=$row['t_pic']?>"class="rounded mx-auto d-block" 
                alt="<?=$row['t_id']?>image" style="width:128px" align=left hspace="10" vspace="10">
                    </div>
                </div>     -->
                <div class = "row">
                    <div class="col-md- mb-">
                    <b><p class="fst-italic" class="fs-4"><?=$type?></p></b>
                    <label>ชื่อ - สกุล: <?=$row['fname']?>  <?=$row['lname']?></label><br>
                    <label >อีเมล: <?=$row['email']?> </label><br>
                    <label >เบอร์โทรศัพท์: <?=$row['phone']?> </label><br>
                    <label >ห้อง: <?=$row['addr']?> </label><br><br>
                    </div>
                </div>
                
                    <?php
                    }
                    mysqli_close($conn); //closeDB
                    ?>
                <div class = "row">
                    <div class="col-md-6 mb-3">
                    <a href = "p_edit.php" class ="btn btn-success"> แก้ไข </a>
                </div>
            </div>
            </section>
            
</div>
</body>
</html>

<?php } ?>
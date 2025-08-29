<?php 
session_start();
if (!isset($_SESSION["uid"])){  //check session
	  Header("Location: ../login/login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{ 
    include "../login/condb.php";
    $id = $_SESSION["uid"];
        
        $sql = "SELECT * FROM users WHERE u_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
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
    
<section>
<div class = "container">
<div class = "row">
    <div class="col">
    <div class="h4 text-center alert alert-warning mb-5 mt-5" role="alert">แก้ไขข้อมูลครูอาสา</div>    
    <form method = "POST" action = "p_update.php" enctype = "multipart/form-data">
    <!-- <div class = "row"> 
        <div class="col-md-6 mb-3">   
        <img src="img/tch/<?=$row["t_pic"]?>"class="rounded mx-auto d-block" 
        alt="<?=$row["t_id"]?>image" style="width:128px;height:128px;">
        </div>  
    </div>
    <div class = "row"> 
        <div class="col-md-6 mb-3">    
            <label>Upload image</label>
            <input type="file" class="form-control" name="t_pic" >
            <input type="hidden" class="form-control" name="img_name" value = <?=$row['t_pic']?>>
        </div> -->
        <!-- <div class="col-md-6 mb-3">
            <label>รหัสประจำตัว:</label>
            <input class="form-control" name="t_id" readonly value = <?=$row['t_id']?>>
        </div>  
    </div> -->
    <input type="hidden" name="u_id" value=<?=$row['u_id']?>>
    <div class = "row">
        <div class="col-md-6 mb-3">
            <label for="fname">ชื่อ:</label>
            <input class="form-control" type ="text" name="fname" value = <?=$row['fname']?> >
        </div>
        <div class="col-md-6 mb-3">
            <label for="lname">นามสกุล:</label>
            <input class="form-control" type ="text" name="lname" value = <?=$row['lname']?>>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
            <label for="email">อีเมล:</label>
            <input class="form-control" type ="email" name="email" value = <?=$row['email']?>>
        </div>
        <div class="col-md-6 mb-3">
            <label for="phone">เบอร์โทรศัพท์:</label>
            <input class="form-control" type="tel" name="phone" value = <?=$row['phone']?>>
        </div>
        <div class="col-md-6 mb-3">
            <label for="addr">ห้อง:</label>
            <input class="form-control" type="text" name="addr" value = <?=$row['addr']?>>
        </div>
    </div>
            <div align="right">
                <input type="submit" value="บันทึก" class ="btn btn-success" align = right >
                <a href = "profile.php" class ="btn btn-danger" align = right> ยกเลิก </a>
            </div>
        </form>
    </div>
</div>
    
</section>
</body>
</html>
<?php } ?>
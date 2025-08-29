<?php
    include "../login/condb.php";
        $id = $_GET['s_id'];
        $sql = "SELECT * FROM subject WHERE s_id = '$id' ";
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
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<section>
<div class = "container">
<div class = "row">
    <div class="col ">
    <div class="h4 text-center alert alert-warning mb-5 mt-5" role="alert">แก้ไขข้อมูลรายวิชา</div>
    <form method = "POST" action = "s_update.php">
        <input type="hidden" name="s_id" value=<?=$row['s_id']?>>
    <div class = "row">
        <div class="col-md-5 mb-3">
            <label for="subid">รหัสวิชา</label>
            <!--<input class="form-control" type="text" name="s_id" value =  >-->
            <input class="form-control" type="text" name="subid" value = <?=$row['subid']?> >
        </div>
        <div class="col-md-6 mb-3">
            <label for="sname">ชื่อรายวิชา</label>
            <input class="form-control" type="text" name="sname" value = <?=$row['sname']?> >
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
            <label>คณะ</label>
            <input class="form-control" type="text" value = "วิทยาศาสตร์" readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="department">สาขา</label>
            <select name="department" class="form-select" >
            <option value = <?=$row['department']?>> <?=$row['department']?> </option>
            <option value="Biology">Biology</option>
            <option value="Microbiology">Microbiology</option>
            <option value="Computer Science">Computer Science</option>
            </select>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
            <label for="semester"> เทอม </label>
            <select name="semester" class="form-select" >
            <option value = <?=$row['semester']?>> <?=$row['semester']?> </option>
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="years">ปีการศึกษา</label>
            <input class="form-control" type="int" name="years" value = <?=$row['years']?>>
        </div>
    </div>
    
        <input type="submit" value="แก้ไข" class ="btn btn-success">
        <a href = "op_home.php" class ="btn btn-danger"> ยกเลิก </a>
        </form>
    </div>
</div>
</section>
</body>
</html>

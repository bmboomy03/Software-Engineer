<?php
include "../login/condb.php";
        $sql = "SELECT * FROM users WHERE utype = 'Professor' ORDER BY u_id;";
        $result = mysqli_query($conn,$sql);
        

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
    <form method = "POST" action = "s_insert.php">
       
    <div class = "row">
        <div class="col-md-5 mb-3">
            <label for="subid">รหัสวิชา</label>
            <!--<input class="form-control" type="text" name="s_id" value =  >-->
            <input class="form-control" type="text" name="subid" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="sname">ชื่อรายวิชา</label>
            <input class="form-control" type="text" name="sname" required >
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
            <label>คณะ</label>
            <input class="form-control" type="text" value = "วิทยาศาสตร์" readonly>
        </div>
        <div class="col-md-6 mb-3">
            <label for="department">สาขา</label>
            <select name="department" class="form-select" required>
            <option value = " "> -- สาขาวิชา -- </option>
            <option value="Biology">Biology</option>
            <option value="Microbiology">Microbiology</option>
            <option value="Computer Science">Computer Science</option>
            </select>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
            <label for="semester"> เทอม </label>
            <select name="semester" class="form-select" required>
            <option value = " ">-- เทอม --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="years">ปีการศึกษา</label>
            <input class="form-control" type="int" name="years" required>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
        <label for="u_id"> อาจารย์ </label>
        <select name="u_id" class="form-select" required>
            <option value="">-- อาจารย์ --</option>
            <?php  while($r = mysqli_fetch_assoc($result)) { ?>
                <option value=<?=$r['u_id']?>>-- <?=$r['fname'] . ' ' . $r['lname']?></option>
            <?php } ?>
        </select>
    </div>
</div>

        
        <input type="submit" value="ยืนยัน" class ="btn btn-success">
        <a href = "op_home.php" class ="btn btn-danger"> ยกเลิก </a>
        </form>
    </div>
</div>
</section>
</body>
</html>

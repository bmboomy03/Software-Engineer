<?php
include "../login/condb.php";
        $id = $_GET['s_id'];
        $sql = "
        SELECT s.*,e.*
        FROM subject as s
        JOIN exam as e on s.u_id = e.u_id
        WHERE s.s_id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
<section>
<div class = "container">
<div class = "row">
    <div class="col ">
    <div class="h4 text-center alert alert-warning mb-4 mt-5" role="alert">อัพโหลดข้อสอบ</div>

    <b><p><?=$row['subid']?> <?= $row["sname"] ?> [<?= $row["semester"] ?>/<?= $row["years"] ?>]</p></b>
    
    <form method = "POST" action = "e_insert.php" enctype = "multipart/form-data">
    <input type="hidden" name="s_id" value=<?=$row['s_id']?>>
    <input type="hidden" name="u_id" value=<?=$row['u_id']?>>
    <div class = "row">
        <div class="col-md-6 mb-3">
        <label for="section">ลักษณะการสอบ</label>
        <input class="form-check-input" type="radio" id="midterm" name="section" value="midterm">
        <label class="form-check-label" for="midterm">กลางภาค</label>
        <input class="form-check-input" type="radio" id="final" name="section" value="final">
        <label class="form-check-label" for="final">ปลายภาค</label>  
        </div>
    </div>
    <div class = "row">
        <div class="col-md-3 mb-3">
            <label>คณะ</label>
            <input class="form-control" type="text" value = "วิทยาศาสตร์" readonly>
        </div>
        <div class="col-md-3 mb-3">
            <label>สาขา</label>
            <input class="form-control" type="text" value = "<?= $row["department"]?>" readonly>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-3 mb-3">
            <label for="numstd">จำนวนนักศึกษา</label>
            <input class="form-control" type="number" name="numstd" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="starttime">เริ่มต้น</label>
            <input class="form-control" type="time" name="starttime" required >
        </div>
        <div class="col-md-3 mb-3">
            <label for="endtime">สิ้นสุด</label>
            <input class="form-control" type="time" name="endtime" required >
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
        <label for="pageprint">พิมพ์ข้อสอบแบบ</label>   
       
            <input class="form-check-input" type="radio" id="1" name="pageprint" value="1">
            <label class="form-check-label" for="1">หน้าเดียว</label>
        
        
        <input class="form-check-input" type="radio" id="2" name="pageprint" value="2">
        <label class="form-check-label" for="2">สองหน้า</label>
       
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
        <label for="answer">ต้องการกระดาษคำตอบ</label>
        <input  class="form-check-input" type="radio" id="answer" name="answer" value="yes">
        <label  class="form-check-label" for="yes">ต้องการ</label>
        <input class="form-check-input" type="radio" id="answer" name="answer" value="no">
        <label  class="form-check-label" for="no">ไม่ต้องการ</label>  
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6 mb-3">
        <label for="comment" class="form-label">คำอธิบายเพิ่มเติม</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
</div>
    </div>
    <div class="row">
    <div class="col-md-6 mb-3">
    <label for="efile" class="form-label">อัพโหลดไฟล์ข้อสอบ (pdf.)</label>
    <input class="form-control" type="file" id="efile" name="efile" accept=".pdf" required>
    <!-- <input type="hidden" class="form-control" name="file" value = <?=$row['efile']?>> -->
    </div>
</div>

        
        <input type="submit" value="ยืนยัน" class ="btn btn-success">
        <a href = "pf_home.php" class ="btn btn-danger"> ยกเลิก </a>
        </form>
    </div>
</div>
</section>
</body>
</html>

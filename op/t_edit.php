<?php
include "../login/condb.php";
        $id = $_GET['e_id'];
        $sql = "
        SELECT s.*,e.*
        FROM exam as e
        JOIN subject as s on s.s_id = e.s_id
        WHERE e.e_id ='$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
<section>
<div class = "container">
<div class = "row">
    <div class="col ">
    <div class="h4 text-center alert alert-warning mb-4 mt-5" role="alert">รายละเอียดการสอบ</div>

    <p><b><?=$row['subid']?> <?= $row["sname"] ?> [<?= $row["semester"] ?>/<?= $row["years"] ?>]</b></p> 
    <p><a>สถานะ:  </a><span class="badge badge-pill badge-info"><?=$row["estatus"]?></span></p> 

    <form method = "POST" action = "t_update.php" enctype = "multipart/form-data">
    <input type="hidden" name="s_id" value=<?=$row['s_id']?>>
    <input type="hidden" name="e_id" value=<?=$row['e_id']?>>
    <div class = "row">
        <div class="col-md-3 mb-3">
        <label for="section">ลักษณะการสอบ</label>
        <input class="form-control" type="text" value = "<?= $row["section"]?>" readonly>
        </div>
        <div class="col-md-3 mb-3">
            <label for="numstd">จำนวนนักศึกษา</label>
            <input class="form-control" type="number" value = "<?= $row["numstd"]?>" readonly>
        </div>
    </div>
    <div class = "row">
        <div class="col-md-3 mb-3">
            <label for="room">ห้องสอบ</label>
            <input class="form-control" type="text" name="room" required >
        </div>
        <div class="col-md-3 mb-3">
            <label for="tdate">วันที่สอบ</label>
            <input class="form-control" type="date" name="tdate" required >
        </div>
    </div>
    <div class = "row">
        <div class="col-md-3 mb-3">
            <label for="starttime">เริ่มต้น</label>
            <input class="form-control" type="time" name="starttime" required >
        </div>
        <div class="col-md-3 mb-3">
            <label for="endtime">สิ้นสุด</label>
            <input class="form-control" type="time" name="endtime" required >
        </div>
    </div>

        
        <input type="submit" value="ยืนยัน" class ="btn btn-success">
        <a href = "test.php" class ="btn btn-danger"> ยกเลิก </a>
        </form>
    </div>
</div>
</section>
</body>
</html>

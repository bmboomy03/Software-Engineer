<?php 
session_start();
if (!isset($_SESSION["type"])){  //check session
	  Header("Location: ../login/condb.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{ 
    include "../login/condb.php";
    $type = $_SESSION["type"];}
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
  <div class="h4 text-center alert alert-info mb-3 mt-3" role="alert">แสดงข้อมูลรายวิชา</div>
  <a href = "s_add.php" class="btn btn-primary btn-sm mb-2"> เพิ่มวิชา + </a>
    <table class="table table-striped">
       <thead>
          <tr>
            <th scope="col">รหัสวิชา</th>
            <th scope="col">ชื่อรายวิชา</th>
            <th scope="col">สาขา</th>
            <th scope="col">เทอม</th>
            <th scope="col">ปี</th>
            <th scope="col">อาจารย์</th>
            <th scope="col">แก้ไข</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
      <?php
      $sql = "
      SELECT s.*, u.u_id, u.fname, u.lname
      FROM subject AS s
      JOIN users AS u ON s.u_id = u.u_id
      WHERE u.utype = 'Professor' 
      ";
      $result = mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($result)){
      
      ?> 
          <tr>
            <th scope="row"><?=$row["subid"]?></a></th>
            <td><?=$row["sname"]?></td>
            <td><?=$row["department"]?></td>
            <td><?=$row["semester"]?></td>
            <td><?=$row["years"]?></td>
            <td><?=$row["fname"]?>  <?=$row["lname"]?></td>
            <td><a href = "s_edit.php?s_id=<?=$row['s_id']?>" class ="btn btn-warning"> แก้ไข </a></td>
            <td><a href = "s_delete.php?s_id=<?=$row['s_id']?>" class ="btn btn-danger" 
                onclick = "Del(this.href);return false;"> ลบ </a></td>
          </tr>
        <?php
        }
        mysqli_close($conn); //closeDB
        ?>
    </table>
  </div>
</div>
</section>
</body>
</html>
<script language = "JavaScript">
  function Del(mypage){
    var agree = confirm(" ยืนยันการลบข้อมูลหรือไม่? ");
    if(agree){
      window.location = mypage;
    }
  }
</script>

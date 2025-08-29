<?php 
session_start();
if (!isset($_SESSION["type"])){  //check session
	  Header("Location: ../login/condb.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}else{ 
    include "../login/condb.php";
    $type = $_SESSION["type"];

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['t_id'])) {
        $id = $_GET['t_id'];
        deleteTest($conn, $id); // เรียกใช้ฟังก์ชันลบข้อมูล
    }
    
    function deleteTest($conn, $id)
    {
        //$id = $_GET['u_id'];
        $sql = "DELETE FROM test WHERE t_id = '$id' ";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo '<script>alert("ลบตารางข้อสอบ")</script>';
            echo '<script>window.location = "test.php";</script>';
        } else {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            echo '<script>alert("ไม่สามารถลบตารางได้")</script>';
        }
        $stmt->close();
    }

    function calculateDurationInMinutes($starttime, $endtime) {
        // สร้าง DateTime objects
        $start = new DateTime($starttime);
        $end = new DateTime($endtime);
    
        // คำนวณระยะเวลา
        $interval = $start->diff($end);
    
        // คืนค่าระยะเวลาเป็นนาที
        return ($interval->h * 60) + $interval->i; // แปลงเป็นนาที
    }
}
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
  <div class="h4 text-center alert alert-info mb-3 mt-3" role="alert">ข้อมูลของรายวิชาสอบ</div>
    <table class="table table-striped">
       <thead>
          <tr>
          <th scope="col">รหัสรายวิชา</th>
          <th scope="col">ชื่อรายวิชา</th>
            <th scope="col">สาขา</th>
            <th scope="col">อาจารย์</th>
            <th scope="col">ห้องสอบ</th>
            <th scope="col">วันที่</th>
            <th scope="col">เวลาเริ่มต้น - สิ้นสุด</th>
            <th scope="col">เวลา</th>
            <th scope="col">สถานะ</th>
            <th scope="col">แก้ไข</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
      <?php
      $sql = "
      SELECT s.*,e.*, u.u_id, u.fname, u.lname
      FROM subject AS s
      JOIN users AS u ON s.u_id = u.u_id
      JOIN exam AS e ON s.s_id = e.s_id
      WHERE u.utype = 'Professor' 
      ";
      $result = mysqli_query($conn,$sql);
      
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                if (isset($row['starttime']) && isset($row['endtime'])) {
                    $durationInMinutes = calculateDurationInMinutes($row['starttime'], $row['endtime']);
                } else {
                    $durationInMinutes = 0; // หรือค่าที่คุณต้องการแสดงเมื่อไม่มีข้อมูล
                }
      ?> 
          <tr>
            <th scope="row"><?=$row["subid"]?></a></th>
            <td><?= $row["sname"] ?> [<?= $row["semester"] ?>/<?= $row["years"] ?>]</td>
            <td><?=$row["department"]?></td>
            <td><?=$row["fname"]?>  <?=$row["lname"]?></td>
            <td><?=$row["room"]?></td>
            <td><?=$row["tdate"]?></td>
            <td><?=$row["starttime"]?> - <?=$row["endtime"]?></td>
            <td><?=$durationInMinutes?> นาที</td> 
            <td><?=$row["estatus"]?></td>
            <td><a href = "t_edit.php?e_id=<?=$row['e_id']?>" class ="btn btn-warning"> แก้ไข </a></td>
            <td><a href="?action=delete&e_id=<?= $row['e_id'] ?>" class ="btn btn-danger" 
                onclick = "Del(this.href);return false;"> ลบ </a></td>
          </tr>
        <?php
        } }
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

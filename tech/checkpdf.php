<?php 
session_start();
if (!isset($_SESSION["type"])) {  
    header("Location: ../login/condb.php"); 
    exit();
} 

include "../login/condb.php";

$id = $_GET['e_id'] ?? '';
$sql = "
    SELECT s.*, e.*
    FROM exam AS e
    JOIN subject AS s ON s.s_id = e.s_id
    WHERE e.e_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
} else {
    echo "ไม่พบข้อมูล";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['estatus'])) {
    $status = $_POST['estatus'];
    update($conn, $status, $id); 
}

function update($conn, $status, $id) {
    $sql = "UPDATE exam SET estatus = ? WHERE e_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $status, $id);

    if ($stmt->execute()) {
        echo '<script>alert("อัพเดทสถานะ")</script>';
        echo '<script>window.location = "exam.php";</script>';
    } else {
        echo "Error: " . $stmt->error;
        echo '<script>alert("ไม่สามารถอัพเดทสถานะได้")</script>';
    }
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<section class="section">
    <div class="container">
        <div class="h4 text-center alert alert-info mb-3 mt-3" role="alert">ตรวจสอบไฟล์ข้อสอบ</div>
        
        <div class="row">
            <div class="col">
                <?php if (!empty($row['efile'])): ?>
                    <iframe src="<?= htmlspecialchars($row['efile']) ?>" width='600' height='500'></iframe>
                <?php else: ?>
                    <p>ไม่พบไฟล์ PDF</p>
                <?php endif; ?>
            </div>
            <div class="col">
                <br>
                <form method="post">
                    <div class="card w-75">
                        <div class="card-body">
                            <h5 class="card-title">ตรวจสอบความถูกต้องของไฟล์</h5>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="estatus1" name="estatus" value="ไฟล์ถูกต้อง">
                                <label class="custom-control-label" for="estatus1">ไฟล์ถูกต้องสมบูรณ์</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    <div class="card w-75">
                        <div class="card-body">
                            <h5 class="card-title">พิมพ์ข้อสอบ</h5>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="estatus2" name="estatus" value="การจัดพิมพ์สมบูรณ์">
                                <label class="custom-control-label" for="estatus2">การจัดพิมพ์สมบูรณ์</label>
                            </div>
                            <br>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-warning">ปริ้นท์หน้าปกข้อสอบ</button>
                                <button type="button" class="btn btn-primary">ปริ้นท์ข้อสอบ</button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">บันทึกสถานะ</button>
                    <a href="exam.php" class="btn btn-secondary">ย้อนกลับ</a>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>

<?php 
$stmt->close();
$conn->close(); 
?>

<?php
session_start();
if (!isset($_SESSION["type"])) {  //check session
    Header("Location: ../login/condb.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    include "../login/condb.php";
    $type = $_SESSION["type"];
    $id = $_SESSION["uid"];
    $name = $_SESSION["name"];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Subject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        #pill-nav a {
            display: inline-block;
            color: black;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            font-size: 17px;
            border-radius: 5px;
        }

        #pill-nav a:hover {
            background-color: #ddd;
            color: black;
        }

        #pill-nav a.active {
            background-color: dodgerblue;
            color: white;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #35599E;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
            color: black;
            color: white;
        }



        .sidebar a:hover {
            color: #f1f1f1;
            display: inline-block;
            color: black;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            font-size: 17px;
            border-radius: 5px;
        }

        .container {
            flex: 1;
            margin-left: 50px;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #FFB915;
            color: black;
            padding: 10px 15px;
            border: none;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        .navbar-custom {
            background-color: #FFB915;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
        }

        .navbar-brand {
            font-size: 24px;
            color: #000;
        }

        .navbar .openbtn {
            height: 60px;
            width: 50px;
            margin-right: 10px;
        }

        .navbar-custom {
            background-color: #FFB915;
            /* กำหนดสีพื้นหลัง */
        }
    </style>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-light navbar-custom">
            <button class="openbtn" onclick="openNav()">
                <i class="fas fa-bars"></i>
            </button>
            <span class="navbar-brand">ระบบจัดพิมพ์ข้อสอบ</span>
            <ul class="navbar-nav ms-auto" id="pill-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index-pro.php"></i> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="status.php"></i> Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notification.php"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />

                        </svg> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Message.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor"
                            class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                            <path
                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        </svg></a>
                </li>

            </ul>
        </nav>
        <div id="mySidebar" class="sidebar">
            <div style="justify-content:center">
                <h2><?= $type ?></h2>
            </div>

            <div>
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg> View Profile </a>
                <a href="exam.php"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                        class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>Exam</a>
            </div>

        </div>

        <script>
            function openNav() {
                document.getElementById("mySidebar").style.width = "300px";
                document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
            }
        </script>

<section>
            <div class="container">
                <div class="h4 text-center alert alert-info mb-3 mt-3" role="alert">รายวิชา</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">รหัสวิชา</th>
                            <th scope="col">ชื่อรายวิชา</th>
                            <th scope="col">สาขา</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "
      SELECT s.*, u.fname,u.lname
      FROM users AS u
      JOIN subject AS s ON s.u_id = u.u_id
      WHERE u.u_id = '$id' AND u.utype = 'Professor' 
      ";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                    ?>
                        <tr>
                            <td>1</td>
                            <th scope="row"><?= $row["subid"]?></a></th>
                            <td><?= $row["sname"] ?> [<?= $row["semester"] ?>/<?= $row["years"] ?>]</td>
                            <td><?= $row["department"] ?></td>
                            <td><a href="e_add.php?s_id=<?=$row['s_id']?>" class="btn btn-primary"> + ข้อสอบ </a></td>
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

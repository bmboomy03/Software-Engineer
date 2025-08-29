<?php 
session_start();
        if(isset($_POST['username'])){
				//connection
                  include("condb.php");
				//รับค่า user & password
                  $username = $_POST['username'];
                  $pass = $_POST['pass'];
				//query 
                  $sql="SELECT * FROM users WHERE username='".$username."' AND pass='".$pass."' ";
                  $result = mysqli_query($conn,$sql);
                  if(mysqli_num_rows($result) > 0){
                      $row = mysqli_fetch_array($result);
                      $_SESSION["username"] = $row['username'];
                      $_SESSION["pass"] = $row['pass'];
                      $_SESSION["name"] = $row['fname'];
                      $_SESSION["uid"] = $row['u_id'];
                      $_SESSION["type"] = $row['utype'];
                      

                      if($_SESSION["type"]=="Professor"){ 
                        Header("Location: ../pf/pf_home.php");
 
                      }
                      if ($_SESSION["type"]=="Technician"){ 
                        Header("Location: ../tech/exam.php");
 
                      }
                      if($_SESSION["type"]=="Operator"){ 
                        Header("Location: ../op/test.php");
 
                      }
                      if ($_SESSION["type"]=="Admin"){ 
                        Header("Location: ../admin/a_home.php");
 
                      }
 
                }else{
                        echo "<script>";
                            echo "alert(\" Username หรือ  Password ไม่ถูกต้อง\");"; 
                            echo "window.history.back()";
                        echo "</script>";
                      }
            }else{
             Header("Location:login.php"); //user & password incorrect back to login again
        }
?>
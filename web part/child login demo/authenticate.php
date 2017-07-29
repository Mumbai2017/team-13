<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Authentication</title>
</head>

<body>
<?php
//echo 'Starting session';
session_start();
include ('connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $userid = strtoupper($_POST['userid']);
    $pass=$_POST['password'];
    //$password = openssl_encrypt($pass,'aes128',$cy_string, true,$initialization_vector);
    //$_SESSION['username'] = $userid;
    //$_SESSION['password']=$password;


    //CHECKING IF ADMIN
    if(strcmp(substr($userid, 0, 5), 'ADMIN')==0)
    {
		//echo "IN ADMIN";
        $userid = strtolower($userid);
        $sql_admin="select * from admin_details where `username`='$userid'";
        //echo $sql_admin;
        $res_admin=mysqli_query($connect, $sql_admin);
        $row_admin=mysqli_fetch_array($res_admin);
        //echo $row_admin['password'];
        if(mysqli_num_rows($res_admin)>0 && strcmp($row_admin['password'],$pass)==0)
        {
            $_SESSION['username']=$userid;
            $_SESSION['user']=$userid;
            header("refresh:0 ;url=admin");
        }

        else
        {
            echo '<script language="javascript"> alert("No user found with such username and password combination.. Please try again..");</script>';
            header("refresh:0 ;url=index.php");
        }
    }
    //Checking for faculty

    else if(strlen($userid) == 3 )
    {
        echo 'Please wait.. Checking Credentials..';
        $sql_faculty = "SELECT * FROM faculty WHERE `Sdrn` = '$userid'";
        $res_faculty = mysqli_query($connect,$sql_faculty);
        $row_faculty = mysqli_fetch_array($res_faculty);
        if(mysqli_num_rows($res_faculty) > 0  && (strcmp($row_faculty['Password'], $pass)==0)) {
            $_SESSION['level'] = 3;
            $_SESSION['sdrn'] = $userid;
            $_SESSION['fname'] = $row_faculty['First_name'];
            $_SESSION['username'] = $userid;
            $_SESSION['department'] = 'COMPS';
            header("refresh:0 ;url=faculty/");
        }
    }
    // CHECKING IF STUDENT
    else
    {
        $sql_student = "SELECT * FROM `student` WHERE `rollno`='$userid'";
        $res_student = mysqli_query($connect, $sql_student);
        $row_student=mysqli_fetch_array($res_student);

        if(mysqli_num_rows($res_student) > 0 && strcmp($row_student['password'], $pass)==0)
        {
            $_SESSION['rollno'] = $userid;
            $_SESSION['user'] = $userid;
            header("refresh:0 ;url=student");

        }

        else
        {
            echo '<script language="javascript"> alert("No user found with such username and password combination.. Please try again..");</script>';
            header("refresh:0 ;url=index.php");
        }

    }






}
?>
</body>
</html>

<?php
    session_start();
    if(isset($_POST['staff_sign_in'])){
        $staff_phone = htmlentities($_POST['staff_phone']);
        $staff_pass = htmlentities($_POST['staff_pass']);

        if(strlen($staff_phone) != 10){
            echo("<script>alert('Please Enter 10 digits phone number')</script>");
            exit();
        }

        $select = "SELECT * FROM staff WHERE staff_phone = '$staff_phone' 
        AND staff_pass = '$staff_pass'";
        $run = mysqli_query($con, $select);

        if(!$run){
            echo("<script>alert('something went wrong in database')</script>");
            echo("<script>window.open('signinStaff.php', '_self')</script>");
        }else{
            $num = mysqli_num_rows($run);
            if($num == 1){
                $_SESSION['staff_phone'] = $staff_phone;
                echo("<script>window.open('staff_home.php', '_self')</script>");
            }
            else{
                echo "<script>alert('Your  or Phone number or Password is incorrect')</script>";
            }
        }
    }

?>
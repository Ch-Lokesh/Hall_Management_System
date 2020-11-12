<?php
    include("../config/configure.php");
    if(isset($_POST['staff_sign_up'])){
        $first_name = htmlentities(mysqli_real_escape_string($con, $_POST['first_name']));
        $last_name = htmlentities(mysqli_real_escape_string($con, $_POST['last_name']));
        $staff_pass = htmlentities(mysqli_real_escape_string($con, $_POST['staff_pass']));
        $staff_pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['staff_pass1']));
        $staff_birthday = htmlentities(mysqli_real_escape_string($con, $_POST['staff_birthday']));
        $staff_phone = htmlentities(mysqli_real_escape_string($con, $_POST['staff_phone']));
        $staff_gender = htmlentities(mysqli_real_escape_string($con, $_POST['staff_gender']));
        $staff_job = htmlentities(mysqli_real_escape_string($con, $_POST['staff_job']));
        $status = "verified";
        $recovery_account = "admin";

        $staff_name = strtolower($first_name . '_' . $last_name);

        

        if(strlen($staff_pass) < 6){
            echo"<script>alert('password should be minimum 6 charecters!')</script>";
            exit();
        }
        if($staff_pass != $staff_pass1){
            echo"<script>alert('second password did not match with first, try again!')</script>";
            exit();
        }
        else if(strlen($staff_phone) != 10){
            echo"<script>alert('phone number must be 10 digits')</script>";
            exit();
        }

        $check_phone = "select * from staff where staff_phone = '$staff_phone'";
        $run_phone = mysqli_query($con, $check_phone);
        $check = mysqli_num_rows($run_phone);

        if($check >= 1){
            echo"<script>alert('Phone number already exits please try another phone number')</script>";
            echo"<script>window.open('signupStaff.php', '_self')</script>";
            exit();
        }

        $rand = rand(1, 3);
        if($rand == 1){
            $staff_image = 'students/student1.png';
        }
        else if($rand == 2){
            $staff_image = 'students/student2.png';
        }
        else{
            $staff_image = 'students/student3.png';
        }

        $insert = "insert into staff (first_name, last_name, staff_name, staff_pass, staff_phone,
        staff_birthday, staff_image, staff_gender, staff_reg_date, recovery_account, status, staff_job)
        values('$first_name', '$last_name','$staff_name', '$staff_pass', '$staff_phone',
        '$staff_birthday', '$staff_image', '$staff_gender', NOW(), '$recovery_account', '$status', '$staff_job')";

        $insert_query = mysqli_query($con, $insert);
        if($insert_query){
            echo"<script>alert('$first_name, your registration is completed')</script>";
            echo"<script>window.open('signinStaff.php', '_self')</script>";
        }
        else{
            echo"<script>alert('your registration failed')</script>";
            echo"<script>window.open('signupStaff.php', '_self')</script>";
        }
    }
?>
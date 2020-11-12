<?php
include("configure.php");
include("../functions/functions.php");
include("../variables/string_variables.php");

?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
             data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="student_home.php" class="navbar-brand"><?php echo($hall_name); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    $student = $_SESSION['student_email'];
                   
                    
                    $get_student = "select * from students where student_email = '$student'";
                    $run_student = mysqli_query($con, $get_student);
                    if(!$run_student){
                        echo("<script>alert('Something went wrong!')</script>");
                    }
                    else{
                        $student_row = mysqli_fetch_array($run_student);
                        

                        $student_id = $student_row['student_id'];
                        $first_name = $student_row['first_name'];
                        $last_name = $student_row['last_name'];
                        $student_name = $student_row['student_name'];
                        $roll_no = $student_row['roll_no'];
                        $student_pass = $student_row['student_pass'];
                        $student_email = $student_row['student_email'];
                        $student_phone = $student_row['student_phone'];
                        $student_birthday = $student_row['student_birthday'];
                        $student_image = $student_row['student_image'];
                        $student_posts = $student_row['student_posts'];
                        $student_rep = $student_row['student_rep'];
                        $student_gender = $student_row['student_gender'];
                        $student_reg_date = $student_row['student_reg_date'];
                        $recovery_account = $student_row['recovery_account'];
                        $status = $student_row['status'];
                        
                        $student_posts = "select * from posts where student_id='$student_id' and post_by='student'";
                        $run_posts = mysqli_query($con, $student_posts);
                        $posts = mysqli_num_rows($run_posts);

                        $student_msgs= "select * from messeges where user_id = '$student_id' and user_type='student' and msg_seen='no'";
                        $run_msgs = mysqli_query($con, $student_msgs);
                        $num_msgs = mysqli_num_rows($run_msgs);
                    }
                ?>

                <li><a href='my_profile.php?<?php echo("stu_id=$student_id")?>'><?php echo("$first_name");?></a></li>
                <li><a href='student_home.php'>Home</a></li>
                <li><a href='mess.php?<?php echo("stu_id=$student_id")?>'>Mess</a></li>
                <li><a href='room_service.php?<?php echo("stu_id=$student_id")?>'>Room Service</a></li>
                <li><a href='events.php?<?php echo("stu_id=$student_id")?>'>Events</a></li>
                <li><a href='payment.php?<?php echo("stu_id=$student_id") ?>'>Payment</a></li>
                <li><a href='messeges_info.php?<?php echo("stu_id=$student_id")?>'>Messages &nbsp;<span class='badge badge-secondary'><?php echo($num_msgs); ?></span></a></li>
                <li><a href="feedback.php">Give Feedback</a></li>

                <?php
                    echo"
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                        <span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='my_post.php?stu_id=$student_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
                            </li>
                            <li>
                                <a href='edit_stu_profile.php?stu_id=$student_id'>Edit Account</a>
                            </li>
                            <li role='separator' class='divider'></li>
                            <li>
                                <a href='logout.php'>Logout</a>
                            </li>
                        </ul>
                    </li>
                    ";
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <form action="results.php" class="navbar-form navbar-left" method="get">
                        <div class="form-group">
                            <input type="text" class="from-control" name="user_query" placeholder="Search Posts">
                        </div>
                        <button type="submit" class="btn btn-info" name="search">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


<?php
include("../config/configure.php");
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
            <a href="staff_home.php" class="navbar-brand"><?php echo($hall_name); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    $staff = $_SESSION['staff_phone'];
                   
                    
                    $get_staff = "select * from staff where staff_phone = '$staff'";
                    $run_staff = mysqli_query($con, $get_staff);
                    if(!$run_staff){
                        echo("<script>alert('Something went wrong in session!')</script>");
                        echo("<script>window.open('../index.php', '_self')</script>");
                    }
                    else{
                        $staff_row = mysqli_fetch_array($run_staff);
    

                        $staff_id = $staff_row['staff_id'];
                        $first_name = $staff_row['first_name'];
                        $last_name = $staff_row['last_name'];
                        $staff_name = $staff_row['staff_name'];
                        $staff_pass = $staff_row['staff_pass'];
                        $staff_job = $staff_row['staff_job'];
                        $staff_phone = $staff_row['staff_phone'];
                        $staff_birthday = $staff_row['staff_birthday'];
                        $staff_image = $staff_row['staff_image'];
                        $staff_gender = $staff_row['staff_gender'];
                        $staff_reg_date = $staff_row['staff_reg_date'];
                                                
                        
                    }
                ?>

                <li><a href='staff_profile.php?<?php echo("staff_id=$staff_id")?>'><?php echo("$first_name");?></a></li>
                <li><a href='staff_home.php'>Home</a></li>
                <li><a href='mess.php?<?php echo("staff_id=$staff_id")?>'>Mess</a></li>
                <li><a href="staff_complaints.php?<?php echo("staff_id=$staff_id") ?>">Complaints</a></li>
                <li><a href="apply_leave.php?<?php echo("staff_id=$staff_id") ?>">Apply Leave</a></li>
                <li><a href="staff_payment.php?<?php echo("staff_id=$staff_id") ?>">Payment</a></li>
                <li><a href="feedback.php">Give Feedback</a></li>
                <?php
                    echo"
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                        <span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
                        <ul class='dropdown-menu'>
                            
                            <li>
                                <a href='edit_staff_profile.php?staff_id=$staff_id'>Edit Account</a>
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
            
        </div>
    </div>
</nav>
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
            <a href="admin_home.php" class="navbar-brand"><?php echo($hall_name); ?></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                    $admin = $_SESSION['admin_email'];
                   
                    
                    $get_admin = "select * from admin where admin_email = '$admin'";
                    $run_admin = mysqli_query($con, $get_admin);
                    if(!$run_admin){
                        echo("<script>alert('Something went wrong in session!')</script>");
                        echo("<script>window.open('../index.php', '_self')</script>");
                    }
                    else{
                        $admin_row = mysqli_fetch_array($run_admin);

                        $admin_id = $admin_row['admin_id'];
                        $first_name = $admin_row['first_name'];
                        $last_name = $admin_row['last_name'];
                        $admin_pass = $admin_row['admin_pass'];
                        $admin_email = $admin_row['admin_email'];
                        $admin_phone = $admin_row['admin_phone'];
                        $admin_birthday = $admin_row['admin_birthday'];
                        $admin_image = $admin_row['admin_image'];
                        $admin_posts = $admin_row['admin_posts'];
                        $admin_gender = $admin_row['admin_gender'];
                        $admin_reg_date = $admin_row['admin_reg_date'];
                                                
                        $admin_posts = "select * from posts where student_id='$admin_id' and post_by='admin'";
                        $run_posts = mysqli_query($con, $admin_posts);
                        $posts = mysqli_num_rows($run_posts);
                    }
                ?>

                <li><a href='admin_profile.php?<?php echo("adm_id=$admin_id")?>'><?php echo("$first_name");?></a></li>
                <li><a href='admin_home.php'>Home</a></li>
                <li><a href='mess.php?<?php echo("adm_id=$admin_id")?>'>Mess</a></li>
                <li><a href='events.php?<?php echo("adm_id=$admin_id")?>'>Events</a></li>
                <li><a href='members.php?<?php echo("adm_id=$admin_id")?>'>Members</a></li>
                <li><a href="admin_complaints.php?<?php echo("adm_id=$admin_id") ?>">Complaints</a></li>
                <li><a href="admin_applications.php">Leave Applications</a></li>
                <li><a href="admin_feedback.php">See Feedback</a></li>
                <?php
                    echo"
                    <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>
                        <span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
                        <ul class='dropdown-menu'>
                            
                            <li>
                                <a href='edit_adm_profile.php?adm_id=$admin_id'>Edit Account</a>
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
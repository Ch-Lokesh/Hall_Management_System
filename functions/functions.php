<?php
$con = mysqli_connect("localhost", "root", "", "hms") or die("connection was not established");


function insertPost(){
    if(isset($_POST['sub'])){
        global $con;
        global $student_id;

        $content = htmlentities($_POST['content']);
        $post_image = $_FILES['post_image']['name'];
        $image_tmp = $_FILES['post_image']['tmp_name'];
        $random_number = rand(1, 100);
        $post_by = "student";

        if(strlen($content) > 250){
            echo "<script>alert('Please enter 250 or less than 250 words!')</script>";
            echo "<script>window.open('student_home.php', '_self')</script>";
        }
        else{
            if(strlen($post_image) >= 1 && strlen($content) >= 1){
                move_uploaded_file($image_tmp, "../imagepost/$post_image.$random_number");
                $insert = "insert into posts (student_id, post_content, post_image, post_by, post_date)
                values ('$student_id', '$content', '$post_image.$random_number', '$post_by', NOW())";

                $run = mysqli_query($con, $insert);

                if($run){
                    echo "<script>alert('Your Post Updated a Moment Ago !')</script>";
                    echo "<script>window.open('student_home.php', '_self')</script>";
                    
                    $update = "update students set student_posts = 'yes' where student_id = '$student_id'";
                    $run_update = mysqli_query($con, $update);
                }
                exit();
            }
            else{
                if($content=='' && $post_image=''){
                    echo "<script>alert('Select image or write something!')</script>";
                    echo "<script>window.open('student_home.php', '_self')</script>";
                }
                else{
                    if($content == ''){
                        move_uploaded_file($image_tmp, "../imagepost/$post_image.$random_number");
                        $insert = "insert into posts (student_id, post_content, post_image, post_by, post_date)
                        values ('$student_id', '$content', '$post_image.$random_number', '$post_by', NOW())";
        
                        $run = mysqli_query($con, $insert);
        
                        if($run){
                            echo "<script>alert('Your Post Updated a Moment Ago !')</script>";
                            echo "<script>window.open('student_home.php', '_self')</script>";
                            
                            $update = "update students set student_posts = 'yes' where student_id = '$student_id'";
                            $run_update = mysqli_query($con, $update);
                        }
                        exit();
                    }
                    else{
                        $insert = "insert into posts (student_id, post_content, post_by, post_date)
                        values('$student_id', '$content', '$post_by', NOW())";
                        
                        $run = mysqli_query($con, $insert);

                        if($run){
                            echo "<script>alert('Your Post Updated a Moment Ago !')</script>";
                            echo "<script>window.open('student_home.php', '_self')</script>";
                            
                            $update = "update students set student_posts = 'yes' where student_id = '$student_id'";
                            $run_update = mysqli_query($con, $update);
                        }
                        exit();

                    }
                }
            }
        }
    }

}

function insertadmPost(){
    if(isset($_POST['sub'])){
        global $con;
        global $admin_id;

        $content = htmlentities($_POST['content']);
        $post_image = $_FILES['post_image']['name'];
        $image_tmp = $_FILES['post_image']['tmp_name'];
        $random_number = rand(1, 100);
        $post_by = "admin";

        if(strlen($content) > 250){
            echo "<script>alert('Please enter 250 or less than 250 words!')</script>";
            echo "<script>window.open('admin_home.php', '_self')</script>";
        }
        else{
            if(strlen($post_image) >= 1 && strlen($content) >= 1){
                move_uploaded_file($image_tmp, "../imagepost/$post_image.$random_number");
                $insert = "insert into posts (student_id, post_content, post_image, post_by, post_date)
                values ('$admin_id', '$content', '$post_image.$random_number', '$post_by', NOW())";

                $run = mysqli_query($con, $insert);

                if($run){
                    echo "<script>alert('Your Post Updated a Moment Ago !')</script>";
                    echo "<script>window.open('admin_home.php', '_self')</script>";
                    
                    $update = "update admin set admin_posts = 'yes' where admin_id = '$admin_id'";
                    $run_update = mysqli_query($con, $update);
                }
                else{
                    echo "<script>alert('Something wrong in admin_posts database !')</script>";
                }
                exit();
            }
            else{
                if($content=='' && $post_image=''){
                    echo "<script>alert('Select image or write something!')</script>";
                    echo "<script>window.open('admin_home.php', '_self')</script>";
                }
                else{
                    if($content == ''){
                        move_uploaded_file($image_tmp, "../imagepost/$post_image.$random_number");
                        $insert = "insert into posts (student_id, post_content, post_image, post_by, post_date)
                        values ('$admin_id', '$content', '$post_image.$random_number', '$post_by', NOW())";
        
                        $run = mysqli_query($con, $insert);
        
                        if($run){
                            echo "<script>alert('Your Post Updated a Moment Ago !')</script>";
                            echo "<script>window.open('admin_home.php', '_self')</script>";
                            
                            $update = "update admin set admin_posts = 'yes' where admin_id = '$admin_id'";
                            $run_update = mysqli_query($con, $update);
                        }
                        else{
                            echo "<script>alert('Something wrong in admin_posts database !')</script>";
                        }
                        exit();
                    }
                    else{
                        $insert = "insert into posts (student_id, post_content, post_by, post_date)
                        values('$admin_id', '$content', '$post_by', NOW())";
                        
                        $run = mysqli_query($con, $insert);

                        if($run){
                            echo "<script>alert('Your Post Updated a Moment Ago !')</script>";
                            echo "<script>window.open('admin_home.php', '_self')</script>";
                            
                            $update = "update admin set admin_posts = 'yes' where admin_id = '$admin_id'";
                            $run_update = mysqli_query($con, $update);
                        }
                        else{
                            echo "<script>alert('Something wrong in admin_posts database !')</script>";
                        }
                        exit();

                    }
                }
            }
        }
    }
}

function get_posts(){
    global $con;
    $per_page = 15;

    // if(isset($_GET['page'])){
    //     $page = $_GET['page'];
    // }else{
    //     $page = 1;
    // }
    get_admposts();
    $per_page = 10;
    $start_from = 0;

    $get_posts = "select * from posts where post_by ='student' ORDER by 1 DESC LIMIT $start_from, $per_page";

    $run_posts = mysqli_query($con, $get_posts);

    while($row_posts  = mysqli_fetch_array($run_posts)){

        $post_id = $row_posts['post_id'];
        $student_id = $row_posts['student_id'];
        $content = ($row_posts['post_content']);
        $post_image = $row_posts['post_image'];
        $post_date = $row_posts['post_date'];
        $post_by = $row_posts['post_by'];

        
        
        $student = "select * from students where student_id = '$student_id' AND student_posts = 'yes'";
        $run_student = mysqli_query($con, $student);
        $row_student = mysqli_fetch_array($run_student);

        $student_name = $row_student['student_name'];
        $student_image = $row_student['student_image'];

        //displaying posts

        if($content == '' && strlen($post_image) >= 1){
            
            echo"
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                             href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                ";?>
                <?php
                if(isset($_SESSION['student_email'])){
                    echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                }
                else if(isset($_SESSION['admin_email'])){
                    echo"<a href='admin_single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                }
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
        }

        else if(strlen($content) >= 1 && strlen($post_image) >= 1){
			echo"
			<div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                             href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                        <h3><p>$content</p></h3>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                ";?>
                <?php
                if(isset($_SESSION['student_email'])){
                    echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                }
                else if(isset($_SESSION['admin_email'])){
                    echo"<a href='admin_single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                }
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
			
        }
        
        else{
			echo"
			<div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                             href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h3><p>$content</p></h3>
                        </div>
                    </div><br>
                ";?>
                <?php
                if(isset($_SESSION['student_email'])){
                    echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                }
                else if(isset($_SESSION['admin_email'])){
                    echo"<a href='admin_single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                }
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
		}

    }
    // include("pagination.php");
}

function get_posts_for_staff(){
    global $con;
    $per_page = 15;

    // if(isset($_GET['page'])){
    //     $page = $_GET['page'];
    // }else{
    //     $page = 1;
    // }
    get_admposts();
    $per_page = 10;
    $start_from = 0;

    $get_posts = "select * from posts where post_by ='student' ORDER by 1 DESC LIMIT $start_from, $per_page";

    $run_posts = mysqli_query($con, $get_posts);

    while($row_posts  = mysqli_fetch_array($run_posts)){

        $post_id = $row_posts['post_id'];
        $student_id = $row_posts['student_id'];
        $content = ($row_posts['post_content']);
        $post_image = $row_posts['post_image'];
        $post_date = $row_posts['post_date'];
        $post_by = $row_posts['post_by'];

        
        
        $student = "select * from students where student_id = '$student_id' AND student_posts = 'yes'";
        $run_student = mysqli_query($con, $student);
        $row_student = mysqli_fetch_array($run_student);

        $student_name = $row_student['student_name'];
        $student_image = $row_student['student_image'];

        //displaying posts

        if($content == '' && strlen($post_image) >= 1){
            
            echo"
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$student_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                ";?>
                <?php
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
        }

        else if(strlen($content) >= 1 && strlen($post_image) >= 1){
			echo"
			<div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$student_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                        <h3><p>$content</p></h3>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                ";?>
                <?php
                
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
			
        }
        
        else{
			echo"
			<div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$student_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h3><p>$content</p></h3>
                        </div>
                    </div><br>
                ";?>
                <?php
                
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
		}

    }
    // include("pagination.php");
}

function get_admposts(){
    global $con;
    $per_page = 5;

    // if(isset($_GET['page'])){
    //     $page = $_GET['page'];
    // }else{
    //     $page = 1;
    // }

    $start_from = 0;

    $get_posts = "select * from posts where post_by='admin' ORDER by 1 DESC LIMIT $start_from, $per_page";

    $run_posts = mysqli_query($con, $get_posts);

    while($row_posts  = mysqli_fetch_array($run_posts)){

        $post_id = $row_posts['post_id'];
        $admin_id = $row_posts['student_id'];
        $content = ($row_posts['post_content']);
        $post_image = $row_posts['post_image'];
        $post_date = $row_posts['post_date'];

        $admin = "select * from admin where admin_id = '$admin_id' AND admin_posts = 'yes'";
        $run_admin = mysqli_query($con, $admin);
        $row_admin = mysqli_fetch_array($run_admin);

        $admin_name = $row_admin['first_name'];
        $admin_image = $row_admin['admin_image'];

        //displaying posts

        if($content == '' && strlen($post_image) >= 1){
            
            echo"
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$admin_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$admin_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                    ";?>
                <?php
                    if(isset($_SESSION['student_email'])){
                        echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                    }
                    else if(isset($_SESSION['admin_email'])){
                        echo"<a href='admin_single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                    }
                echo "
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
        }

        else if(strlen($content) >= 1 && strlen($post_image) >= 1){
			echo"
			<div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$admin_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$admin_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h3><p>$content</p></h3>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                    ";?>
                <?php
                    if(isset($_SESSION['student_email'])){
                        echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                    }
                    else if(isset($_SESSION['admin_email'])){
                        echo"<a href='admin_single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                    }
                echo "
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
			";
        }
        
        else{
			echo"
			<div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$admin_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$admin_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h3><p>$content</p></h3>
                        </div>
                    </div><br>
                    ";?>
                <?php
                    if(isset($_SESSION['student_email'])){
                        echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                    }
                    else if(isset($_SESSION['admin_email'])){
                        echo"<a href='admin_single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>";
                    }
                echo "
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
			";
		}

    }
    // include("pagination.php");
}

function get_my_posts(){
    
    global $con;
    $per_page = 4;

    $student_id = $_GET['stu_id'];
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else{
        $page = 1;
    }

    
    $start_from = ($page - 1)*$per_page;

    $get_posts = "select * from posts where post_by ='student' AND student_id='$student_id'
    ORDER by 1 DESC LIMIT $start_from, $per_page";

    $run_posts = mysqli_query($con, $get_posts);

    $student = "select * from students where student_id = '$student_id' AND student_posts = 'yes'";
    $run_student = mysqli_query($con, $student);
    $row_student = mysqli_fetch_array($run_student);

    $student_name = $row_student['student_name'];
    $student_image = $row_student['student_image'];

    while($row_posts  = mysqli_fetch_array($run_posts)){

        $post_id = $row_posts['post_id'];
        $student_id = $row_posts['student_id'];
        $content = ($row_posts['post_content']);
        $post_image = $row_posts['post_image'];
        $post_date = $row_posts['post_date'];
        $post_by = $row_posts['post_by'];

        
        
        

        //displaying posts

        if($content == '' && strlen($post_image) >= 1){
            
            echo"
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$student_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                ";?>
                <?php
                if(isset($_SESSION['student_email'])){
                    echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a>
                    <a href='../functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a><br><br>
                    ";
                    
                }
                
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
        }

        else if(strlen($content) >= 1 && strlen($post_image) >= 1){
            echo"
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$student_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                        <h3><p>$content</p></h3>
                            <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                        </div>
                    </div><br>
                ";?>
                <?php
                if(isset($_SESSION['student_email'])){
                    echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a>
                    <a href='../functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                    <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Edit</button></a><br><br>";
                }
               
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
            
        }
        
        else{
            echo"
            <div class='row'>
                <div class='col-sm-3'>
                </div>
                <div class='col-sm-6' id='posts'>
                    <div class='row'>
                        <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width = '100px'
                            height='100px' alt='user image'></p>
                        </div>
                        <div class='col-sm-6'>
                            <h3>$student_name</h3>
                            <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                        </div>
                        <div class='col-sm-4'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h3><p>$content</p></h3>
                        </div>
                    </div><br>
                ";?>
                <?php
                if(isset($_SESSION['student_email'])){
                    echo"<a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a>
                    <a href='../functions/delete_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>
                    <a href='edit_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Edit</button></a><br><br>";
                }
                
                echo"
                </div>
                <div class='col-sm-3'>
                </div>
            </div><br><br>
            ";
        }

    }
        
    
}

function single_post(){
    if(isset($_GET['post_id'])){
        global $con;

        $get_id = $_GET['post_id'];

        $get_posts = "select * from posts where post_id='$get_id'";
        $run_posts = mysqli_query($con, $get_posts);
        $row_posts = mysqli_fetch_array($run_posts);

        $post_id=$row_posts['post_id'];
        $student_id = $row_posts['student_id'];
        $content = $row_posts['post_content'];
        $post_image = $row_posts['post_image'];
        $post_by = $row_posts['post_by'];
        $post_date = $row_posts['post_date'];

        if($post_by == 'student'){
            $student = "select * from students where student_id = '$student_id' and student_posts='yes'";
            $run_student = mysqli_query($con, $student);
            $row_student = mysqli_fetch_array($run_student);

            $student_name = $row_student['student_name'];
            $student_image = $row_student['student_image'];
        }
        else if($post_by = 'admin'){
            $student = "select * from admin where admin_id = '$student_id' and admin_posts = 'yes'";
            $run_student = mysqli_query($con, $student);
            $row_student = mysqli_fetch_array($run_student);

            $student_name = $row_student['first_name'];
            $student_image = $row_student['admin_image'];
        }

        if(isset($_SESSION['student_email'])){
            $student_com = $_SESSION['student_email'];
            $get_com = "select * from students where student_email='$student_com'";
            $run_com = mysqli_query($con, $get_com);
            $row_com = mysqli_fetch_array($run_com);

            $student_com_id = $row_com['student_id'];
            $student_com_name = $row_com['student_name'];
            $comment_by = "student";
            $my_profile = "myprofile.php?stu_id=$student_id";
        }
        else if(isset($_SESSION['admin_email'])){
            $student_com = $_SESSION['admin_email'];
            $get_com = "select * from admin where admin_email='$student_com'";
            $run_com = mysqli_query($con, $get_com);
            $row_com = mysqli_fetch_array($run_com);

            $student_com_id = $row_com['admin_id'];
            $student_com_name = $row_com['first_name'];
            $comment_by = "admin";
            $my_profile = "#";
        }

        //displaying post
        if($content == '' && strlen($post_image) >= 1){
            echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6' id='posts'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='../$student_image' class='img-circle' width = '100px'
                                height='100px' alt='student image'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                href=''>$student_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div><br>
                    
                        <div class='row'>
                            <div class='col-sm-12'>
                                
                                <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                            </div>
                        </div><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
            
            ";
        }

        else if(strlen($content) >= 1 && strlen($post_image) >= 1){
            echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6' id='posts'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='../$student_image' class='img-circle' width = '100px'
                                height='100px' alt='student image'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                href=''>$student_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div><br>
                    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                                <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                            </div>
                        </div><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
            
            ";
        }
        else{
            echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6' id='posts'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='../$student_image' class='img-circle' width = '100px'
                                height='100px' alt='student image'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                href=''>$student_name</a></h3>
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div><br>
                    
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                                
                            </div>
                        </div><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
            
            ";
        }
        include("comments.php");
        if(!isset($_SESSION['staff_phone'])){

            echo"
            <div class='row'>
                <div class='col-md-3'>
                </div>
                <div class='col-md-6'>
                    <div class='panel panel-info'>
                        <div class='panel-body'>
                            <form action='' method='post' class='form-inline'>
                            <textarea class='pb-cmnt-textarea' name='comment' id='' placeholder='write your comment here'></textarea><br>
                            <button class='btn btn-info pull-right' name='reply'>Comment</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-md-3'>
                </div>
            </div>
        ";

        }
        
    }

    if(isset($_POST['reply'])){
        $comment = htmlentities($_POST['comment']);
        if($comment == ""){
            echo("<script>alert('Enter your comment')</script>");
            if(isset($_SESSION['student_email'])){
                echo("<script>window.open('single.php?post_id=$post_id', '_self')</script>");
            }
            else if(isset($_SESSION['admin_email'])){
                echo("<script>window.open('admin_single.php?post_id=$post_id', '_self')</script>");
            }
            else{
                echo("<script>window.open('single.php?post_id=$post_id', '_self')</script>");
            }
        }else{
    
            $insert_com = "insert into comments (post_id, student_id, comment, comment_author, comment_by, date) values
                ('$get_id', '$student_id', '$comment', '$student_com_name', '$comment_by', NOW())";
    
            $run_insert = mysqli_query($con, $insert_com);
            if($run_insert){
                echo("<script>alert('Your Comment added')</script>");
                if(isset($_SESSION['student_email'])){
                    echo("<script>window.open('single.php?post_id=$post_id', '_self')</script>");
                }
                else if(isset($_SESSION['admin_email'])){
                    echo("<script>window.open('admin_single.php?post_id=$post_id', '_self')</script>");
                }
            }
            else{
                echo("<script>alert('Error! Comment was not added')</script>");
                exit();
            }
        }
    }

}

function results(){
    global $con;

    if(isset($_GET['search'])){
        $search_query = htmlentities($_GET['user_query']);
    }
    $get_posts = "SELECT * FROM posts WHERE post_content like '%$search_query%'
        OR post_image LIKE '%$search_query%'";

    $run_posts = mysqli_query($con, $get_posts);
    if(!$run_posts){
        echo("<script>alert('Something went wrong in database!')</script>");
        exit();
    }
    $num = mysqli_num_rows($run_posts);
    if($num == 0){
        echo"
        <center><h3>Sorry! no result found for $search_query</h3></center>
        ";
    }
    else{
        while($row_posts  = mysqli_fetch_array($run_posts)){

            $post_id = $row_posts['post_id'];
            $student_id = $row_posts['student_id'];
            $content = ($row_posts['post_content']);
            $post_image = $row_posts['post_image'];
            $post_date = $row_posts['post_date'];
            $post_by = $row_posts['post_by'];
            
            if($post_by == 'student'){
                $student = "select * from students where student_id = '$student_id' AND student_posts = 'yes'";
                $run_student = mysqli_query($con, $student);

                $row_student = mysqli_fetch_array($run_student);
                $student_name = $row_student['student_name'];
                $student_image = $row_student['student_image'];
            }
            else if($post_by == 'admin'){
                $admin = "select * from admin where admin_id = '$student_id' AND admin_posts='yes'";
                $run_admin = mysqli_query($con, $admin);
                
                $row_admin = mysqli_fetch_array($run_admin);
                $student_name = $row_admin['first_name'];
                $student_image = $row_admin['admin_image'];
            }
            
            //displaying posts
    
            if($content == '' && strlen($post_image) >= 1){
                
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6' id='posts'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='../$student_image' class='img-circle' width = '100px'
                                height='100px' alt='user image'></p>
                            </div>
                            <div class='col-sm-6'>
                ";                
                            if($post_by == 'student'){
                                echo"
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                    href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                                ";
                            }
                            else if($post_by == 'admin'){
                                echo"
                                    <h3>$student_name</h3>
                                ";
                            }
                                

                echo"
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <img src='../imagepost/$post_image' id='posts-img' style='height:350px' alt=''>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
            }//end of if
    
            else if(strlen($content) >= 1 && strlen($post_image) >= 1){
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>

                ";
                            if($post_by == 'student'){
                                echo"
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                    href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                                ";
                            }
                            else if($post_by == 'admin'){
                                echo"
                                    <h3>$student_name</h3>
                                ";
                            }

                echo "
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p><h3><br>
                                <img id='posts-img' src='../imagepost/$post_image' style='height:350px;'>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
            }//end of else if
            
            else{
                echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div id='posts' class='col-sm-6'>
                        <div class='row'>
                            <div class='col-sm-2'>
                            <p><img src='../$student_image' class='img-circle' width='100px' height='100px'></p>
                            </div>
                            <div class='col-sm-6'>
                ";
                            if($post_by == 'student'){
                                echo"
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                    href='student_profile.php?stu_id=$student_id'>$student_name</a></h3>
                                ";
                            }
                            else if($post_by == 'admin'){
                                echo"
                                    <h3>$student_name</h3>
                                ";
                            }
                echo"
                                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <h3><p>$content</p></h3>
                            </div>
                        </div><br>
                        <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div><br><br>
                ";
            }//end of else
        }//end of while
    }//end of else
}//end of fnction

function search_student(){
    global $con;
    if(isset($_POST['search_student_btn'])){
        $search_query = htmlentities($_POST['search_student']);

        $get_user = "select * from students where first_name like '%$search_query%' OR last_name like '%$search_query%'
        OR student_name like '%$search_query%'";
        
        $run_user = mysqli_query($con, $get_user);
        if(!$run_user){
            echo("<script>window.alert('something wrong in database')</script>");
        }else{
            
            $num = mysqli_num_rows($run_user);
            if($num == 0){
                echo"
                    <script>alert('Sorry No User Found, use first name or last name as keyword')</script>
                ";
            }
            
            while($row_user = mysqli_fetch_array($run_user)){
                $student_id = $row_user['student_id'];
                $f_name = $row_user['first_name'];
                $l_name = $row_user['last_name'];
                $user_name = $row_user['student_name'];
                $user_image = $row_user['student_image'];
        
                echo"
                <div class='row'>
                    <div class='col-sm-2'></div>
                    <div class='col-sm-6'>
                        <div class='row' id='find_people'>
                            <div class='col-sm-4'>
                                <a href='student_profile.php?stu_id=$student_id'>
                                    <img src='../$user_image' alt='user_image' class='img-circle'
                                    width='150px' height='140px' title='$user_name' style='float:left; margin:1px'/>
                                </a>
                            </div><br><br>
                            <div class='col-sm-6'>
                                <a href='student_profile.php?stu_id=$student_id' style='text-decoration: none; cursor:pointer;
                                color:#3897f0'><strong><h2>$f_name $l_name</h2></strong></a>
                            </div>
                            <div class='col-sm-2'>
                                <a href='student_profile.php?stu_id=$student_id' style='text-decoration: none; cursor:pointer;color:#3897f0'>
                                    <button class='btn btn-danger' name='absent' type='submit'>Mark Absent</button>
                                </a><br>
                                <a href='student_profile.php?stu_id=$student_id' style='text-decoration: none; cursor:pointer;color:#3897f0'>
                                    <button class='btn btn-info' name='absent' type='submit'>Message Student</button>
                                </a><br>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        
                    </div>
                </div>
                ";
            }

        }

    }

}//end of search student

function search_staff(){
    global $con;
    if(isset($_POST['search_staff_btn'])){
        $search_query = htmlentities($_POST['search_staff']);

        $get_user = "select * from staff where first_name like '%$search_query%' OR last_name like '%$search_query%'";
        
        $run_user = mysqli_query($con, $get_user);
        if(!$run_user){
            echo("<script>window.alert('something wrong in database')</script>");
        }else{
            $num = mysqli_num_rows($run_user);
            if($num == 0){
                echo"
                <script>alert('Sorry No User Found, use first name or last name as keyword')</script>
            ";
            }
            
            while($row_user = mysqli_fetch_array($run_user)){
                $staff_id = $row_user['staff_id'];
                $f_name = $row_user['first_name'];
                $l_name = $row_user['last_name'];
                $user_name = $f_name;
                $user_image = $row_user['staff_image'];
        
                echo"
                <div class='row'>
                <div class='col-sm-2'></div>
                <div class='col-sm-6'>
                    <div class='row' id='find_people'>
                        <div class='col-sm-4'>
                            <a href='staff_profile.php?staff_id=$staff_id'>
                                <img src='../$user_image' alt='user_image' class='img-circle'
                                 width='150px' height='140px' title='$user_name' style='float:left; margin:1px'/>
                            </a>
                        </div><br><br>
                        <div class='col-sm-6'>
                            <a href='staff_profile.php?staff_id=$staff_id' style='text-decoration: none; cursor:pointer;
                            color:#3897f0'><strong><h2>$f_name $l_name</h2></strong></a>
                        </div>
                        <div class='col-sm-2'>
                            <a href='staff_profile.php?staff_id=$staff_id' style='text-decoration: none; cursor:pointer;
                            color:#3897f0'><button class='btn btn-danger'>Mark Absent</button></a>
                        </div>
                    </div>
                </div>
                <div class='col-sm-3'></div>
            </div>
                ";
            }

        }

    }
}

function search_absent(){
    global $con;
    if(isset($_POST['ab_members'])){
        
        $get_user = "select * from attendance where date=CURDATE()";
        
        $run_user = mysqli_query($con, $get_user);
        if(!$run_user){
            echo("<script>window.alert('something wrong in database')</script>");
        }else{
            $num = mysqli_num_rows($run_user);
            if($num == 0){
                echo"
                <div class='row'>
                    <div class='col-sm-1'></div>
                    <div class='col-sm-8'>
                    <h3>Sorry No Member is absent today</h3>
                    </div>
                    <div class='col-sm-2'>
                    </div>
                </div>
            ";
            }
            
            while($row_user = mysqli_fetch_array($run_user)){
                $user_id = $row_user['user_id'];
                $user_type = $row_user['user_type'];

                if($user_type == 'student'){
                    $select = "select * from students where student_id='$user_id'";
                    $run_student = mysqli_query($con, $select);

                    $row_student = mysqli_fetch_array($run_student);

                    $f_name = $row_student['first_name'];
                    $l_name = $row_student['last_name'];
                    $user_name = $row_student['student_name'];
                    $user_image = $row_student['student_image'];

                    echo"
                    <div class='row'>
                        <div class='col-sm-2'></div>
                        <div class='col-sm-6'>
                            <div class='row' id='find_people'>
                                <div class='col-sm-4'>
                                    <a href='student_profile.php?stu_id=$user_id'>
                                        <img src='../$user_image' alt='user_image' class='img-circle'
                                        width='150px' height='140px' title='$user_name' style='float:left; margin:1px'/>
                                    </a>
                                </div><br><br>
                                <div class='col-sm-6'>
                                    <a href='student_profile.php?stu_id=$user_id' style='text-decoration: none; cursor:pointer;
                                    color:#3897f0'><strong><h2>$f_name $l_name</h2></strong></a>
                                </div>
                                <div class='col-sm-2'>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-3'></div>
                    </div>
                ";
                }

                else{
                    $select = "select * from staff where staff_id='$user_id'";

                    $run_staff = mysqli_query($con, $select);

                    $row_staff = mysqli_fetch_array($run_staff);

                    $f_name = $row_staff['first_name'];
                    $l_name = $row_staff['last_name'];
                    $user_name = $f_name;
                    $user_image = $row_staff['staff_image'];


                    echo"
                    <div class='row'>
                        <div class='col-sm-2'></div>
                        <div class='col-sm-6'>
                            <div class='row' id='find_people'>
                                <div class='col-sm-4'>
                                    <a href='staff_profile.php?staff_id=$user_id'>
                                        <img src='../$user_image' alt='user_image' class='img-circle'
                                        width='150px' height='140px' title='$user_name' style='float:left; margin:1px'/>
                                    </a>
                                </div><br><br>
                                <div class='col-sm-6'>
                                    <a href='staff_profile.php?staff_id=$user_id' style='text-decoration: none; cursor:pointer;
                                    color:#3897f0'><strong><h2>$f_name $l_name</h2></strong></a>
                                </div>
                                <div class='col-sm-2'>
                                </div>
                            </div>
                        </div>
                        <div class='col-sm-3'></div>
                    </div>
                ";
                }


                
            }

        }

    }
}

function admin_show_messcomplaints(){

    global $con;
    $select = "select * from mess_complaints where complaint_type ='mess' AND reply = '' ORDER by 1 DESC LIMIT 20";
    $run_select = mysqli_query($con, $select);
    if(!$run_select){
        echo("<script>alert('Something wrong in database')</script>");
    }
    else{
        while($row_complaint = mysqli_fetch_array($run_select)){
            $complaint_id = $row_complaint['id'];
            $student_id = $row_complaint['student_id'];
            $complaint = $row_complaint['complaint'];
            $date = $row_complaint['date'];

            $select_student = "select * from students where student_id = $student_id";
            $run_student = mysqli_query($con, $select_student);
            if(!$run_student){
                echo("<script>alert('Unable to reach student database')</script>");
            }
            else{
                $row_student = mysqli_fetch_array($run_student);
                $student_first = $row_student['first_name'];
                $student_last = $row_student['last_name'];
                $student_image = $row_student['student_image'];

                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div class='col-sm-6 complaint'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='../$student_image' class='img-circle' width = '100px'
                                                height='100px' alt='user image'></p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_first $student_last</a></h3>
                                    <h4><small style='color:black;'>Complaint added on <strong>$date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-10'>
                                    <h3>$complaint</h3>
                                </div>
                            </div>
                            <a href='single_complaint.php?com_id=$complaint_id' style='float:right;'><button class='btn btn-info'>Reply</button></a><br>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div>
                    
                
                ";
            }
        }

    }
}

function admin_show_roomcomplaints(){

    global $con;
    $select = "select * from mess_complaints where complaint_type ='room' AND reply = '' ORDER by 1 DESC LIMIT 20";
    $run_select = mysqli_query($con, $select);
    if(!$run_select){
        echo("<script>alert('Something wrong in database')</script>");
    }
    else{
        while($row_complaint = mysqli_fetch_array($run_select)){
            $complaint_id = $row_complaint['id'];
            $student_id = $row_complaint['student_id'];
            $complaint = $row_complaint['complaint'];
            $date = $row_complaint['date'];

            $select_student = "select * from students where student_id = $student_id";
            $run_student = mysqli_query($con, $select_student);
            if(!$run_student){
                echo("<script>alert('Unable to reach student database')</script>");
            }
            else{
                $row_student = mysqli_fetch_array($run_student);
                $student_first = $row_student['first_name'];
                $student_last = $row_student['last_name'];
                $student_image = $row_student['student_image'];

                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div class='col-sm-6 complaint'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='../$student_image' class='img-circle' width = '100px'
                                                height='100px' alt='user image'></p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_first $student_last</a></h3>
                                    <h4><small style='color:black;'>Complaint added on <strong>$date</strong></small></h4>
                                    
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-10'>
                                    <h3>$complaint</h3>
                                </div>
                                
                            </div>
                            <a href='single_complaint.php?com_id=$complaint_id' style='float:right;'><button class='btn btn-info'>Reply</button></a><br>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div>
                    
                
                ";
            }
        }

    }
}

function admin_show_topcomplaints(){

    global $con;
    $select = "select * from mess_complaints where reply = '' ORDER by 1 DESC LIMIT 20";
    $run_select = mysqli_query($con, $select);
    if(!$run_select){
        echo("<script>alert('Something wrong in database')</script>");
    }
    else{
        while($row_complaint = mysqli_fetch_array($run_select)){
            $complaint_id = $row_complaint['id'];
            $student_id = $row_complaint['student_id'];
            $complaint = $row_complaint['complaint'];
            $date = $row_complaint['date'];

            $select_student = "select * from students where student_id = $student_id";
            $run_student = mysqli_query($con, $select_student);
            if(!$run_student){
                echo("<script>alert('Unable to reach student database')</script>");
            }
            else{
                $row_student = mysqli_fetch_array($run_student);
                $student_first = $row_student['first_name'];
                $student_last = $row_student['last_name'];
                $student_image = $row_student['student_image'];

                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div class='col-sm-6 complaint'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='../$student_image' class='img-circle' width = '100px'
                                                height='100px' alt='user image'></p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_first $student_last</a></h3>
                                    <h4><small style='color:black;'>Complaint added on <strong>$date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-10'>
                                    <h3>$complaint</h3>
                                </div>
                                
                            </div>
                            <a href='single_complaint.php?com_id=$complaint_id' style='float:right;'><button class='btn btn-info'>Reply</button></a><br>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div>
                ";
            }
        }

    }
}

function admin_show_repliedcomplaints(){

    global $con;
    $select = "select * from mess_complaints where reply != '' ORDER by 1 DESC LIMIT 20";
    $run_select = mysqli_query($con, $select);
    if(!$run_select){
        echo("<script>alert('Something wrong in database')</script>");
    }
    else{
        while($row_complaint = mysqli_fetch_array($run_select)){
            $complaint_id = $row_complaint['id'];
            $student_id = $row_complaint['student_id'];
            $complaint = $row_complaint['complaint'];
            $reply = $row_complaint['reply'];
            $date = $row_complaint['date'];

            $select_student = "select * from students where student_id = $student_id";
            $run_student = mysqli_query($con, $select_student);
            if(!$run_student){
                echo("<script>alert('Unable to reach student database')</script>");
            }
            else{
                $row_student = mysqli_fetch_array($run_student);
                $student_first = $row_student['first_name'];
                $student_last = $row_student['last_name'];
                $student_image = $row_student['student_image'];

                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div class='col-sm-6 complaint'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='../$student_image' class='img-circle' width = '100px'
                                                height='100px' alt='user image'></p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_first $student_last</a></h3>
                                    <h4><small style='color:black;'>Complaint added on <strong>$date</strong></small></h4>
                                    
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-10'>
                                    <h3>$complaint</h3>
                                </div>
                                
                            </div>
                            <a href='single_complaint.php?com_id=$complaint_id' style='float:right;'><button class='btn btn-info'>Reply</button></a><br>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div>
                ";

                if(strlen($reply) >= 1){
                    echo"
                        <div class='row'>
                            <div class='col-sm-3'>
                            </div>
                            <div class='col-sm-6 complaint'  style='background-color:lightgrey'>
                                <h2><center>Reply</center></h3>
                                <h3>$reply</h3>
                            </div>
                            <div class='col-sm-3'>
                            </div>
                        </div>
                    ";
                }
            }
        }

    }
}

function single_complaint(){
    global $con;
    if(isset($_SESSION['admin_email'])){
        global $admin_id;
    }
    else{
        global $staff_id;
    }
   

    if(isset($_GET['com_id'])){
        $com_id = ($_GET['com_id']);
        $select = "select * from mess_complaints where id = '$com_id'";
        $run_select = mysqli_query($con, $select);
        $row_complaint = mysqli_fetch_array($run_select);
        

        $complaint_id = $row_complaint['id'];
        $student_id = $row_complaint['student_id'];
        $complaint = $row_complaint['complaint'];
        $reply = $row_complaint['reply'];
        $date = $row_complaint['date'];

        

        $select_student = "select * from students where student_id = $student_id";
        $run_student = mysqli_query($con, $select_student);
        if(!$run_student){
            echo("<script>alert('Unable to reach student database')</script>");
        }
        else{
            $row_student = mysqli_fetch_array($run_student);
            $student_first = $row_student['first_name'];
            $student_last = $row_student['last_name'];
            $student_image = $row_student['student_image'];


            echo"
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-6 complaint'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <p><img src='../$student_image' class='img-circle' width = '100px'
                                            height='100px' alt='user image'></p>
                            </div>
                            <div class='col-sm-6'>
                                <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                    href='student_profile.php?stu_id=$student_id'>$student_first $student_last</a></h3>
                                <h4><small style='color:black;'>Complaint added on <strong>$date</strong></small></h4>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                        
                        <div class='row'>
                            <div class='col-sm-2'>
                            </div>
                            <div class='col-sm-10'>
                                <h3>$complaint</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                </div>
            ";

            if(strlen($reply) >= 1){
                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div class='col-sm-6 complaint'  style='background-color:lightgrey'>
                            <h2><center>Reply</center></h3>
                            <h3>$reply</h3>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div>
                ";
            }
            echo "
                <div class='row'>
                    <div class='col-sm-3'>
                    </div>
                    <div class='col-sm-8'>
                        <div class='row'>
                            <form action='' method='post'>
                                <label for='reply' style='color:grey; font-size:18px'>Reply:
                                    <textarea name='reply' class='form-control' placeholder='Reply Here' cols='100' rows='5' ></textarea>
                                </label>
                                <button class='btn btn-info' name='submit_rep'>Reply</button>
                            </form>
                        </div>
                    </div>
                    <div class='col-sm-1'>
                    </div>
                </div>
            ";

            if(isset($_POST['submit_rep'])){
                $reply = $_POST['reply'];
                
                $update = "update mess_complaints set reply = '$reply' where id='$com_id'";
                $run_update = mysqli_query($con, $update);
                if(!$run_update){
                    echo("<script>alert('Unable to reply, Something wrong in the database')</script>");
                }
                else{
                    echo("<script>alert('Reply added')</script>");
                    if($_SESSION['admin_email']){
                        echo("<script>window.open('admin_complaints.php?adm_id=$admin_id', '_self')</script>");
                    }
                    else{
                        echo("<script>window.open('staff_complaints.php?staff_id=$staff_id', '_self')</script>");
                    }
                    
                }
            }
        }
    }
}

function get_complaints_for_staff($type){
    global $con;

    if($type == 'mess'){
        $consider = 'mess';
    }
    else{
        $consider = 'room';
    }
    $select = "select * from mess_complaints where complaint_type ='$consider' ORDER by 1 DESC LIMIT 20";
    $run_select = mysqli_query($con, $select);
    if(!$run_select){
        echo("<script>alert('something wrong in database')</script>");
    }
    else{
        while($row_complaint = mysqli_fetch_array($run_select)){
            $complaint_id = $row_complaint['id'];
            $student_id = $row_complaint['student_id'];
            $complaint = $row_complaint['complaint'];
            $date = $row_complaint['date'];

            $select_student = "select * from students where student_id = $student_id";
            $run_student = mysqli_query($con, $select_student);
            if(!$run_student){
                echo("<script>alert('Unable to reach student database')</script>");
            }
            else{
                $row_student = mysqli_fetch_array($run_student);
                $student_first = $row_student['first_name'];
                $student_last = $row_student['last_name'];
                $student_image = $row_student['student_image'];

                echo"
                    <div class='row'>
                        <div class='col-sm-3'>
                        </div>
                        <div class='col-sm-6 complaint'>
                            <div class='row'>
                                <div class='col-sm-2'>
                                    <p><img src='../$student_image' class='img-circle' width = '100px'
                                                height='100px' alt='user image'></p>
                                </div>
                                <div class='col-sm-6'>
                                    <h3><a style='text-decoration:none ; cursor:pointer; color: #3897f0;'
                                        href='student_profile.php?stu_id=$student_id'>$student_first $student_last</a></h3>
                                    <h4><small style='color:black;'>Complaint added on <strong>$date</strong></small></h4>
                                </div>
                                <div class='col-sm-4'>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-sm-2'>
                                </div>
                                <div class='col-sm-10'>
                                    <h3>$complaint</h3>
                                </div>
                                
                            </div>
                            <a href='single_complaint.php?com_id=$complaint_id' style='float:right;'><button class='btn btn-info'>Reply</button></a><br>
                        </div>
                        <div class='col-sm-3'>
                        </div>
                    </div>
                ";
            }
        }
    }
}

?>


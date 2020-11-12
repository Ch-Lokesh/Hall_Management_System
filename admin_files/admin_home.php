<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['admin_email'])){
    include("../config/admin_header.php");
}

if(!isset($_SESSION['admin_email'])){
    header("location:../index.php");
}
?>

<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
    </head>
    <style>
        body{
            background-image: url('../images/MegaTron.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
        }
    </style>
    <body>
       <div class="row">
           <div class="col-sm-12" id="insert_post">
               <center>
                <form action='admin_home.php?adm_id=<?php echo($admin_id); ?>' method='post'
                id="f" enctype="multipart/form-data">
                    <textarea name="content" id="content" rows="4" class="form-control" 
                    placeholder="Add a Post"></textarea><br><br>
                    <label class="btn btn-warning" id="upload_image_button">Select Image
                        <input type="file" name="post_image" size="60"></label>
                    <br><br>
                    <button id="btn-post" name="sub">Post</button>
                </form>
                <?php insertadmPost(); ?>
               </center>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12">
               <center>
                   <h2><strong>News Feed</strong></h2>
               </center>
               <?php echo get_posts() ?>
           </div>
       </div>
    </body>
</html>
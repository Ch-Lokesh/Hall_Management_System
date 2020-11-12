<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['student_email'])){
    include("../config/student_header.php");
    include("../variables/string_variables.php");
}

if(!isset($_SESSION['student_email'])){
    header("location:../index.php");
}
?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale = 1.0">
        <title>Payment</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        body{
            background-image: url('../images/MegaTron.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            overflow-x: hidden;
        }

        .pay{
            margin:20px auto;
            font-size: 23px;
            width:50%;
            height: 6rem;
            border:3px solid violet;
            border-radius:2rem;
            background-color: lightgreen;
        }
        .center{
            transform: translateY(40%);
        }
    </style>
<?php
    $student_id = $_GET['stu_id'];
    $select = "select * from attendance where user_id='$student_id' and user_type='student'";
    $run_student = mysqli_query($con, $select);
    
    $num = mysqli_num_rows($run_student);
    
    
    for($i = 0; $i <= 12; $i++){
        $values[$i] = 0;
    }

    while($row_student = mysqli_fetch_array($run_student)){
        $date = $row_student['date'];
        $month = substr($date, 5, 2);
        $int = (int)$month;
        $values[$int-1]++;
    }
    
?>
    <body>
       <div class="row">
           <div class="col-sm-12">
               <center><h2>Mess Fee Payment</h2></center>
           </div>
       </div><br>
       <div class="row">
           <div class="col-sm-5">
                <div id="chartContainer" style="height: 70vh; width: 100%; margin:20px"></div>
            </div>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
                <?php
                    $total = 0;
                    for($i = 0; $i < 12 ; $i++){
                        $total += $values[$i];
                    }
                    $date1 = strtotime("2019-07-20");
                    $date2 = date('Y-m-d');
                    $date2 = strtotime($date2);
                    $diff = $date2 - $date1;
                    $diff_ab = abs(round($diff / 86400));
                    $amount = $diff_ab * $daily_mess_price;
                    // $total_working = $diff->format("%a");
                    echo"
                        <center style='font-size:25px'><strong>Total absent days : &nbsp;</strong>$total</center><br>
                        <center style='font-size:25px'><strong>Total Working days : &nbsp;</strong>$diff_ab</center><br>
                        <center style='font-size:25px'><strong>Charges per each day : &nbsp;</strong>$daily_mess_price</center><br>

                        <div class='pay'>
                            <center class='center'>Total Amount : $amount</center>
                        </div>
                    ";
                ?>
                
            </div>
            <div class="col-sm-1">
            </div>
           </div>
       </div>
       <?php include("../config/footer.php") ?>
    </body>
</html>


<script type="text/javascript">
  window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
    theme: "dark2", // "light1", "light2", "dark1", "dark2"
    
	title:{
        text: "number of absent days in each month",
        titleFontSize:20,
	},
	axisY: {
        title: "Days",
        labelFontSize: 20,
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Months",
		dataPoints: [      
			
			{ y: <?php echo((int)$values[0]); ?>,  label: "January" },
            { y: <?php echo((int)$values[1]); ?>,  label: "February" },
            { y: <?php echo((int)$values[2]); ?>,  label: "March" },
            { y: <?php echo((int)$values[3]); ?>,  label: "April" },
            { y: <?php echo((int)$values[4]); ?>,  label: "May" },
            { y: <?php echo((int)$values[5]); ?>,  label: "June" },
            { y: <?php echo((int)$values[6]); ?>, label: "July" },
			{ y: <?php echo((int)$values[7]); ?>,  label: "August" },
			{ y: <?php echo((int)$values[8]); ?>,  label: "September" },
			{ y: <?php echo((int)$values[9]); ?>,  label: "October" },
			{ y: <?php echo((int)$values[10]); ?>,  label: "November" },
			{ y: <?php echo((int)$values[11]); ?>, label: "December" },
		]
	}]
});
chart.render();

}
</script>
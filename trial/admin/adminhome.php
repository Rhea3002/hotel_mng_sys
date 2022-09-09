<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<!--Store data in sxl files-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <!-- <link href="assets/css/font-awesome.css" rel="stylesheet" /> -->
    <!-- Morris Chart Styles-->
    <!-- <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" /> -->
    <!-- Custom Styles-->
    <!-- <link href="assets/css/custom-styles.css" rel="stylesheet" /> -->
    <!-- Google Fonts-->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />  -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }

        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }
    </script>

</head>

<body>
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="usersetting.php" class="w3-bar-item w3-button">User Profile</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
    <div class="w3-container w3-teal">
        <button class="w3-button w3-teal w3-xlarge w3-right fa" style="font-size:24px" onclick="openRightMenu()">&#xf2bd;</button>
        <h1>ADMIN</h1>
    </div>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
        <a  class="active-menu w3-bar-item w3-button" href="adminhome.php" >Status</a>
        <a href="roombook.php" class="w3-bar-item w3-button">Room Booking</a>
        <a href="payment.php" class="w3-bar-item w3-button">Payment</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>

    <!-- Page Content -->
    <div style="margin-left:25%">
        <div class="w3-container">
            <div id="page-wrapper">
                <div id="page-inner">


                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="page-header">
                                Status <small>Room Booking </small>
                            </h1>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <?php
                    include('db.php');
                    $sql = "select * from roombook";
                    $re = mysqli_query($con, $sql);
                    $c = 0;
                    while ($row = mysqli_fetch_array($re)) {
                        $new = $row['stat'];
                        $cin = $row['cin'];
                        $id = $row['id'];
                        if ($new == "Not Confirm") {
                            $c = $c + 1;
                        }
                    }

                    ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">

                                </div>
                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">

                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        <button class="btn btn-default" type="button">
                                                            New Room Bookings <span class="badge"><?php echo $c; ?></span>
                                                        </button>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                                <div class="panel-body">
                                                    <div class="panel panel-default">

                                                        <div class="panel-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Email</th>
                                                                            <th>Country</th>
                                                                            <th>Room</th>
                                                                            <th>Bedding</th>
                                                                            <th>Meal</th>
                                                                            <th>Check In</th>
                                                                            <th>Check Out</th>
                                                                            <th>Status</th>
                                                                            <th>More</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                <?php
                                $tsql = "select * from roombook";
                                $tre = mysqli_query($con, $tsql);
                                while ($trow = mysqli_fetch_array($tre)) {
                                    $co = $trow['stat'];
                                    if ($co == "Not Confirm") {
                                        echo "<tr>
												<th>" . $trow['id'] . "</th>
												<th>" . $trow['FName'] . " " . $trow['LName'] . "</th>
												<th>" . $trow['Email'] . "</th>
												<th>" . $trow['Country'] . "</th>
												<th>" . $trow['TRoom'] . "</th>
												<th>" . $trow['Bed'] . "</th>
												<th>" . $trow['Meal'] . "</th>
												<th>" . $trow['cin'] . "</th>
												<th>" . $trow['cout'] . "</th>
												<th>" . $trow['stat'] . "</th>
												
												<th><a href='roombook.php?rid=" . $trow['id'] . " ' class='btn btn-primary'>Action</a></th>
												</tr>";
                                                                            }
                                                                        }
                                                                        ?>

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End  Basic Table  -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php

                                        $rsql = "SELECT * FROM `roombook`";
                                        $rre = mysqli_query($con, $rsql);
                                        $r = 0;
                                        while ($row = mysqli_fetch_array($rre)) {
                                            $br = $row['stat'];
                                            if ($br == "Confirm") {
                                                $r = $r + 1;
                                            }
                                        }

                                        ?>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                                        <button class="btn btn-primary" type="button">
                                                            Booked Rooms <span class="badge"><?php echo $r; ?></span>
                                                        </button>

                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                                <div class="panel-body">
                                                    <?php
                                                    $msql = "SELECT * FROM `roombook`";
                                                    $mre = mysqli_query($con, $msql);

                                                    while ($mrow = mysqli_fetch_array($mre)) {
                                                        $br = $mrow['stat'];
                                                        if ($br == "Confirm") {
                                                            $fid = $mrow['id'];

                                                            echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>" . $mrow['FName'] . "</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=show.php?sid=" . $fid . "><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Show
													</button></a>
															" . $mrow['TRoom'] . "
														</div>
													</div>	
											</div>";
                                                        }
                                                    }
                                                    ?>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>

</html>
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
        <a class="active-menu w3-bar-item w3-button" href="adminhome.php">Status</a>
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
                                Payment Details<small> </small>
                            </h1>
                        </div>
                    </div>
                    <!-- /. ROW  -->


                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Room type</th>
                                                    <th>Bed Type</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>No of Room</th>
                                                    <th>Meal Type</th>

                                                    <th>Room Rent</th>
                                                    <th>Bed Rent</th>
                                                    <th>Meals </th>
                                                    <th>Gr.Total</th>
                                                    <th>Print</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                include('db.php');
                                                $sql = "select * from payment";
                                                $re = mysqli_query($con, $sql);
                                                while ($row = mysqli_fetch_array($re)) {

                                                    $id = $row['id'];

                                                    if ($id % 2 == 1) {
                                                        echo "<tr class='gradeC'>
													<td>" . $row['title'] . " " . $row['fname'] . " " . $row['lname'] . "</td>
													<td>" . $row['troom'] . "</td>
													<td>" . $row['tbed'] . "</td>
													<td>" . $row['cin'] . "</td>
													<td>" . $row['cout'] . "</td>
													<td>" . $row['nroom'] . "</td>
													<td>" . $row['meal'] . "</td>
													
													<td>" . $row['ttot'] . "</td>
													<td>" . $row['mepr'] . "</td>
													<td>" . $row['btot'] . "</td>
													<td>" . $row['fintot'] . "</td>
													<td><a href=print.php?pid=" . $id . " <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
													</tr>";
                                                    } else {
                                                        echo "<tr class='gradeU'>
													<td>" . $row['title'] . " " . $row['fname'] . " " . $row['lname'] . "</td>
													<td>" . $row['troom'] . "</td>
													<td>" . $row['tbed'] . "</td>
													<td>" . $row['cin'] . "</td>
													<td>" . $row['cout'] . "</td>
													<td>" . $row['nroom'] . "</td>
													<td>" . $row['meal'] . "</td>
													
													<td>" . $row['ttot'] . "</td>
													<td>" . $row['mepr'] . "</td>
													<td>" . $row['btot'] . "</td>
													<td>" . $row['fintot'] . "</td>
													<td><a href=print.php?pid=" . $id . " <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
													</tr>";
                                                    }
                                                }

                                                ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                    <!-- /. ROW  -->
                </div>
            </div>
        </div>
    </div>
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>

</html>
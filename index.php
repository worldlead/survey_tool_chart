<?php
require_once "db_functions.php";
$conn = connectDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey Tool | Land Auction</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head>

<body class="app">

    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-5">
                        <h1 class="app-page-title">Survey</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="survey_chart.php" class="btn btn-info" style="float: right;">Go to Survey Charts</a>
                    </div>
                </div>

               
                <hr class="mb-4">
           
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-4">
                        <h3 class="section-title">Survey Taker</h3>
                        <div class="section-intro">Select email addresses to which you are going to send surveys</div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                <?php 
                                $sql = "Select * from users";
                                $result = $conn->query($sql);
                                $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <form class="settings-form" method="post" action="send_url.php">

                                    <?php
                                    foreach ($rows as $row) {
                                    ?>
                                    <div class="form-check mb-3">
                                        <div class="row">
                                            <input class="form-check-input" type="checkbox" name="checkbox_values[]" value="<?php echo $row['email']; ?>" id="settings-checkbox-1">
                                            <div class="col-5">
                                                <label class="form-check-label" for="emailOfTaker">
                                                    <?php echo $row['email']; ?>
                                                </label>
                                            </div>
                                            <div class="col-5">
                                                <label class="form-check-label" for="nameOfTaker">
                                                    <?php echo $row['firstname'] ." ". $row['lastname']; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div><!--//form-check-->
                                    <?php } ?>
                                    <label class="form-label" for="podio_link">Podio Link</label>
                                    <?php 
                                    $sql = "Select * from podio";
                                    $result = $conn->query($sql);
                                    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <Select name="podio_link" id="podio_link" class="form-control">
                                        <?php 
                                            foreach($rows as $row) {
                                                echo "<option value='".$row['podio_link']."'>".$row['podio_link']."</p>";
                                            }
                                        ?>
                                    </Select>
                                    <div class="mt-3">
                                        <button type="submit" class="btn app-btn-primary" name="send_url" value="send_url">Send Survey</button>
                                    </div>
                                </form>
                            </div><!--//app-card-body-->
                        </div><!--//app-card-->
                    </div>
                </div><!--//row-->
            </div><!--//container-fluid-->
        </div><!--//app-content-->
    </div><!--//app-wrapper-->


    <!-- Javascript -->
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>

</body>

</html>
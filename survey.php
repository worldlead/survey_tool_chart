<?php

require_once "db_functions.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>

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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">

                <div class="text-center">
                    <h5 class="h5 font-weight-normal text-muted mt-3">Attend the survey</h5>
                </div>
                <?php if (isset($_GET['validator'])) { ?>

                    <form class="form-auth" action="survey_store.php" method="post">

                        <?php
                        insert_csrf_token();
                        $validator = $_GET['validator'];
                        ?>

                        <input type="hidden" name="validator" value="<?php echo $validator; ?>">

                        <!-- Champs du formulaire -->
                        <label class="form-label">Buy Price</label>
                        <div class="form-group m-3">
                            <input type="text" id="buy_price" name="buy_price" class="form-control" placeholder="">
                        </div>
                        <label class="form-label">Sale Price</label>
                        <div class="form-group m-3">
                            <input type="text" id="sell_price" name="sell_price" class="form-control" placeholder="">
                        </div>
                        <label class="form-label">Notes</label>
                        <div class="form-group m-3">
                            <input type="text" id="notes" name="notes" class="form-control" placeholder="">
                        </div>

                        <!-- Bouton de soumission -->
                        <button class="btn btn-primary btn-block m-5" type="submit" value="surveysubmit" name="surveysubmit">
                            submit
                        </button>

                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=site_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <title><?=$page_title?></title>
</head>

<body>

    <nav class="navbar navbar-dark bg-primary shadow-sm">
        <div class="container">

            <a class="navbar-brand" href="http://localhost/offlinewallet/index.php">
                <img src="assets/images/smboost.png" alt="" width="75" height="45"
                    class="d-inline-block align-text-top">
                SM-Boost
            </a>

            <button class="career-btn">
                <a href="http://localhost/offlinewallet/SM-Booster/earn.php">Task/Earn</a></button>


            <div class="btn">
                <button class="career-btn">
                    <a href="http://localhost/offlinewallet/SM-Booster/about.php">About</a>
                </button>
            </div>

            <div class="btn">
                <button class="career-btn">
                    <a href="http://localhost/offlinewallet/SM-Booster/plans.php">Boost</a></button>
            </div>

            <?php
if(isset($_SESSION['Auth'])){ ?>
            <div class="">
                <a class="btn btn-sm btn-dark" href="assets/php/process.php?logout">Logout</a>

            </div>
            <?php
}else{
  ?>
            <div class="">
                <a class="btn btn-sm btn-dark" href="?login">Login</a>
                &nbsp;&nbsp;
                <a class="btn btn-sm btn-dark" href="?signup">Signup</a>
            </div>
            <?php
}
    ?>

        </div>
    </nav>
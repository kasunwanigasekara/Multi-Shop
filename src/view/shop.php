<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

</head>

<body>
<?php  require_once __DIR__.'/../../public/header.php'; ?>

    <div class="container-fluid">
        <div class="row px-xl-5">

            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                 <?php   echo $appendProducts; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
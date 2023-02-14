<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">


</head>

<body>
       <?php  require_once __DIR__.'/../../public/header.php'; ?>

    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th><a href="action.php?addnew=1" target="_blank" ><img src="img/icons/addnew.png" width="100" height="60"/></a></th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Remove</th>
                            <th>Edit</th>
                        </tr>
                    </thead>

                    <tbody class="align-middle">
                        <tr>
                            <?php
                           echo $appendProducts
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>

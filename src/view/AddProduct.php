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

    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-4 mb-30">

                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="img/temp.jpg" >
                        </div>
                    </div>
                </div>

                <div>
                    <form action="action.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <button class="btn btn-primary py-2 px-5" type="submit" name="tmpImgSubmit" id="tmpImgSubmit">Upload Image</button>
                    </form>
                  
                </div> 
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="addFrm" id="addFrm" method="post" action="action.php">
                    Product Code
                        <div class="control-group">
                            <input type="text" required class="form-control number" name="productCode"  id="productCode" value="" maxlength="5"/>
                        </div>
                        Product Name
                        <div class="control-group">
                            <input type="text" required class="form-control" name="productName"  id="productName" value=""/>
                        </div>
                        Product Price($)
                        <div class="control-group">
                            <input type="text" required class="form-control float" name="price"  id="price" value=""/>
                        </div>
                        Product Quantity
                        <div class="control-group">
                            <input type="text" required class="form-control number" name="stock"  id="stock" value="" />
                            <input type="hidden" value="0" name="addnew" id="addnew"/>
                        </div>
                        
                        <br>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Add Product</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="public/lib/easing/easing.min.js"></script>
<script src="public/lib/owlcarousel/owl.carousel.min.js"></script>


<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>


<script src="js/main.js"></script>
<script src="js/actions.js"></script>
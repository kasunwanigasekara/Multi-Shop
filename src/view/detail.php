<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <title>MultiShop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

</head>

<body>

    <?php  require_once __DIR__.'/../../public/header.php'; ?>

<?php foreach($this->fetchProducts as $data) {?>
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-4 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="<?php echo $data['imagePath'] ?>" alt="Image">
                        </div>
                    </div>
                </div>
              <!--  <div>
                   <button class="btn btn-primary py-2 px-5" type="submit" id="sendMessageButton">Add new Image</button>
                </div> -->
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <form name="updateFrm" id="updateFrm" method="post" action="action.php">

                        Product code
                        <div class="control-group">
                            <input type="text" class="form-control" name="product_id" id="product_id" value="<?php echo $data['productId'] ?>" readonly/>
                        </div>
                        Product Name
                        <div class="control-group">
                            <input type="text" class="form-control" name="productName"  id="productName" value="<?php echo $data['productName']  ?>"/>
                        </div>
                        Product Price($)
                        <div class="control-group">
                            <input type="text" class="form-control float" onkeyup="CheckDecimal(this.value)" name="price"  id="price" value="<?php echo $data['price']  ?>"/>
                        </div>
                        Product Quantity
                        <div class="control-group">
                            <input type="text" class="form-control number" name="stock"  id="stock" value="<?php echo $data['stock']  ?>" />
                            <input type="hidden" value="0" name="edited" id="edite"/>
                        </div>
                        
                        <br>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Finish Update</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>

    </div>
    <?php } ?>

</body>

</html>



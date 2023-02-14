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

  <form method="post" action="action.php">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Details</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">

                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input required class="form-control" type="text" placeholder="John" name="fname" id="fname">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input required class="form-control" type="text" placeholder="Doe" name="lname" id="lname">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" style="background-color:<?php echo $this->err_clr_eml ?>;" placeholder="example@email.com" value="<?php echo $this->err_eml ?>" name="email" id="email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" style="background-color:<?php echo $this->err_clr ?>;" type="text" placeholder="94712124683" value="<?php echo $this->err_pho ?>" name="tp" id="tp">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input required class="form-control" type="text" placeholder="123 Street" name="adr1" id="adr1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street" name="adr2" id="adr2">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select required class="custom-select" name="cntry" id="cntry">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input required class="form-control" type="text" placeholder="New York" name="city" id="city">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York" name="state" id="state">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input required class="form-control" type="text"  name="zip" id="zip">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php 
                            $count=$_POST['count'];
    
                            for($x=1;$x<=$count;$x++)   
                             {
    
                                $product_id=$_POST['p_id'.$x];
                                $qty=$_POST['qty'.$x];
                                ?>
                                <div class="d-flex justify-content-between">
                                    <p><?php echo $_POST['p_name'.$x] ?></p>
                                    <p><?php echo $_POST['tot'.$x] ?></p>
                                </div>
                              <input type="hidden" name="p_id<?php echo $x ?>" value="<?php echo $product_id ?>"/>
                              <input type="hidden" name="qty<?php echo $x ?>" value="<?php echo $qty ?>"/>
                              <input type="hidden" name="count" value="<?php echo $count ?>"/>
                              <input type="hidden" name="p_name<?php echo $x ?>" value="<?php echo $_POST['p_name'.$x] ?>"/>
                              <input type="hidden" name="tot<?php echo $x ?>" value="<?php echo $_POST['tot'.$x] ?>"/>
                              <input type="hidden" name="s_id" value="<?php echo $_POST['s_id'] ?>"/>    
                              
                            <?php  
                            }
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><?php echo $_POST['subtot'] ;?></h6>
                            <input type="hidden" name="subtot" value="<?php echo $_POST['subtot'] ?>"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$30</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?php echo $_POST['ftot'] ;?></h5>
                            <input type="hidden" name="ftot" value="<?php echo $_POST['ftot'] ?>"/>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input checked type="radio" class="custom-control-input" value="10" name="payment" id="card">
                                <label class="custom-control-label" for="card">Credit Card</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="30" name="payment" id="bank">
                                <label class="custom-control-label" for="bank">Bank Transfer</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" value="20" name="payment" id="cod">
                                <label class="custom-control-label" for="cod">Cash On Delivery</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit" value="viewOrder" name="viewOrder">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>




</body>

</html>
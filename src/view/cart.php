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
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php 
                        

                        if(isset($_GET['product_id']) and !isset($_GET['editCart']))    
                        $Cart->addToCart(session_id(),$_GET['product_id']);

                        $this->cartData=$Cart->fetchCart();   
                        
                        if(($this->count=count($this->cartData))>0 )
                        {
                        $x=1;
                        foreach($this->cartData as $products) 
                        
                        {?>
                        <form method="post" name="frmcrt" id="frmcrt" action="action.php"   onsubmit="return confirm('Are you sure you want to proceed?')">
                        <tr>
                            <td class="align-middle"><img src="" alt="" style="width: 50px;"> <?php echo $products['productName']; ?></td>
                            <td class="align-middle" >
                                <div class="input-group quantity mx-auto" style="width: 100px;"> 
                                    $<input id="price<?php echo $x; ?>" name="price<?php echo $x; ?>" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $products['price']; ?>" readonly> 
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    $<input id="qty<?php echo $x ?>" name="qty<?php echo $x; ?>" onkeyup="gettotal(this.id)" type="text" class=" number form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $products['qty']; ?>"> 
                                </div>
                            </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    $<input id="tot<?php echo $x ; ?>" name="tot<?php echo $x; ?>" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo ($products['qty']*$products['price']); ?>" readonly> 
                                </div>
                            </td>

                            <td class="align-middle">
                                <button type="button" value=" <?php echo $products['productId']; ?>" class="btn btn-sm btn-danger" name="editCart<?php echo $x ; ?>" id="editCart<?php echo $x ; ?>" onclick="editCart(this.value)"><i class="fa fa-times"></i></button>
                            </td>

                            <input type="hidden" id="stock" name="stock" value="<?php echo $products['Stock']; ?>">
                            <input type="hidden" id="p_id<?php echo $x ; ?>" name="p_id<?php echo $x ; ?>" value="<?php echo $products['productId']; ?>">
                            <input type="hidden" id="s_id" name="s_id" value="<?php echo session_id(); ?>">
                            <input type="hidden" id="count" name="count" value="<?php echo $this->count; ?>"> 
                            <input type="hidden" id="p_name<?php echo $x ; ?>" name="p_name<?php echo $x ; ?>" value="<?php  echo $products['productName']; ?>">   
                        </tr
                        <?php  
                            $x++;
                            $this->subTot=$this->subTot+($products['qty']*$products['price']);
                        
                            } 

                        }
                        
                        ?>


                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input id="subtot" name="subtot" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $this->subTot; ?>" readonly>
                            </div> 
                        </div>    
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input id="ship" name="tot" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="$30" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-3">
                            <h5>Total $</h5>
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input id="ftot" name="ftot" type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $this->subTot+30; ?>" readonly>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="submit" name="submitcart" id="submitcart">Proceed To Checkout</button>
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
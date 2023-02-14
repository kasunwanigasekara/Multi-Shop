<?php

namespace Multishop\controller;
use Multishop\model\manageProducts;
use Multishop\controller\FileUpload;
use Multishop\controller\cart;
use Multishop\controller\product;
use Multishop\model\manageCart;
use Multishop\controller\validate;
use Multishop\model\manageOrders;

class PageLoad
{

    private array   $fetchProducts;
    private array   $fetchProduct;
    private int     $product_id;
    private string  $product_name;
    private float   $product_price;
    private int     $product_stock; 
    private array   $cartData; 
    private          $count; 
    private string  $sessionId; 
    private float   $subTot=0;
    public string   $err_pho='';
    public string   $err_clr='#fff';
    public string   $err_eml='';
    public string   $err_clr_eml='#fff';
    public array    $orderData=[];
  
    public function viewHome()
    {
        $appendProducts="";
        $x=0;
        
        $data=new manageProducts();
        $this->fetchProducts=$data->fetchAllProducts();

        foreach($this->fetchProducts as $products)
        { 
          /*to Show only 8 products in home page */ 
            if($x==8)
            break;

        $appendProducts.='<div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src='.$products['imagePath'].' alt="">
                                <div class="product-action">
                                 <!--   <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>-->

                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">'.$products['productName'].'</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$'.$products['price'].'</h5><h6 class="text-muted ml-2"></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $x++;
        };

         $home = require_once __DIR__ . '/../View/home.php';

         return $home;
    }



    public function viewManage()
    {
        if(isset($_GET['product_id']))
        {
            $pid	=filter_input(INPUT_GET,'product_id');     

            $del=new manageProducts();
            $del->deleteProduct($pid);
        }

        if(isset($_POST['edited']) and ($_POST['edited']==0))
        {
            $del=new manageProducts();

            $pid	=filter_input(INPUT_POST,'product_id');
			$pname	=filter_input(INPUT_POST,'productName');
			$pprice	=filter_input(INPUT_POST,'price');
			$pstock	=filter_input(INPUT_POST,'stock');

            

            $del->updateProduct($pid,$pname,$pprice,$pstock);
        }


        $appendProducts="";
        
        $data=new manageProducts();
        $this->fetchProducts=$data->fetchAllProducts();

        foreach($this->fetchProducts as $products)
        {
        $appendProducts.='<tr>
        <td class="align-middle"></td>
        <td class="align-middle">
        <input type="hidden" id="id" name="id" value="'.$products['productId'].'"/>
        <img src='.$products['imagePath'].' alt="" style="width: 50px;"> '.$products['productName'].'</td>
        <td class="align-middle">$'.$products['price'].'</td>
        <td class="align-middle">
            <div class="input-group quantity mx-auto" style="width: 100px;">
                <div class="input-group-btn">
                </div>
                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value='.$products['stock'].' readonly>
                <div class="input-group-btn">
                </div>
            </div>
        </td>
        <td class="align-middle"><button type="button" value="'.$products['productId'].'" onclick="getIdManage(this.value)" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
        <td class="align-middle"><button type="button" value="'.$products['productId'].'" onclick="getIdDetails(this.value)" class="btn btn-sm "><img src="img/icons/edit.png" width="40" height="40"></button></td>
    </tr>';
        };

         $manage = require_once __DIR__ . '/../View/manageProduct.php';

         return $manage;
    }


    public function viewDetails()
    {
        $data=new manageProducts();
        $this->fetchProducts=$data->fetchProduct($_GET['product_id']);       
        
         $details = require_once __DIR__ . '/../View/detail.php';
         return $details;
    }

    public function viewAddNew()
    {
        $data=new manageProducts();
        
        
        if(isset($_POST['addnew']) and $_POST['addnew']==0 )
        {
    
           $this->product_id=filter_input(INPUT_POST,'productCode');
           $this->product_name=filter_input(INPUT_POST,'productName');
           $this->product_price=filter_input(INPUT_POST,'price');
           $this->product_stock=filter_input(INPUT_POST,'stock');

           $data->addProduct($this->product_id,$this->product_name,$this->product_price,$this->product_stock);

        }

        if(isset($_POST['tmpImgSubmit']))
        {
            $temp_upload=new FileUpload('img/','temp.jpg'); 
            $temp_upload->tmpImgUpload(); 
        }
        else
        {
            $remove_temp=new FileUpload('img/','temp.jpg');  
            $remove_temp->unlinktmpimg();
        }

        
         $details = require_once __DIR__ . '/../View/AddProduct.php';
         return $details;
    }



    public function viewShop()
    {
        $appendProducts="";
        $data=new manageProducts();
        $this->fetchProducts=$data->fetchAllProducts();

        foreach($this->fetchProducts as $products)
        {
        $appendProducts.='<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
        <div class="product-item bg-light mb-4">
            <div class="product-img position-relative overflow-hidden">
                <img class="img-fluid w-100" src="'.$products['imagePath'].'" alt="">
                <div class="product-action">
                    <button value="'.$products['productId'].'" onclick="getIdcart(this.value)"> <img src="img/icons/cart.png" width="40" height="40"></button>
                </div>
            </div>
            <div class="text-center py-4">
                <a class="h6 text-decoration-none text-truncate" href="">'.$products['productName'].'</a>
                <div class="d-flex align-items-center justify-content-center mt-2">
                    <h5>$'.$products['price'].'</h5><h6 class="text-muted ml-2"></h6>
                </div>
            </div>
        </div>
    </div>';
        };

         $details = require_once __DIR__ . '/../View/shop.php';
         return $details;
    }

    public function viewCart()
    {   
         if(isset($_GET['cart']))
         {
            $Cart= new manageCart(); 

           if(isset($_GET['editCart']))
            {
                $this->sessionId=$_GET['s_id'];
                $this->product_id=$_GET['product_id'];
                $editCart= new manageCart();
                $editCart->deleteFromCart($this->product_id,$this->sessionId);


            }

         }

         $details = require_once __DIR__ . '/../View/cart.php';
         return $details;
    }

    public function viewCheckOut()
    {

        $updatehcart= new manageCart();
        $updatehcart->flushCart($_POST['s_id']);

        $updatehcart->updateCart();

         $details = require_once __DIR__ . '/../View/checkout.php';
         return $details;

         
    }

    public function viewOrders()
    {
 

        if(isset($_POST['viewOrder']))
            {
                $neworder=new manageCart();
                $validate= new validate();

                $phoNo=$validate->checkPhoneNo($_POST['tp']);
                $email=$validate->checkEmail($_POST['email']);

                if($phoNo==0 and $email==0 )
                {
                    $this->err_pho="Invalid Phone Number..,Please check and Re-enter";
                    $this->err_clr='#f0847d'; 

                    $this->err_eml="Invalid email format..,Please check and Re-enter";
                    $this->err_clr_eml='#f0847d';

                    require_once __DIR__ . '/../View/checkout.php';  
                    exit();
                    
                }

                if($email==0)
                {
                    $this->err_eml="Invalid email format..,Please check and Re-enter";
                    $this->err_clr_eml='#f0847d';
                    require_once __DIR__ . '/../View/checkout.php';  
                    exit();
                }

                if($phoNo==0)
                {
                    $this->err_pho="Invalid Phone Number..,Please check and Re-enter";
                    $this->err_clr='#f0847d'; 
                    require_once __DIR__ . '/../View/checkout.php';  
                    exit();
                }


                $neworder->submitOrder();

                $neworder->flushCart($_POST['s_id']);


                $fetchOrderData=new manageOrders();
                $this->orderData=$fetchOrderData->fetchOrders();


            }

            

         $details = require_once __DIR__ . '/../View/orderHistory.php';
         return $details;
    }


    public function viewOrderHistory()
    {
        $fetchOrderData=new manageOrders();
        $this->orderData=$fetchOrderData->fetchOrders();

         $details = require_once __DIR__ . '/../View/orderHistory.php';
         return $details;
    }





}

?>









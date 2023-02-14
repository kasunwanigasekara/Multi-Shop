<?php

namespace Multishop;

use Multishop\controller\FileUpload;
use Multishop\controller\PageLoad;
use Multishop\model\manageProducts;


require_once __DIR__.'/../vendor/autoload.php';

$home=new PageLoad();


if(isset($_GET['manage']) or isset($_POST['edited']))
{
    $home->viewManage();
}

elseif(isset($_GET['addnew']) or isset($_POST['tmpImgSubmit']) or isset($_POST['addnew']) )
{
    $home->viewAddNew();
}

elseif(isset($_GET['Details']))
{
    $home->viewDetails();
}

elseif(isset($_GET['products']))
{
    $home->viewShop();
}

elseif(isset($_GET['cart']))
{
    $home->viewCart();
}

elseif(isset($_GET['checkout']))
{
    $home->viewCheckOut();
}

elseif(isset($_GET['orders']))
{
    $home->viewOrders();
}

elseif(isset($_POST['submitcart']))
{
    $home->viewCheckOut();
}

elseif(isset($_POST['viewOrder']))
{
    $home->viewOrders();

}

elseif(isset($_POST['orderhistory']) or isset($_GET['orderhistory']))
{
    $home->viewOrderHistory();   
}

else
{
    $home->viewHome();
}
?>
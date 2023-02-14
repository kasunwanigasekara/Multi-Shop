<?php

namespace Multishop\model;
use PDO;

Class manageOrders
{
    private array $data;
    private $pdo;
    private string $tmp_orders;
    private string $tmp_fname;
    private string $tmp_lname;
    private string $tmp_ad1;
    private string $tmp_ad2;
    private string $tmp_tp;
    private string $tmp_mail;

     function __construct()
     {
        
         $this->pdo=new PDO('mysql:host=localhost;dbname=db_multi_shop', 'root', '');
     }


    public function fetchOrders(): array
    {
        try {
            $stm = $this->pdo->prepare("SELECT a.orderNumber,left(a.order_date,10)dt,b.productName,sum(a.Qty)Qty,(b.price*sum(a.Qty))subtot,c.`description` paymentType,a.FName,a.LName,a.Email,
            a.Mobile,a.addressLine_01,a.addressLine_02,a.Country,a.State,a.ZIPCode 
            from tbl_order_details a
            LEFT JOIN tbl_product b ON a.productId=b.productId
            LEFT JOIN tbl_payment_types c ON a.paymentType=c.code
            GROUP BY a.orderNumber,a.productId
            order by a.order_date,a.orderNumber,a.productId ");
            $stm->execute();
            $this->data=$stm->fetchAll();
            return $this->data;
            $this->pdo->commit();
        }
        catch (\PDOException $exception)
        {
            error_log($exception->getMessage());
            die('Something went wrong. Please, try again later.');
        }
   

    }
    

}



?>
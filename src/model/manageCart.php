<?php

namespace Multishop\model;
use PDO;

Class manageCart
{
    private array $data;
    private $pdo;

     function __construct()
     {
        
         $this->pdo=new PDO('mysql:host=localhost;dbname=db_multi_shop', 'root', '');
     }


    public function fetchCart(): array
    {
        try {
            $stm = $this->pdo->prepare("SELECT a.productId,COUNT(a.productId)qty,b.productName,b.price,c.Stock FROM db_multi_shop.tbl_cart_data a
            LEFT JOIN db_multi_shop.tbl_product b ON a.productId=b.productId
            LEFT JOIN db_multi_shop.tbl_stock c ON a.productId=c.productId
            GROUP BY a.productId");
            $stm->execute();
            $this->data=$stm->fetchAll();
            return $this->data;
        }
        catch (\PDOException $exception)
        {
            error_log($exception->getMessage());
            die('Something went wrong. Please, try again later.');
        }
   

    }


    public function deleteFromCart($product_id,$Session_id)
    {
        try{
            $this->pdo->beginTransaction();

            $stm = $this->pdo->prepare("DELETE FROM db_multi_shop.tbl_cart_data a WHERE a.productId=:product_id and a.Session_id=:session_id");
            $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stm->bindParam(':session_id', $Session_id, PDO::PARAM_STR);
            $stm->execute();

        $this->pdo->commit();
        }
        catch(\PDOException $exception)
        {
            $this->pdo->rollback();
            error_log($exception->getMessage());
            die('Something went wrong. Please, try again later.');
        }


    }

    public function flushCart(string $Ssssion_id)
    {

        try{
            $this->pdo->beginTransaction();

                $stm = $this->pdo->prepare("delete from db_multi_shop.tbl_cart_data where Session_id=:sesionion_id");
                $stm->bindValue(':sesionion_id', $Ssssion_id, PDO::PARAM_INT);
                $stm->execute();
                $this->pdo->commit();
            }
            catch(\PDOException $exception)
            {
                $this->pdo->rollback();
                error_log($exception->getMessage());
                die('Something went wrong. Please, try again later.');
            }
        
     
    }

    public function addToCart(string $Session_id,int $product_id)
    {
        try{
            $this->pdo->beginTransaction();

                $stm = $this->pdo->prepare("insert into db_multi_shop.tbl_cart_data (Session_id,productId,Qty)  values(:Session_id,:product_id,:qty)");
                $stm->bindValue(':Session_id', $Session_id, PDO::PARAM_STR);
                $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                $stm->bindValue(':qty', 1, PDO::PARAM_INT);
                $stm->execute();
                $this->pdo->commit();

            }
            catch(\PDOException $exception)
            {
                $this->pdo->rollback();
                error_log($exception->getMessage());
                die('Something went wrong. Please, try again later.');
            }

    }


    public function updateCart()
    {
        
         $count=$_POST['count'];
         $s_id=$_POST['s_id'];

            for($x=1;$x<=$count;$x++)   
            {
                $product_id=$_POST['p_id'.$x];
                $qty=$_POST['qty'.$x];

                    try{
                        $this->pdo->beginTransaction();

                            $stm = $this->pdo->prepare("insert into db_multi_shop.tbl_cart_data (Session_id,productId,Qty)  values(:Session_id,:product_id,:qty)");
                            $stm->bindValue(':Session_id', $s_id, PDO::PARAM_STR);
                            $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                            $stm->bindValue(':qty', $qty, PDO::PARAM_INT);

                            $stm->execute();
                            $this->pdo->commit();

                         }
                         catch(\PDOException $exception)
                         {
                             $this->pdo->rollback();
                             error_log($exception->getMessage());
                            die('Something went wrong. Please, try again later.');
    
                        //         echo 'Message: ' .$exception->getMessage();
                         }

            }

    }


    public function submitOrder()
    {

        
        $orderNo=uniqid();
        $count  =$_POST['count']; 
        $fname  =$_POST['fname'];
        $lname  =$_POST['lname'];
        $email  =$_POST['email'];
        $tp     =$_POST['tp'];
        $adr1   =$_POST['adr1'];
        $adr2   =$_POST['adr2'];
        $cntry  =$_POST['cntry'];
        $city   =$_POST['city'];
        $state  =$_POST['state'];
        $zip    =$_POST['zip'];
        $payment=$_POST['payment'];

           for($x=1;$x<=$count;$x++)   
           {

            try{
               $product_id=$_POST['p_id'.$x];
               $qty=$_POST['qty'.$x];

                    $stm = $this->pdo->prepare("insert into db_multi_shop.tbl_order_details (orderNumber,productId,Qty,paymentType,FName,LName,Email,Mobile,addressLine_01,addressLine_02,Country,City,State,ZIPCode)  
                    values(:orderNumber,:productId,:Qty,:paymentType,:FName,:LName,:Email,:Mobile,:addressLine_01,:addressLine_02,:Country,:City,:State,:ZIPCode)");
                    $stm->bindValue(':orderNumber', $orderNo, PDO::PARAM_STR);
                    $stm->bindValue(':productId', $product_id, PDO::PARAM_INT);
                    $stm->bindValue(':Qty', $qty, PDO::PARAM_INT);
                    $stm->bindValue(':paymentType', $payment, PDO::PARAM_INT);
                    $stm->bindValue(':FName', $fname, PDO::PARAM_STR);
                    $stm->bindValue(':LName', $lname, PDO::PARAM_STR);
                    $stm->bindValue(':Email', $email, PDO::PARAM_STR);
                    $stm->bindValue(':Mobile', $tp, PDO::PARAM_STR);
                    $stm->bindValue(':addressLine_01', $adr1, PDO::PARAM_STR);
                    $stm->bindValue(':addressLine_02', $adr2, PDO::PARAM_STR);
                    $stm->bindValue(':Country', $cntry, PDO::PARAM_STR);
                    $stm->bindValue(':City', $city, PDO::PARAM_STR);
                    $stm->bindValue(':State', $state, PDO::PARAM_STR);
                    $stm->bindValue(':ZIPCode', $zip, PDO::PARAM_STR);
                    $stm->execute();
                    $this->pdo->commit();
            }
            catch(\PDOException $exception)
                         {
                             $this->pdo->rollback();
                             error_log($exception->getMessage());
                            die('Something went wrong. Please, try again later.');
    
                        
                         }



           } 
                      
    }






     

}



?>
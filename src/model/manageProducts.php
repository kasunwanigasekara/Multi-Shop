<?php

namespace Multishop\model;
use Multishop\controller\FileUpload;
use PDO;

Class manageProducts 
{
    private array $data;
    private $pdo;

     function __construct()
     {
        
         $this->pdo=new PDO('mysql:host=localhost;dbname=db_multi_shop', 'root', '');
     }


    public function fetchAllProducts(): array
    {
        try {
            $stm = $this->pdo->prepare("SELECT a.productId,a.productName,a.price,a.imagePath,b.stock  FROM db_multi_shop.tbl_product a
            left join db_multi_shop.tbl_stock b on a.productId=b.productId ORDER BY RAND()");
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

    public function fetchProduct($product_id): array
    {
        try {
        $stm = $this->pdo->prepare("SELECT a.productId,a.productName,a.price,a.imagePath,b.stock  FROM db_multi_shop.tbl_product a
        left join db_multi_shop.tbl_stock b on a.productId=b.productId where a.productId=:product_id ");
        $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
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


    public function deleteProduct($product_id)
    {
        try{
            $this->pdo->beginTransaction();

            /*First Remove From the reference table*/
            $stm = $this->pdo->prepare("DELETE FROM db_multi_shop.tbl_stock a WHERE a.productId=:product_id");
            $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
            $stm->execute();
            
            /*after that, delete from the master table*/
            $stm = $this->pdo->prepare("DELETE FROM db_multi_shop.tbl_product a WHERE a.productId=:product_id");
            $stm->bindParam(':product_id', $product_id, PDO::PARAM_INT);
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

    public function updateProduct(int $product_id,string $product_name,float $product_price,int $product_stock)
    {

        try{
            $this->pdo->beginTransaction();

                $stm = $this->pdo->prepare("update db_multi_shop.tbl_product a set a.productName=:productName,a.price=:productPrice where a.productId=:product_id");
                $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                $stm->bindValue(':productName', $product_name, PDO::PARAM_STR);
                $stm->bindValue(':productPrice', $product_price, PDO::PARAM_STR);
                $stm->execute();
                
                $stm = $this->pdo->prepare("update db_multi_shop.tbl_stock a set a.Stock=:product_stock where a.productId=:product_id");
                $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                $stm->bindValue(':product_stock', $product_stock, PDO::PARAM_INT);
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

    public function addProduct(int $product_id,string $product_name,float $product_price,int $product_stock)
    {
        try{
            $this->pdo->beginTransaction();

                $stm = $this->pdo->prepare("insert into db_multi_shop.tbl_product (productId,productName,price,imagePath)  values(:product_id,:productName,:productPrice,:imagePath)");
                $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                $stm->bindValue(':productName', $product_name, PDO::PARAM_STR);
                $stm->bindValue(':productPrice', $product_price, PDO::PARAM_STR);
                $stm->bindValue(':imagePath', 'img/'.$product_id.'.jpg', PDO::PARAM_STR);
                $stm->execute();
                
                $stm = $this->pdo->prepare("insert into db_multi_shop.tbl_stock (productId,Stock)  values(:product_id,:product_stock)");
                $stm->bindValue(':product_id', $product_id, PDO::PARAM_INT);
                $stm->bindValue(':product_stock', $product_stock, PDO::PARAM_INT);
                $stm->execute();

                $this->pdo->commit();

            }
            catch(\PDOException $exception)
            {
                $this->pdo->rollback();
                error_log($exception->getMessage());
                die('Something went wrong. Please, try again later.');
            }

            if(file_exists("img/temp.jpg"))
            {
                $move_product_img=new FileUpload('img/','temp.jpg');
                $move_product_img->ImgUpload($product_id);
            }
    }
     


}



?>
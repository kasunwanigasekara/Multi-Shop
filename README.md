# Multishop Online Shopping Application

## Functions of the Application

* Add/View/Modify and Delete Products including product images.
* Add/View/Modify and Delete products in the shopping cart.
* Adjust quantity of added products in the shopping cart.
* Complete the order by entering shipping details.
* Can view previous order details. 

## Technologies used.

* PHP with MVC architecture.
* Mysql Mariadb with PDO.
* Bootstrap for front-end design.

## Special notes.

* No loging authentications are useded in the system.
* Since there are no users in the system, all shipping details are required to be saved in the database(including all user data).
* Database tables are indexed to speed-up the quary execution.
* Forign keys are useded in the database tables in order to create link between tabls.
* Can use "db_multi_shop.sql" file inside "db" folder to creat database.


## Main process in the System.

1. User can add products in the products page to the cart by clicking on thr cart button middle of the product iamge.
2. Then user will be re-directed to the cart, and there user can adjust the quantity of selected products or user can repeat the (1.) opperation to increase the quntity.cart deta is tempararaly saved in the database table and will removed after completing the order.
3. by clicking on the proceed button user will be redirected to the cart checkout section and there user can add shipping details and complete the order.
4. users are able to view all past order details by accessing the order history section.# Multi-Shop

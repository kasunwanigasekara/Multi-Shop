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


                        <table width="1500px" align="center">
                            <tr>
                                <td bgcolor="#d6d0ce" align="center"><b>Order</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Date</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>F.Name</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>L.Name</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Add.Line 1</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Add.Line 2</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>State</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Country</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Zipcode</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Mobile</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Email</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Product</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Quantity</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Tot.Value</b></td>
                                <td bgcolor="#d6d0ce" align="center"><b>Payment Type</b></td>
                            </tr>
                            <?php

                            $this->tmp_orders='';
                            $this->tmp_fname='';
                            $this->tmp_lname='';
                            $this->tmp_ad1='';
                            $this->tmp_ad2='';
                            $this->tmp_tp='';
                            $this->tmp_mail='';
                            $x=0;

                             foreach($this->orderData as $data)  
                             {
                            ?><tr>
                                <td>
                                    <?php if($this->tmp_orders==$data['orderNumber'] and $x<>0){ echo '';}  else {echo $data['orderNumber'];}  ?>
                                </td>
                                <td>
                                    <?php echo $data['dt'];  ?>
                                </td>
                                <td>
                                    <?php if($this->tmp_fname==$data['FName'] and $x<>0){ echo '';}  else {echo $data['FName'];}  ?>
                                </td>
                                <td>
                                    <?php if($this->tmp_lname==$data['LName'] and $x<>0){ echo '';}  else {echo $data['LName'];}  ?>
                                </td>
                                <td>
                                    <?php if($this->tmp_ad1==$data['addressLine_01'] and $x<>0){ echo '';}  else {echo $data['addressLine_01'];}  ?>
                                </td>
                                <td>
                                    <?php if($this->tmp_ad2==$data['addressLine_02'] and $x<>0){ echo '';}  else {echo $data['addressLine_02'];}  ?>
                                </td>
                                <td>
                                    <?php echo $data['State'];  ?>
                                </td>
                                <td>
                                    <?php echo $data['Country'];  ?>
                                </td>
                                <td>
                                    <?php echo $data['ZIPCode'];  ?>
                                </td>
                                <td>
                                    <?php if($this->tmp_tp==$data['Mobile'] and $x<>0){ echo '';}  else {echo $data['Mobile'];}  ?>
                                </td>
                                <td>
                                    <?php if($this->tmp_mail==$data['Email'] and $x<>0){ echo '';}  else {echo $data['Email'];}  ?>
                                </td>
                                <td><?php echo $data['productName']?></td>
                                <td><?php echo $data['Qty']?></td>
                                <td><?php echo $data['subtot']?></td>
                                <td><?php echo $data['paymentType']?></td>

                                </tr>      
                            <?php  

                                $this->tmp_orders   =$data['orderNumber'];
                                $this->tmp_date     =$data['dt'];
                                $this->tmp_fname    =$data['FName'];
                                $this->tmp_lname    =$data['LName'];
                                $this->tmp_ad1      =$data['addressLine_01'];
                                $this->tmp_ad2      =$data['addressLine_02'];
                                $this->tmp_state    =$data['State'];
                                $this->tmp_cntry    =$data['Country'];
                                $this->tmp_zip      =$data['ZIPCode'];
                                $this->tmp_tp       =$data['Mobile'];
                                $this->tmp_mail     =$data['Email'];
                                $x++;
                             } 

                            ?>
                        </table>




</body>

</html>

<style>
    table, th, td {
  border: 1px solid black;
  column-gap: 40px;

}
</style>
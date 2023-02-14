function getIdManage(value)
{
let id=value;

if(confirm("Are you sure you want to delete this product?"))  
           {  
                window.location = "action.php?manage=1&product_id="+id+"";  
           }  
           else  
           {  
                return false;  
           }  

}


function getIdcart(value)
{
let id=value;

if(confirm("Are you sure you want to add this product to the cart?"))  
           {  
                window.open('action.php?cart=1&product_id='+id+''); 8
           }  
           else  
           {  
                return false;  
           }  

}


function getIdDetails(value)
{
let id=value;

if(confirm("Are you sure you want to Edit this product?"))  
           {  
                window.open('action.php?Details=1&product_id='+id+'');
           }  
           else  
           {  
                return false;  
           }  

}

function editCart(value)
{
let id=value;
let s_id=document.getElementById('s_id').value

if(confirm("Are you sure you want to delete this product from the cart?"))  
           {  
                window.open('action.php?cart=1&editCart=1&product_id='+id+'&s_id='+s_id+'');
           }  
           else  
           {  
                return false;  
           }  

}


$('.number').keypress(function(event) {
     if ( (event.which < 48 || event.which > 57)) {
       event.preventDefault();
     }
   });


$('.float').keypress(function(event) {
   if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
   event.preventDefault();
   }
});


function gettotal(id)
{
     let idd=id;
     let no=idd.substring(3);

     let qty = document.getElementById('qty'+no).value;
     let price =document.getElementById('price'+no).value;
     let carCount =document.getElementById('count').value;
     let subTot=0;
     document.getElementById('tot'+no).value=(qty*price);
     
     for(let x=1;x<=carCount;x++)
     {
          let y=document.getElementById('tot'+x).value
          subTot=parseFloat(subTot)+parseFloat(y);  
     }

       document.getElementById('subtot').value=subTot.toFixed(2);
       document.getElementById('ftot').value=(subTot+parseFloat(30)).toFixed(2);

}





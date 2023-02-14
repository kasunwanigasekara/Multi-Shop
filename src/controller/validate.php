<?php

namespace Multishop\controller;


final class validate
{

    public function checkPhoneNo($phone):int
    {
        if(preg_match('/^[0-9]{11}+$/', $phone))
        {
            return 1;
        } 
            else 
        {
            return 0;
        }
    }


      public function checkEmail($email):string
      {
          if(!filter_var($email, FILTER_VALIDATE_EMAIL))
          {
              return 0;
          } 
              else 
          {
              return 1;
          }
      }

}

?>
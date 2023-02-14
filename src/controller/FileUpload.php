<?php

namespace Multishop\controller;

Class FileUpload
{
    private $tmp_target_file;

    function __construct($path,$newName)
    {
        $this->tmp_target_file=$path.$newName;

    } 

    public function tmpImgUpload()
    {
        // if (file_exists($this->tmp_target_file)) {
        //     unlink($this->tmp_target_file);
        //   }

        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $this->tmp_target_file);     

    } 


    public function unlinktmpimg()
    {
        if (file_exists($this->tmp_target_file)) {
            unlink($this->tmp_target_file);
          }

    } 

    public function ImgUpload($path)
    {
        rename($this->tmp_target_file, 'img/'.$path.'.jpg');

    }




}




?>
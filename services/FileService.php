<?php

class FileService{

    public static function uploadImgFile($image, $name, $size, $path=''){
        if($image['size']>0) {
            $currentDir = getcwd();
            $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
            $uploadName = $image['name'];
            $fileSize = $image['size'];
            $fileTmpName  = $image['tmp_name'];
            $fileType = $image['type'];
            $v = explode('.',$uploadName);
            $fileExtension = strtolower(end($v));
            $fileName .= basename($name).'.'.$fileExtension;
            $path = self::mkdirFromPath($path,IMG_ROOT);
            
            $uploadPath = IMG_ROOT.$path.$fileName; 
            //echo $uploadPath; exit;
            if(! in_array($fileExtension,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }
            if($fileSize > $size*1000000) {
                $errors[] = "This file is more than $size MB. ";
            }
            if(empty($errors)) {
               $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                if ($didUpload) {
                } else {
                    $errors[] = "An error occurred somewhere. Try again or contact the admin";//exit;
                    return ['errors'=>$errors];
                }
            }else{return ['errors'=>$errors];}
            return ['fileName'=>$path.$fileName];
        }
    }

    private static function mkdirFromPath($folder, $base){
        //$folder = "/test_f/test/test1"; 
        $fold_parts = explode('/', $folder);
        $path = '';
        //var_dump($fold_parts);exit;
        foreach ($fold_parts as $fold_part) {
            if($fold_part!=''){
                $path.=$fold_part.'/';
                if(!is_dir($base.$path)) mkdir($base.$path);
            }
        }
        return $path;
    }

    public static function getImage($name){
        if(file_exists(IMG_ROOT.$name)) {
            return IMG_ROOT.$name;
        } else {
            $row = Image::where(" name = '$name' ")[0];
            if($row){
                return "/getimg?by=name&val=$name";
            }else{
                return 'none';
            }
        }
            
    }
    

    public static function uploadImgMysql($image, $name, $size){
            $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions
            $uploadName = $image['name'];
            $v = explode('.',$uploadName);
            $fileExtension = strtolower(end($v));
            $fileSize = $image['size'];

            if(! in_array($fileExtension,$fileExtensions)) {
                $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
            }
            if($fileSize > $size*1000000) {
                $errors[] = "This file is more than $size MB. ";
            }
            if(empty($errors)) {
                $imgData = addslashes(file_get_contents($image['tmp_name']));
                $imageProperties = getimageSize($image['tmp_name']);
                $row = Image::where(" name = '$name' ")[0];
                if($row){
                    $didUpload = Image::updateBy(
                        ['name'=>$name,'type'=>$imageProperties['mime'],'src'=>$imgData],
                        'name', $name);
                }else{
                    $didUpload = Image::add(['name'=>$name,'type'=>$imageProperties['mime'],'src'=>$imgData]);
                }
                if ($didUpload) {
                } else {
                    $errors[] = "An error occurred somewhere. Try again or contact the admin";//exit;
                    return ['errors'=>$errors];
                }
            }else{return ['errors'=>$errors];}
            return ['fileName'=>$name];
    }

}
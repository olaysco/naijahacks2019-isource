<?php

namespace App\Traits;

use finfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait AjaxFile
{

   public  $supportedFiles =  ['application/pdf'=>'.pdf', 'image/png'=>'.png','image/jpeg'=>'.jpg','image/jpg'=>'.jpg'];

   /**
    * Stores file in the specified folder in
    * storage
    * @return String relative filepath
    */
    public function saveFile( $file, $folder)
    {
        $unique = Str::random(10);
        $type = $file['type'];
        $decoded_file = $this->base64ToFile($file['data']);
        $fileInfo = pathinfo($file['fileName']);
        $file_name = '/'.$folder.'/'. $unique.'.'.$fileInfo['extension'];
        Storage::disk('local')->put('/public/'.$file_name, $decoded_file);
        return $file_name;
    }

    public function base64ToFile($data)
    {
        $file = explode(',',$data)[1];
        $file = str_replace(' ','+',$file);
        $decoded_file = \base64_decode($file);
        return $decoded_file;
    }

    public function deleteFile($fullPath)
    {
        try{
            Storage::disk('local')->delete('/public/'.$fullPath);
        }catch(FileNotFoundException $e){

        }
        return true;

    }

}


?>

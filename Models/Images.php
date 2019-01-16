<?php

namespace App\Models;

class Images 
{
    public function get_image($id)
    {
	    $image = \Images::find_by_id($id);
		return $image;
    }

    public function deleteAll($id)
    {
        $images = \Images::find('all', array('conditions' => "products_id LIKE '".$id."'"));

        foreach ($images as $image) {
            //drop image from folder
            $file = DIR.'/img/'.$image->src;
            if(file_exists($file)) unlink($file);

            //drop image from DB
            if(isset($image)) $image->delete();
        }
    }

    public function delete($id)
    {
        $image = $this->get_image($id);

        //drop image from folder
        unlink(DIR.'/img/'.$image->src);

        //drop image from DB
        if(isset($image)) $image->delete($id);
    }

    public function add($images, $id)
    {
        foreach($images as $key=>$uri) {
            $upload_dir = DIR.'/img/';

            // get file type
            preg_match("/^data:image\/(.*);base64/i", $uri, $match);
            $file_type = $match[1];

            //get image data
            $img = str_replace('data:image/'.$file_type.';base64,', '', $uri);            
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            //generate unique name of file
            $file_name = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);

            // create new image in img folder
            $file = $upload_dir.$file_name.".".$file_type;
            $success = file_put_contents($file, $data);

            //write image to DB
            $src = $file_name.".".$file_type;
        	$product = \Images::create(array('src' => $src, 'products_id' => $id));
        }
    }
}

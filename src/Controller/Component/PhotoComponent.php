<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhotoComponent
 *
 * @author arnoldhecke
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

class PhotoComponent extends Component {
    /* public function doComplexOperation($amount1, $amount2)
      {
      return $amount1 + $amount2;
      } */

    public function uploadPhoto($file, $currentFileName, $path, $id) {
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        $arr_ext = array('jpg', 'jpeg', 'png'); //set allowed extensions
        $setNewFileName = $id . "_" . time(); // . "_" . rand(000000, 999999);

        if (in_array($ext, $arr_ext)) {
            // first: deleting old file
            if (!empty($currentFileName)) {
                try {
                    unlink(WWW_ROOT . 'upload/' . $path . '/' . $currentFileName);
                } catch (Exception $e) {
                    echo 'Caught exception: ', $e->getMessage(), "\n";
                }
            }

            $maxDim = 800;
            $file_name = $file['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($file_name);
            if ($width > $maxDim || $height > $maxDim) {
                $target_filename = $file_name;
                $ratio = $width / $height;
                if ($ratio > 1) {
                    $new_width = $maxDim;
                    $new_height = $maxDim / $ratio;
                } else {
                    $new_width = $maxDim * $ratio;
                    $new_height = $maxDim;
                }
                $src = imagecreatefromstring(file_get_contents($file_name));
                $dst = imagecreatetruecolor($new_width, $new_height);
                imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                imagedestroy($src);
                imagepng($dst, $target_filename); // adjust format as needed
                $ext = "png";
                imagedestroy($dst);
            }

            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'upload/' . $path . '/' . $setNewFileName . '.' . $ext);

            $imageFileName = $setNewFileName . '.' . $ext;

            return $imageFileName;
        }

        return null;
    }

    public function deletePhoto($currentFileName, $path) {
        if (!empty($currentFileName)) {
            try {
                unlink(WWW_ROOT . 'upload/' . $path . '/' . $currentFileName);
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
        }
    }

}

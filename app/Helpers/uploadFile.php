<?php

namespace App\Helpers;


function uploadFile($file,$folder) {
    $filenameWithExt = $file->getClientOriginalName();
    //Get just filename
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    // Get just ext
    $extension = $file->getClientOriginalExtension();
    // Filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    // Upload Image
    $path = $file->storeAs("public/$folder", $fileNameToStore);

    return $fileNameToStore;
}

?>
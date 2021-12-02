<?php
use App\Models\User;

function uploadImage($imageInfo, $folderName = '') {
  $imageName = '';
  if ($imageInfo->getClientOriginalName()) {
    $uploadFolder = "uploads";
    if ($folderName != '') {
      $uploadFolder .= '/' . $folderName;
    }
    $imageName = time() . '-' . $imageInfo->getClientOriginalName();
    $imageName = preg_replace('/[^A-Za-z0-9.]/', '-', $imageName);
    $imageInfo->move(public_path($uploadFolder), $imageName);
  }
  return $imageName;
}

### function to show image
function showImage($imageName, $folderName = '') {
  // dd($imageName, $folderName);
  //if ($imageName) {
  $uploadFolder = "uploads/";
  if ($folderName != '') {
    $uploadFolder .= $folderName . '/';
  }
  $imageAbsolutePath = public_path($uploadFolder . $imageName);
  if (file_exists($imageAbsolutePath) && $imageName != '') {
    $imageFullPath = URL::asset($uploadFolder . $imageName);
  } else {
    $imageFullPath = URL::asset($uploadFolder . 'noimage.png');
  }
  //}
  return $imageFullPath;
}


### function to delete image
function unlinkImage($imageName, $folderName = '') {
  if ($imageName) {
    $uploadFolder = "uploads/";
    if ($folderName != '') {
      $uploadFolder .= $folderName . '/';
    }
    $imageAbsolutePath = public_path($uploadFolder . $imageName);
    if (file_exists($imageAbsolutePath)) {
      unlink($imageAbsolutePath);
    }
  }
}







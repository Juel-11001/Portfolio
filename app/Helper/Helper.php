<?php
// use File;

use Illuminate\Support\Facades\File;

/** handle file upload */
function handleUpload($inputname, $model=null){
    try {
        if(request()->hasFile($inputname)){
            if($model && File::exists(public_path($model->{$inputname}))){
                File::delete(public_path($model->{$inputname}));
            }
            $file=request()->file($inputname);
            $fileName=rand().$file->getClientOriginalName();
            $file->move(public_path('/uploads'),$fileName);

            $filePath="/uploads/".$fileName;
            return $filePath;

        }
    } catch (\Exception $e) {
        throw $e;
    }

}

/** Delete file */
function deleteFileIfExists($filePath) {
    try {
        if(File::exists(public_path($filePath))){
            File::delete(public_path($filePath));
        }
    } catch (\Exception $e) {
        throw $e;
    }
}
/** get dynamic color */

function getColor($index) {
    $colors=['#e34c26', '#264de4', '#f0db4f', '#787cb5', '#ff2d20', '#61dafb'];
    return $colors[$index % count($colors)];
}
/** set active sidebar */
function setSidebarActive($route)
{
    if(is_array($route)){
        foreach ($route as $r) {
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }

}

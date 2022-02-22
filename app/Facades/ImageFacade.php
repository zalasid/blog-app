<?php
  
namespace App\Facades;
  
use Illuminate\Support\Facades\Facade;
  
class ImageFacade extends Facade
{
    public function uploadImage($model, $file, $directory)
    {
        $path = $file->store('public/' . $directory);
        $model->image()->updateOrCreate(
            [
                'imageable_id' => $model->id,
                'imageable_type' => get_class($model)
            ]
            ,
            [
                'url' => $directory . '/' . basename($path)
            ]
        );
        return true;
    }
}

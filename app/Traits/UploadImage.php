<?php

namespace App\Traits;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadImage
{

    public function storeImage(Request $request, $filename, $foldername, $disk, $imageable_id, $imageable_type)
    {
        if ($request->hasFile($filename)) {

            if (!$request->file($filename)) {
                session()->flash('invalid_image');
                return redirect()->route('doctors.create');
            }

            $photo = $request->file($filename);
            $extension = $photo->getClientOriginalExtension();
            $photo_fileName = uniqid() . '.' . $extension;

            // insert Image
            $Image = new Image();
            $Image->filename = $photo_fileName;
            $Image->imageable_id = $imageable_id;
            $Image->imageable_type = $imageable_type;
            $Image->save();
            return $request->file($filename)->storeAs($foldername . '\\' . $imageable_id, $photo_fileName, $disk);
        }

        return null;
    }

    public function deleteImage($disk, $path, $id)
    {
        Storage::disk($disk)->delete($path);
        Image::where('imageable_id', $id)->delete();
    }
}

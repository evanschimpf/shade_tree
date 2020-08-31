<?php

namespace App\Http\Controllers;

use App\ImageThumbnail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Image;

class ControllerImages extends Controller
{

    public function CreateImage(Request $request) {
        $validator = Validator::make($request->all(),
        [
            'image' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        // Set the image and thumbnail paths
        $image_folder_path = storage_path() . '/app/images/';
        $thumbnail_folder_path = storage_path() . '/app/thumbnails/';

        // Save the image to the filesystem
        $image_file = $request->file('image')->store('images');

        // Get image basename and generate thumbnail name
        $image_name = basename($image_file);
        $image_name_and_extension = explode(".", $image_name);
        $thumbnail_name = $image_name_and_extension[0] . '_t.'. $image_name_and_extension[1];

        // Generate thumbnail and save it to the filesystem
        InterventionImage::make($request->file('image'))
            ->resize(200, 200)->save($thumbnail_folder_path . $thumbnail_name);

        // Save the thumbnail to the database
        $thumbnail = new ImageThumbnail();
        $thumbnail->filename = $thumbnail_name;
        $thumbnail->filepath = $thumbnail_folder_path . $thumbnail_name;
        $thumbnail->save();

        // Save the image to the database
        $image = new Image();
        $image->thumbnail_id    = $thumbnail->id;
        $image->filename        = $image_name;
        $image->filepath        = $image;
        $image->title           = $request->title;
        $image->description     = $request->description;
        $image->save();

        // Return success
        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "image" => $image_name,
            "thumbnail" => $thumbnail_name
        ]);
    }
}

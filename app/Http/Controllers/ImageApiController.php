<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image as InterventionImage;
use App\Models\Image;
use App\Models\Thumbnail;

class ImageApiController extends Controller
{
    public function getImage(Request $request, $id) {
        if(Image::where('id', $id)->where('user_id', $request->user()->id)->exists()) {
            $image = Image::find($id);
            return response()->download($image->filepath);
        } else {
            return response()->json([
                "message" => "Image not found"
            ], 404);
        }
    }

    public function getImageDetails(Request $request, $id) {
        if(Image::where('id', $id)->where('user_id', $request->user()->id)->exists()) {
            $image = Image::find($id);
            return response($image, 200);
        } else {
            return response()->json([
                "message" => "Image not found"
            ], 404);
        }
    }

    public function createImage(Request $request) {
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

        // Save the image to the database
        $image = new Image();
        $image->user_id         = $request->user()->id;
        $image->imageable_id    = isset($request->imageable_id) ? $request->imageable_id : -1;
        $image->imageable_type  = isset($request->imageable_type) ? $request->imageable_type : "";
        $image->filename        = $image_name;
        $image->filepath        = $image_folder_path . $image_name;
        $image->title           = $request->title;
        $image->description     = $request->description;
        $image->save();

        // Generate thumbnail and save it to the filesystem
        InterventionImage::make($request->file('image'))
            ->fit(200, 200)->save($thumbnail_folder_path . $thumbnail_name);

        // Save the thumbnail to the database
        $thumbnail = new Thumbnail();
        $thumbnail->image_id = $image->id;
        $thumbnail->filename = $thumbnail_name;
        $thumbnail->filepath = $thumbnail_folder_path . $thumbnail_name;
        $thumbnail->save();

        // Return success
        return response()->json([
            "success" => true,
            "message" => "File successfully uploaded",
            "image" => $image_name,
            "thumbnail" => $thumbnail_name,
            "imageable_id" => $image->imageable_id,
            "imageable_type" => $image->imageable_type
        ]);
    }

    public function getThumbnail(Request $request, $id) {
        if(Image::where('id', $id)->where('user_id', $request->user()->id)->exists()) {
            $image = Image::find($id);
            $thumbnail = $image->thumbnail;
            return response()->download($thumbnail->filepath);
        } else {
            return response()->json([
                "message" => "Image not found, cannot get thumbnail"
            ], 404);
        }
    }

    public function getThumbnailDetails(Request $request, $id) {
        if(Image::where('id', $id)->where('user_id', $request->user()->id)->exists()) {
            $image = Image::find($id);
            $thumbnail = $image->thumbnail;
            return response($thumbnail, 200);
        } else {
            return response()->json([
                "message" => "Image not found, cannot get thumbnail"
            ], 404);
        }
    }
}

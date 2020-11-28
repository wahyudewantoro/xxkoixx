<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use App\PendaftaranIkan;
use Response;


class ImageController extends Controller
{
    //
    public function displayImage($id)

    {

        // 492436af9eac48b1ae72559ccaf3a696
        $ikan=PendaftaranIkan::find($id);

        // $path = $ikan->path_image;
        $path=storage_path( $ikan->path_image);

        // dd($path);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}

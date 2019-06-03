<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Image;
use App\Repositories\Image\ImageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
    protected $image;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->image = $imageRepository;
    }

    public function getUpload()
    {
        return view('pages.upload');
    }

    public function postUpload()
    {
        // p('hehe');exit;
        $photo    = Input::all();
        $response = $this->image->upload($photo);

        /*dd('呵呵');
        dd($response);*/

        return $response;

    }

    public function deleteUpload(Request $request)
    {
        // dd($request->all());

        $response = $this->image->delete($request);

        return $response;
    }

    /**
     * Part 2 - Display already uploaded images in Dropzone
     */

    public function getServerImagesPage()
    {
        return view('pages.upload-2');
    }

    public function getServerImages()
    {
        $images = Image::get(['original_name', 'filename']);

        $imageAnswer = [];

        foreach ($images as $image) {
            $imageAnswer[] = [
                'original' => $image->original_name,
                'server'   => $image->filename,
                'size'     => File::size(public_path('images/full_size/' . $image->filename)),
            ];
        }

        return response()->json([
            'images' => $imageAnswer,
        ]);
    }

    public function imgError()
    {

        return view('admin.errors.imageError');
    }
}

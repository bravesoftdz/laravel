<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Lara\Files;

class PagesController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function slider()
    {
        return view('admin.pages.slider');
    }

    public function sliderUpload(Request $request)
    {
        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = 'uploads';
        if (!empty($_FILES)) {
//            $tempFile = $_FILES['file']['tmp_name'];
//            $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;  //4
//            $targetFile = $targetPath . $_FILES['file']['name'];  //5
//            move_uploaded_file($tempFile, $targetFile); //6

            Files::created([
                'name'  => $_FILES['name'],
                'alias' => md5($_FILES['file']),
                'size'  => $_FILES['size'],
                'type'  => $_FILES['type']
            ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}

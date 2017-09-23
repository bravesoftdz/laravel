<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;
use Lara\Files;
use Storage;

class SliderController extends Controller
{

    public function slider()
    {
        $imageSliderList = Files::where(['destination' => Files::TYPE_SLIDER])->get();
        return view('admin.pages.slider', compact('imageSliderList'));
    }

    private function _upload(Request $request)
    {
        return Files::create([
            'name' => $request->file->getClientOriginalName(),
            'path' => $request->file->store(Files::UPLOAD_SLIDER),
            'size' => $request->file->getClientSize(),
            'type' => $request->file->getClientMimeType(),
            'destination' => Files::TYPE_SLIDER,
        ]);
    }

    private function _delete(string $path)
    {
        Files::where(['path' => $path])->delete();
        return Storage::delete($path);
    }

    public function sliderUpload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file       = $this->_upload($request);
            $resultData = ['success' => true, 'fileName' => $file->path];
        } else {
            $this->_delete($request->input('name'));
            $resultData = ['success' => true];
        }

        return response()->json($resultData);
    }
}

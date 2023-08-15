<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;
use Illuminate\Support\Facades\Storage;

class KYCController extends Controller
{
    public function submit(Request $request)
    {
        $documentImage = $request->file('document');
        // $text = (new TesseractOCR($documentImage))->run();

        // Pastikan path diatur dengan benar
        $tesseractPath = 'D:\\Tesseract-OCR';

        $text = (new TesseractOCR($documentImage))
            ->executable($tesseractPath)
            ->run();


        return view('verification_result', ['text' => $text]);
    }

    public function showForm()
    {
        return view('verification');
    }

}

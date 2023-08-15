<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function processImage(Request $request)
    {
        // $imageData = $request->input('image');
        // $imageName = time() . '.png';

        // // Simpan gambar ke penyimpanan
        // Storage::disk('public')->put($imageName, base64_decode($imageData));

        // return response()->json(['imagePath' => $imageName]);

        $data = json_decode($request->getContent(), true); // Ambil data dari JSON
        $imageData = $data['image']; // Ambil gambar dari data JSON

        $imageName = time() . '.png';

        // Simpan gambar ke penyimpanan
        Storage::disk('public')->put($imageName, base64_decode($imageData));

        return response()->json(['imagePath' => $imageName]);
    }

    public function showResult(Request $request)
    {
        $imagePath = $request->input('image');
        return view('camera-result', ['imagePath' => $imagePath]);
    }
}

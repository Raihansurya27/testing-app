<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function hai()
    {
        $data = [
            'message' => 'Hello from API',
        ];

        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Content;

class ContentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|array',
        ]);

        $content = new Content();
        $content->data = $request->content;
        $content->save();

        return response()->json(['message' => 'Content published successfully'], 201);
    }

    public function index()
    {
        $contents = Content::all();
        return response()->json($contents);
    }

    public function latest()
    {
        $content = Content::latest()->first();

        $response = [
            'data' => $content
        ];

        return response()->json($response);
    }
}

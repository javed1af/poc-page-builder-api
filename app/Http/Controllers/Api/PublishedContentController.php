<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublishedContent;

class PublishedContentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|json',
        ]);

        $publishedContent = new PublishedContent();
        $publishedContent->content = $request->content;
        $publishedContent->save();

        return response()->json(['message' => 'Content published successfully'], 201);
    }

    public function index()
    {
        $publishedContents = PublishedContent::all();
        return response()->json($publishedContents);
    }
}

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
            'data' => 'required|json',
            'page' => 'required|string|unique:contents,page',
        ]);

        $content = new Content();
        $content->page = $request->page;
        $content->data = $request->data;
        $content->save();

        return response()->json(['message' => 'Content published successfully'], 201);
    }

    public function getContent($page)
    {
        $content = Content::where('page', $page)->first();

        if (!$content) {
            $content = Content::create([
                'page' => $page,
                'data' => json_encode(['content' => [], 'root' => []]), // Default empty data structure
            ]);
        }

        return response()->json($content);
    }

    public function update(Request $request, $page)
    {
        $request->validate([
            'data' => 'required|json',
        ]);

        $content = Content::where('page', $page)->first();
        if ($content) {
            $content->data = $request->data;
            $content->save();

            return response()->json(['message' => 'Content updated successfully']);
        }

        return response()->json(['message' => 'Content not found'], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        return Blog::create($request->all());
    }

    public function show($id)
    {
        return Blog::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        return $blog;
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
    
        return response()->json(['message' => 'Blog deleted successfully']);
    }
}

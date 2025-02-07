<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
        return response()->json([
            'status' => true,
            'status_code' => Response::HTTP_OK,
            'message' => 'Blogs retrieved successfully',
            'data' => $blogs
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $blog = Blog::create($request->all());

        return response()->json([
            'status' => true,
            'status_code' => Response::HTTP_CREATED,
            'message' => 'Blog created successfully',
            'data' => $blog
        ], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'status' => false,
                'status_code' => Response::HTTP_NOT_FOUND,
                'message' => 'Blog not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => true,
            'status_code' => Response::HTTP_OK,
            'message' => 'Blog retrieved successfully',
            'data' => $blog
        ], Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'status' => false,
                'status_code' => Response::HTTP_NOT_FOUND,
                'message' => 'Blog not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $blog->update($request->all());

        return response()->json([
            'status' => true,
            'status_code' => Response::HTTP_OK,
            'message' => 'Blog updated successfully',
            'data' => $blog
        ], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'status' => false,
                'status_code' => Response::HTTP_NOT_FOUND,
                'message' => 'Blog not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $blog->delete();

        return response()->json([
            'status' => true,
            'status_code' => Response::HTTP_OK,
            'message' => 'Blog deleted successfully'
        ], Response::HTTP_OK);
    }
}

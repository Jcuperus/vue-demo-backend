<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Blog;

class BlogController extends Controller
{
    const PAGINATION_LIMIT = 10; 

    public function index()
    {
        return Blog::with('user')->latest()->paginate(self::PAGINATION_LIMIT);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->only(['title', 'content']);
        $blog = $user->blogs()->create($data);
        
        return $blog;
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete($id);
        return response('Delete successful', 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $user = Auth::user();
            $blog = Blog::where('user_id', $user->id)
                ->findOrFail($id);
    
            $data = $request->only('title', 'content', 'user_id');
            $blog->update($data);
            return $blog;
        }
        catch (\Exception $e) {
            return response('Blog not saved: ' . $e->getMessage(), 400);
        }
    }

    public function show($id)
    {
        return Blog::with('user')->findOrFail($id);
    }
}

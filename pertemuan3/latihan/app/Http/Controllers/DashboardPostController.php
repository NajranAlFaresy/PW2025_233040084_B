<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // menggunakan user_id dari user yang sedang login
    $posts = Post::where('user_id', auth()->user()->id);

    // fitur search
    if (request('search')) {
        $posts->where('title', 'like', '%' . request('search') . '%');
    }

    // menampilkan 5 data per halaman dengan pagination
    return view('Dashboard.index', [
        'posts' => $posts->paginate(5)->withQueryString()
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
            'body' => 'required'
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan file ke storage/app/public/post-images
            // Method store() akan otomatis buat nama file unik
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Generate excerpt otomatis (opsional)
        $excerpt = Str::limit(strip_tags($request->body), 200);

        // Simpan ke database
        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'excerpt' => $excerpt,
            'body' => $request->body,
            'image' => $imagePath, // contoh: post-images/abc123.jpg
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/dashboard/posts')->with('success', 'Post baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

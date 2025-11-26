<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Data dummy untuk contoh
    private function getPosts()
    {
        return [
            [
                'id' => 1,
                'title' => 'Belajar Laravel',
                'content' => 'Laravel adalah framework PHP yang populer.',
                'user_id' => 'Admin',
                'created_at' => '2024-01-15'
            ],
            [
                'id' => 2,
                'title' => 'Mengenal Blade Template',
                'content' => 'Blade adalah template engine bawaan
Laravel.',
                'user_id' => 'Admin',
                'created_at' => '2024-01-16'
            ]
        ];
    }
    // Menampilkan semua post
    public function index()
    {
        $posts = $this->getPosts();
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }
    // Menampilkan form create
    public function create()
    {
        return view('posts.create');
    }
    // Menyimpan post baru (contoh validasi)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
        ]);

        // HARDCODE SEMENTARA AGAR TIDAK ERROR
        // $validated['user_id'] = 1;

        // Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
    }
    // Menampilkan detail post
    public function show($id)
    {
        $posts = $this->getPosts();
        $post = collect($posts)->firstWhere('id', $id);
        return view('posts.show', compact('post'));
    }
}
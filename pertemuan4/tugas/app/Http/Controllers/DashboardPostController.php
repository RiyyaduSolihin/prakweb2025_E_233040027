<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
        {
            $posts = Post::where('user_id', Auth::id());
           

            if(request('search')) {
                $posts->where('title', 'like', '%'.request('search').'%');
            }

            return view('dashboard.index', [
                
                'posts' => $posts->paginate(5)->withQueryString()
            ]);
        }



    /**
     * Show the form for creating a new resource.
     */

    /*
 * Show the form for creating a new resource.
 */
public function create()
{
    // Ambil semua categories
    $categories = Category::all();

    return view('dashboard.create', compact('categories'));
}

/*
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    // Generate slug dari title
    $slug = Str::slug($request->title);

    // Pastikan slug unique - jika sudah ada, tambahkan angka di belakang
    $originalSlug = $slug;
    $count = 1;

    while (Post::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }
    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        // Store file to storage/app/public/post-images
        // Method store() akan generate nama file unik otomatis
        $imagePath = $request->file('image')->store('post-images', 'public');
    }
    $validator = Validator::make($request->all(), [
        'title'       => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'excerpt'     => 'required',
        'body'        => 'required',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ], [
        'title.required'        => 'Field Title wajib diisi',
        'title.max'             => 'Field Title tidak boleh lebih dari 255 karakter',
        'category_id.required'  => 'Field Category wajib dipilih',
        'category_id.exists'    => 'Category yang dipilih tidak valid',
        'excerpt.required'      => 'Field Excerpt wajib diisi',
        'body.required'         => 'Field Content wajib diisi',
        'image.image'           => 'File harus berupa gambar',
        'image.mimes'           => 'Format gambar harus jpeg, png, jpg, atau gif',
        'image.max'             => 'Ukuran gambar maksimal 2MB',
    ]);

        if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }


    // Create post
    Post::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'category_id' => $request->category_id,
        'excerpt' => $request->excerpt,
        'body' => $request->body,
        'image' => $imagePath, // Simpan path gamba
        'user_id' => auth()->id,
    ]);


    return redirect()->route('dashboard.index')->with('success', 'Post created successfully!');
}



    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post){
    return view('dashboard.edit', [
        'post' => $post,
        'categories' => Category::all()
    ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post){
    $data = $request->validate([
        'title' => 'required|max:255',
        'category_id' => 'required',
        'excerpt' => 'required',
        'body' => 'required',
        'image' => 'nullable|image|max:2048'
    ]);

    if($request->file('image')){
        $data['image'] = $request->file('image')->store('post-images','public');
    }

    $post->update($data);
    return redirect()->route('posts.index')->with('success','Post updated!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post){
    $post->delete();
    return redirect()->route('posts.index')->with('success','Post deleted!');
    }

}

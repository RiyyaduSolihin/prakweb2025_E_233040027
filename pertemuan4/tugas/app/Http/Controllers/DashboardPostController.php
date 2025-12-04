<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            $posts->where('title', 'Like', '%' . request('search') . '%');
        }

        // menampilkan 5 data per halaman dengan pagination
        return view('dashboard.index', ['posts' => $posts->paginate(5)->withQueryString()]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('dashboard.show',['post' => $post]);
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

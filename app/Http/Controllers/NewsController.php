<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = News::latest()->get();
        return view('news.index', [
            'user' => $request->user(),
            'news' => $news
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }

        $news = News::all();
        return view('news.list', [
            'user' => $request->user(),
            'news' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $user = $request->user();
        $data = $request->all();
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image_1' => 'required'
        ]);

        $file1  = $request->file('image_1');
        $file1Path = $file1->store('uploads', 'public');
        $data['image_1'] = $file1Path;

        $data['user_id'] = $user->id;

        $item = News::create($data);

        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('news.show', [
            'news' => $news,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $news = News::findOrFail($id);
        return view('news.edit', [
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->description = $request->description;

        $file  = $request->file('image_1');
        if ($file) {
            $filePath = $file->store('uploads', 'public');
            $news->image_1 = $filePath;
        }

        $news->save();
        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->user()->role !== 'Admin') {
            return abort(404);
        }
        $news = News::find($id);
        $news->delete();
        return redirect('/admin/news');
    }
}

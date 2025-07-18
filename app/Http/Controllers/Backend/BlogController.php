<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->latest()->get();
        return view('backend.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('backend.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255|unique:blogs',
            'content'   => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data            = $request->only(['title', 'content']);
        $data['user_id'] = auth()->id();
        $data['slug']    = Str::slug($request->title, '-');

        if ($request->hasFile('thumbnail')) {
            $file              = $request->file('thumbnail');
            $randomName        = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path              = $file->storeAs('blogs', $randomName, 'public');
            $data['thumbnail'] = $path;
        }

        Blog::create($data);

        toast('Blog berhasil ditambahkan', 'success');
        return redirect()->route('backend.blogs.index');
    }

    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    public function show(Blog $blog)
    {
        return view('backend.blog.show', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'     => 'required|string|max:255|unique:blogs,title,' . $blog->id,
            'content'   => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data         = $request->only(['title', 'content']);
        $data['slug'] = Str::slug($request->title, '-');

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($blog->thumbnail && \Storage::disk('public')->exists($blog->thumbnail)) {
                \Storage::disk('public')->delete($blog->thumbnail);
            }

            $file              = $request->file('thumbnail');
            $randomName        = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $path              = $file->storeAs('blogs', $randomName, 'public');
            $data['thumbnail'] = $path;
        }

        $blog->update($data);

        toast('Blog berhasil diupdate', 'success');
        return redirect()->route('backend.blogs.index');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->thumbnail && \Storage::disk('public')->exists($blog->thumbnail)) {
            \Storage::disk('public')->delete($blog->thumbnail);
        }

        $blog->delete();
        toast('Blog berhasil dihapus', 'success');
        return redirect()->route('backend.blogs.index');
    }
}

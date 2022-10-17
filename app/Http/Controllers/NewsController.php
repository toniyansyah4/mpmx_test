<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News\News;
use App\Models\News\Categorys;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::with('category')->paginate(10);

        return view('news', compact('news'));
    }

    public function add()
    {
        $categorys = Categorys::all();

        return view('news.add', compact('categorys'));
    }

    public function edit($slug)
    {
        $news = News::where('slug', $slug)->first();

        $categorys = Categorys::get();

        return view('news.edit', compact('news', 'categorys'));
    }

    public function read($slug)
    {
        $news = News::with("category")->where('slug',$slug)->first();

        return view('news.read', compact('news'));
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'content' => 'required|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $now = Carbon::now();

        $news = new News;
        $news->title = $request->title;
        $news->slug = strtolower($request->title . '-' . $now);
        $news->category_id = $request->category_id;
        $news->banner = $request->file('banner')->store('banners');
        $news->content = $request->content;
        $news->save();

        return redirect()->route('admin')->with('success', 'News telah berhasil ditambahkan');
    }

    public function update(Request $request, $slug)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category_id' => 'required',
            'banner' => 'required|mimes:jpg,png,jpeg,svg|max:2048',
            'content' => 'required|max:255',
        ];
        $this->validate($request, $rules);

        $now = Carbon::now();

        $news = News::where('slug', $slug)->first();
        $news->title = $request->title;
        $news->slug = strtolower($request->title . '-' . $now);
        $news->category_id = $request->category_id;
        if ($news->banner) {
            Storage::delete($news->banner);
        }
        $news->banner = $request->file('banner')->store('banners');
        $news->content = $request->content;
        $news->save();

        return redirect()->route('admin')->with('success', 'News telah berhasil diupdate');
    }

    public function destroy($slug)
    {
        $news = News::where('slug', $slug)->first();
        if ($news->banner) {
            Storage::delete($news->banner);
        }
        $news->delete();

        return redirect()->route('admin')->with('danger', 'News telah berhasil dihapus');
    }
}

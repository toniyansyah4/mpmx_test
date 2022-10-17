<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News\Categorys;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Categorys::orderBy('id', 'DESC')->get();

        return view('category.category', compact('categorys'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function edit($slug)
    {
        $category = Categorys::where('slug', $slug)->first();

        return view('category.edit', compact('category'));
    }

    public function read($slug)
    {
        $category = Categorys::where('slug', $slug)->first();

        return view('category.read', compact('category'));
    }

    public function create(Request $request)
    {
        $rules = [
            'category' => 'required|string|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $now = Carbon::now();

        $category = new Categorys;
        $category->category = $request->category;
        $category->slug = strtolower($request->category . '-' . $now);
        $category->save();

        return redirect()->route('category')->with('success', 'Category telah berhasil di tambahkan');
    }

    public function update(Request $request, $slug)
    {
        $rules = [
            'category' => 'required|string|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $categorys = Categorys::where('slug', $slug)->first();
        $categorys->category = $request->category;
        $categorys->save();

        return redirect()->route('category')->with('success', 'Category telah berhasil diupdate');
    }

    public function destroy($slug)
    {
        $categorys = Categorys::where('slug', $slug)->first();

        $categorys->delete();

        return redirect()->route('category')->with('danger', 'Category telah berhasil dihapus');
    }

}

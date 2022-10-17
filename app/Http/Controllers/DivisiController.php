<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Managements\Divisi;
use Illuminate\Support\Carbon;

class DivisiController extends Controller
{
    public function index()
    {
        $divisi = Divisi::orderBy('id', 'DESC')->get();

        return view('divisi.divisi', compact('divisi'));
    }

    public function add()
    {
        return view('divisi.add');
    }

    public function edit($id)
    {
        $divisi = Divisi::where('id', $id)->first();

        return view('divisi.edit', compact('divisi'));
    }

    public function read($id)
    {
        $divisi = Divisi::where('id', $id)->first();

        return view('divisi.read', compact('divisi'));
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $now = Carbon::now();

        $divisi = new Divisi;
        $divisi->name = $request->name;
        $divisi->save();

        return redirect()->route('divisi')->with('success', 'Divisi telah berhasil di tambahkan');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $divisi = Divisi::where('id', $id)->first();
        $divisi->name = $request->name;
        $divisi->save();

        return redirect()->route('divisi')->with('success', 'Divisi telah berhasil diupdate');
    }

    public function destroy($id)
    {
        $divisi = Divisi::where('id', $id)->first();

        $divisi->delete();

        return redirect()->route('divisi')->with('danger', 'Divisi telah berhasil dihapus');
    }

}

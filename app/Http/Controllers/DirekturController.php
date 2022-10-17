<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Managements\Direktur;
use Illuminate\Support\Carbon;

class DirekturController extends Controller
{
    public function index()
    {
        $direkturs = Direktur::orderBy('id', 'DESC')->get();

        return view('direktur.direktur', compact('direkturs'));
    }

    public function add()
    {
        return view('direktur.add');
    }

    public function edit($id)
    {
        $direktur = Direktur::where('id', $id)->first();

        return view('direktur.edit', compact('direktur'));
    }

    public function read($id)
    {
        $direktur = Direktur::where('id', $id)->first();

        return view('direktur.read', compact('direktur'));
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

        $direktur = new Direktur;
        $direktur->name = $request->name;
        $direktur->save();

        return redirect()->route('direktur')->with('success', 'Direktur telah berhasil di tambahkan');
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

        $direktur = Direktur::where('id', $id)->first();
        $direktur->name = $request->name;
        $direktur->save();

        return redirect()->route('direktur')->with('success', 'Direktur telah berhasil diupdate');
    }

    public function destroy($id)
    {
        $direktur = Direktur::where('id', $id)->first();

        $direktur->delete();

        return redirect()->route('direktur')->with('danger', 'Direktur telah berhasil dihapus');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Managements\Departement;
use Illuminate\Support\Carbon;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::orderBy('id', 'DESC')->get();

        return view('departement.departement', compact('departements'));
    }

    public function add()
    {
        return view('departement.add');
    }

    public function edit($id)
    {
        $departement = Departement::where('id', $id)->first();

        return view('departement.edit', compact('departement'));
    }

    public function read($id)
    {
        $departement = Departement::where('id', $id)->first();

        return view('departement.read', compact('departement'));
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

        $departement = new Departement;
        $departement->name = $request->name;
        $departement->save();

        return redirect()->route('departement')->with('success', 'Departement telah berhasil di tambahkan');
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

        $departement = Departement::where('id', $id)->first();
        $departement->name = $request->name;
        $departement->save();

        return redirect()->route('departement')->with('success', 'Departement telah berhasil diupdate');
    }

    public function destroy($id)
    {
        $departement = Departement::where('id', $id)->first();

        $departement->delete();

        return redirect()->route('departement')->with('danger', 'Departement telah berhasil dihapus');
    }

}

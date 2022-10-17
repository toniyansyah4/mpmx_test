<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Managements\Managements;
use Illuminate\Support\Carbon;
use App\Models\Managements\Departement;
use App\Models\Managements\Divisi;
use App\Models\Managements\Direktur;
use App\Models\User;


class ManagementsController extends Controller
{
    public function index()
    {
        $managements = Managements::with([
            'departement', 'direktur', 'divisi', 'user'
        ])
        ->orderBy('id', 'DESC')->get();

        return view('managements.managements', compact('managements'));
    }

    public function add()
    {

        $departements = Departement::all();
        $divisi = Divisi::all();
        $direkturs = Direktur::all();
        $users = User::where('level_id', 2)->get();

        return view('managements.add', compact('departements', 'divisi', 'direkturs', 'users'));
    }

    public function edit($id)
    {
        $departements = Departement::all();
        $divisi = Divisi::all();
        $direkturs = Direktur::all();
        $users = User::where('level_id', 2)->get();

        $management = Managements::with([
            'departement', 'direktur', 'divisi', 'user'
        ])->where('id', $id)->first();

        return view('managements.edit', compact('management', 'departements', 'divisi', 'direkturs', 'users'));
    }

    public function read($id)
    {
        $management = Managements::with([
            'departement', 'direktur', 'divisi', 'user'
        ])->where('id', $id)->first();

        return view('managements.read', compact('management'));
    }

    public function create(Request $request)
    {
        $rules = [
            'position' => 'required|string|max:255',
            'level' => 'required',
            'jobdesc' => 'required'
        ];
        $this->validate($request, $rules);

        $management = new Managements;
        $management->direktur_id = $request->direktur_id;
        $management->departement_id = $request->departement_id;
        $management->divisi_id = $request->divisi_id;
        $management->user_id = $request->user_id;
        $management->position = $request->position;
        $management->jobdesc = $request->jobdesc;
        $management->level = $request->level;

        $management->save();

        return redirect()->route('management')->with('success', 'Management telah berhasil di tambahkan');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'direktur_id' => 'required',
            'departement_id' => 'required',
            'divisi_id' => 'required',
            'user_id' => 'required',
            'position' => 'required|max:255',
            'jobdesc' => 'required|max:255',
            'level' => 'required'
        ];
        $messages = [
            'required' => 'Field is required',
            'max' => 'Max length is 255',
        ];
        $this->validate($request, $rules, $messages);

        $managements = Managements::where('id', $id)->first();
        $managements->direktur_id = $request->direktur_id;
        $managements->departement_id = $request->departement_id;
        $managements->divisi_id = $request->divisi_id;
        $managements->user_id = $request->user_id;
        $managements->position = $request->position;
        $managements->jobdesc = $request->jobdesc;
        $managements->level_id = $request->level;
        $managements->save();

        return redirect()->route('management')->with('success', 'Management telah berhasil diupdate');
    }

    public function destroy($id)
    {
        $managements = Managements::where('id', $id)->first();

        $managements->delete();

        return redirect()->route('management')->with('danger', 'Management telah berhasil dihapus');
    }
    
}

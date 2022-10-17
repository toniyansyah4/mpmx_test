<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users\Level;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::with('level')->paginate(10);

        return view('user.user', compact('users'));
    }

    public function add()
    {
        $levels = Level::all();

        return view('user.add', compact('levels'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();

        $levels = Level::get();

        return view('user.edit', compact('user', 'levels'));
    }

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
            'level_id' => 'required'
        ];
        $this->validate($request, $rules);

        $now = Carbon::now();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        return redirect()->route('user')->with('success', 'User telah berhasil di tambahkan');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
            'level_id' => 'required'
        ];
        $this->validate($request, $rules);

        $user = User::where('id', $id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level_id = $request->level_id;
        $user->save();

        return redirect()->route('user')->with('success', 'User telah berhasil diupdate');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();

        return redirect()->route('user')->with('danger', 'User telah berhasil dihapus');
    }

    public function read($id)
    {
        $user = DB::table('users')
            ->select([
                'users.id as id',
                'users.name as name',
                'users.email as email',
                'level.level as level',
            ])
            ->leftjoin('level', 'users.level_id', '=', 'level.id')
            ->where('users.id', $id)
            ->first();

        return view('user.read', compact('user'));
    }
}

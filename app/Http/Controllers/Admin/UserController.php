<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\Categories\Create;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->except(Auth::id());

        return \view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {

    }

    public function store(Create $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($categories)
    {

    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);
        
        $status = $request->json('status');
        $user->is_admin = $status;
        $user->save();
        return response()->json($status);
    }

    public function destroy($request)
    {

    }
}

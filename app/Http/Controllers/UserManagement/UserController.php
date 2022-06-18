<?php

namespace App\Http\Controllers\UserManagement;

use App\Actions\CustomCreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Pbt;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        
    }
    
    public function index(Request $request)
    {
        $pbts = Pbt::notKKTP()->get();
        $roles = Roles::all();

        info($roles);

        $name = $request->input('name');
        $identity_no = $request->input('identity_no');
        $role = $request->input('role');
        $pbt = $request->input('pbt');

        $users = User::when($name, function($query) use ($name) {
                return $query->where('name', 'LIKE', '%'.$name.'%');
            })
            ->when($identity_no, function($query) use ($identity_no) {
                return $query->where('identity_no', 'LIKE', '%'.$identity_no.'%');
            })
            ->when($pbt, function ($query) use ($pbt) {
                return $query->where('current_pbt', $pbt);
            })
            ->when($role, function ($query, $role) {
                return $query->join('model_has_roles', function ($join) use ($role) {
                    $join->on('model_has_roles.model_id', '=', 'users.id')
                        ->where('model_has_roles.model_type', '=', 'App\Models\User')
                        ->where('model_has_roles.role_id', '=', $role);
                });
            })
            ->paginate(25);

        return view('usermanagement.user.index', compact('users', 'roles', 'pbts'));
    }

    // show new user form
    public function create()
    {
        $roles = Roles::all();
        $pbts = Pbt::all();
        return view('usermanagement.user.register', ['pbts' => $pbts, 'roles' => $roles]);
    }

    // register new user
    public function store(Request $request, CustomCreateNewUser $creator)
    {
        event(new Registered($user = $creator->create($request->all())));
        return redirect( route('usermgmt.user.index') );
    }

    public function view($uuid)
    {
        $user = User::findOrFail($uuid);
        return view('usermanagement.user.view', compact('user'));
    }

    public function edit($uuid)
    {
        $user = User::findOrFail($uuid);
        return view('usermanagement.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($uuid)
    {
        return redirect( route('usermgmt.user.index') );
    }
}

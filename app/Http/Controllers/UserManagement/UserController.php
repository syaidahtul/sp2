<?php

namespace App\Http\Controllers\UserManagement;

use App\Actions\CustomCreateNewUser;
use App\Http\Controllers\Controller;
use App\Models\Pbt;
use App\Models\Roles;
use App\Models\User;
use App\Services\PbtService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class UserController extends Controller
{

    use WithPagination;

    public PbtService $pbtService;

    public function __construct(PbtService $pbtService)
    {
            $this->pbtService = $pbtService;
    }
    
    public function index(Request $request)
    {
        $pbts = $this->pbtService->getPbtDropdown();
        $roles = Roles::all();
        
        $users = User::query()
            ->when($request->input('name'), fn($query, $name) => $query->where('name', 'LIKE', '%'.$name.'%'))
            ->when($request->input('identity_no'), fn($query, $identity_no) => $query->where('identity_no', 'LIKE', '%'.$identity_no.'%'))
            ->when($request->input('pbt'), fn($query, $pbt) => $query->where('current_pbt', $pbt))
            ->when($request->input('role'), fn($query, $role) => $query->join('model_has_roles', function ($join) use ($role) {
                $join->on('model_has_roles.model_id', '=', 'users.id')
                    ->where('model_has_roles.model_type', '=', 'App\Models\User')
                    ->where('model_has_roles.role_id', '=', $role);
                }))
            ->paginate(25);

        return view('usermanagement.user.index', compact('users', 'roles', 'pbts'));
    }

    public function getRowsQueryProperty()
    {
        $query = User::query()
            ->when($this->filters['status'], fn($query, $status) => $query->where('status', $status))
            ->when($this->filters['amount-min'], fn($query, $amount) => $query->where('amount', '>=', $amount))
            ->when($this->filters['amount-max'], fn($query, $amount) => $query->where('amount', '<=', $amount))
            ->when($this->filters['search'], fn($query, $search) => $query->where('title', 'like', '%'.$search.'%'));

        return $this->applySorting($query);
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

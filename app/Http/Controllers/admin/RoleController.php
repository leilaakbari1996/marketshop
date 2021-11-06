<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':read-role');
        $this->middleware(CheckPermission::class.':create-role')->only('create');
        $this->middleware(CheckPermission::class.':update-role')->only(['edit','update']);
        $this->middleware(CheckPermission::class.':delete-role')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index',[
            'title' => 'لیست نقش ها',
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.create',[
            'title' => 'ایجاد نقش',
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::query()->create([
             'title' => $request->get('title')
        ]);
        $role->permissions()->attach($request->get('permissions'));
        return redirect(route('admin.role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit',[
            'title' => $role->title,
            'permissions' => Permission::all(),
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update([
            'title' => $request->get('title')
        ]);
        $role->permissions()->sync($request->get('permissions'));
        return redirect(route('admin.role.edit',$role));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->title == 'user' || $role->title == 'admin'){
            return redirect(route('admin.role.index'))->withErrors([
                'title' => $role->title.' نمی تواند حذف شود.'
            ]);
        }
        $role->permissions()->detach();
        $role->delete();
        return redirect(route('admin.role.index'));
    }
}

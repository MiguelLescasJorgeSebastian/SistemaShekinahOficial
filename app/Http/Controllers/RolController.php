<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//agregamos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RolController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol', ['only' => ['index']]);
         $this->middleware('permission:crear-rol', ['only' => ['create','store']]);
         $this->middleware('permission:editar-rol', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
         //Con paginación
         $roles = Role::paginate(5);
         return view('admin.roles.index',compact('roles'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $roles->links() !!} 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array|exists:permissions,id',
        ]);
        $role = Role::create(['name'=>$request->input('name')]);
        $permission_ids = $request->input('permission');
        $permissions = Permission::whereIn('id', $permission_ids)->get();
        $role->syncPermissions($permissions);
        return redirect()->route('admin.roles.index');                        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $permission_ids = $request->input('permission');
        $permissions = Permission::whereIn('id', $permission_ids)->get();
        $role->syncPermissions($permissions);
    
        return redirect()->route('admin.roles.index');                        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('admin.roles.index');                        
    }
}
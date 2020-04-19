<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;

class RoleController extends Controller
{
    private  $rolesPrincipales = ['Admin','Client','Customer'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate();
        $rolesPrincipales = $this->rolesPrincipales;

        return view('roles.index', compact('roles','rolesPrincipales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        $disabled = false;
        return view('roles.create', compact('permissions','disabled'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = new Role;
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->description = $request->description;
        $role->save(); 

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('roles.show', compact('role'));
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
        $disabled = true;

        return view('roles.edit', compact('role', 'permissions', 'disabled'));
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
        $role = Role::find($id);
        $role->slug = $request->slug;
        $role->description = $request->description;
        $role->save(); 

        $role->permissions()->sync($request->get('permissions'));

        return redirect()->route('roles.index')
            ->with('info', 'Rol guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        $rolesPrincipales = $this->rolesPrincipales;

        if(!in_array($user->name,$rolesPrincipales)){
            $user->delete();
            return back()->with('info', 'Eliminado correctamente');
        }else{
            return back()->with('warning', 'Usuario principal no se puede eliminar');
        }
    }
}

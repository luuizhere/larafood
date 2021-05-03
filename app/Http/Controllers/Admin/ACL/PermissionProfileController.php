<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{
    protected $profile,$permission;
    public function __construct(Profile $profile,Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }


    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);
        if(!$profile)
        {   
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index',compact('profile','permissions'));
    }

    public function permissionsAvailable(Request $request, $idProfile)
    {
        if(!$profile = $this->profile->find($idProfile))
        {   
            return redirect()->back();
        }
        $filters = $request->except('_token');

        $permissions =  $profile->permissionsAvailable($request->filter);
        
        return view('admin.pages.profiles.permissions.available',compact('profile','permissions','filters'));
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if(!$profile = $this->profile->find($idProfile))
        {   
            return redirect()->back();
        }

        if( !$request->permissions || count($request->permissions) == 0)
        {   
            return redirect()
            ->back()
            ->with('info','Você precisa selecionar ao menos uma Permissão');
        }
        
        // dd($request->permissions);
        $profile->permissions()->attach($request->permissions);
        return redirect()->route('profiles.permissions',$profile->id);
    }


}

<?php

namespace App\Http\Controllers;

use App\Enums\User_role;
use App\Enums\User_status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        //        $users = User::query()->where('status','=',User_status::ACTIVE)->paginate(1);
        $users = User::all();
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $role = $request->query('role') ? $request->query('role') : "";
        $search = $request->query('search');
        $query_builder = User::query();
        if ($search && strlen($search) > 0) {
            $query_builder = $query_builder->where('user_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('address', 'like', '%' . $search . '%');
        }
        if ($role != "") {
            $query_builder = $query_builder->where('role','=', $role);
        }
        $users = $query_builder->where('status','=',User_status::ACTIVE)->paginate($limit)->appends(['search'=>$search,'role'=>$role]);
        return view('Admin.users', [
            'users' => $users,
            'role' => $role,
            'search' => $search
            ]);
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return back();
    }
    public function destroy($user){
        $this_user = User::find($user);
        $this_user->status = User_status::DELETE;
        $this_user->save();
        return back();
    }
    public function show($user){
        $this_user = User::find($user);
        return view('Admin.user-profile',['user'=>$this_user]);
    }
    public function upgrade($user){
        $this_user = User::find($user);
        $this_user->role = User_role::ADMIN;
        $this_user->save();
        return back();
    }
    public function edit($user){
        $this_user = User::find($user);
        return view('Admin.user-edit',['user'=>$this_user]);
    }
    public function update(Request $request,$user){
        $this_user = User::find($user);
        $new_data = $request->all();
        if ($new_data['password']){
            $new_data['password'] = Hash::make($new_data['password']);
        }else{
            unset($new_data['password']);
        }
        $this_user->update($new_data);
        $this_user->save();
        return redirect()->route('user.show',$this_user->id);
    }

}

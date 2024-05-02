<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user= User::latest()->get();

        return view('setting.user.index',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::where('branch_status', 1)->get();
        $roles = Role::get();
        return view('setting.user.new',['roles'=>$roles , 'branches' => $branches]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    



    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);
    
            $user = new User;
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email']; 
            $user->branch_id = $request->branch_id;
            $user->password = bcrypt($validatedData['password']);
            $user->syncRoles($request->roles);
            $user->save();
    
            return back()->with('success', 'User created successfully!');
        } catch (\Exception $exception) {
            $error = $exception->getMessage() . ' - line - ' . $exception->getLine();
            
         
        }
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
    public function edit(Request $request , User $user)
    {
        $branches = Branch::where('branch_status', 1)->get();
        $role = Role::get();
        $user->roles;
        
       return view('setting.user.edit',['user'=>$user,'roles' => $role , 'branches' => $branches]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





     public function update(Request $request){

        try{
 
 
        $user = User::where('id',$request->user_id)->get()->first();
     

                if($user != null){

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->branch_id = $request->branch_id;
                    $user->password = bcrypt($request->password);
                    $user->syncRoles($request->roles);
                  
                    $user->save();
                   

                   
                    return back()->with('success','User updated successfully !');

                }else{
                    return back()->with('error','Could not find the User.');
                }



         

        }catch(\Exception $exception){

            $error = $exception->getMessage().' - line - '.$exception->getLine();
           

        }

    }



 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Role $role)
    // {
    //     dd('ddd');
    //     $role->delete();
    //     return redirect()->back()->withSuccess('Role deleted !!!');
    // }

    public function destroy(Request $request){


   

        try{


            User::where('id',$request->user_Id)->delete();
            return back()->with('success','User deleted !!!');

        }catch(\Exception $exception){
            return back()->with('error','Error occured - '.$exception->getMessage());
        }

     
    }
     
}

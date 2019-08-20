<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Model\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use PhpParser\Node\Stmt\Echo_;

class AdminController extends Controller
{
    //construct is define for POST,PUT

//    public function __construct()
//    {
//        $this->middleware('auth:api')->except('index', 'show');
//    }

    public function index()
    {
        $userList = UserCollection::collection(User::all());

        return view('adminPanel', ['userList'=> $userList]);
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'city' => 'required',
            'password' => 'required'
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect()->route('admins.index');


    }

    public function show(User $admin)
    {
        $userList = UserCollection::collection(User::all());
        $userUpdate = $admin;
        return view('adminPanel',['userUpdate' => $userUpdate, 'userList'=> $userList]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        echo "Edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $admin->update($request->all());
        return redirect('admins.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect('admins.index');
    }
}

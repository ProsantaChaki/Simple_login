<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  to display all information about user

        $users = User::all();

        //return $users;



        return view('user.profile.update', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /*
                 $roles = Role::pluck('name','id')->all();
                return view('admin.users.create', compact('roles'));
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //



        /*
                if(trim($request->password) == ''){
                    $input = $request->except('password');

                } else{
                    $input = $request->all();
                    $input['password'] = bcrypt($request->password);
                }

                if($file = $request->file('photo_id')) {
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['file'=>$name]);
                    $input['photo_id'] = $photo->id;
                }

                User::create($input);
                return redirect('/admin/users');
        //        return $request->all();



        */



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
        /*
                return view('admin.uses.show');
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        /*
                $user = User::findOrFail($id);
                $roles = Role::pluck('name','id')->all();
                return view('admin.users.edit', compact('user','roles'));
        */


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
        //
        /*
                $user = User::findOrFail($id);
                if(trim($request->password) == ''){
                    $input = $request->except('password');
                } else{
                    $input = $request->all();
                    $input['password'] = bcrypt($request->password);

                }




                if($file = $request->file('photo_id')){
                    $name = time() . $file->getClientOriginalName();
                    $file->move('images', $name);
                    $photo = Photo::create(['file'=>$name]);
                    $input['photo_id'] = $photo->id;


                }



                $user->update($input);
                return redirect('/admin/users');
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        /*
                $user = User::findOrFail($id);
                unlink(public_path() . $user->photo->file);
                $user->delete();
                Session::flash('deleted_user','The user has been deleted');
                return redirect('/admin/users');
        */
    }
}

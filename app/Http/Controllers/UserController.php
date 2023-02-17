<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('pages.user', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'nik' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|min:8|string',
        ]);

        $validate['password'] = Hash::make($request->password);
        $validate['is_admin'] = false;

        User::create($validate);

        return redirect('user')->with('success', 'Data User Berhasil Diinputkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        if($request->nik != $user->nik){
            $this->validate($request, [
                'nik' => 'unique:users',
            ]);
        }

        if($request->email != $user->email){
            $this->validate($request, [
                'email' => 'unique:users',
            ]);
        }

        $validate = $request->validate([
            'name' => 'required',
            'nik' => 'required',
            'email' => 'required',
        ]);

        if(isset($request->password)){
            $this->validate($request, [
                'password' => 'required|confirmed|min:8|string',
            ]);

            $validate['password'] = Hash::make($request->password);
        }

        $user->update($validate);

        return redirect('user')->with('success', 'Data User Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    
    public function delete($id){
        User::find($id)->delete();

        return redirect('user')->with('success', 'Data User Berhasil Dihapus!');
    }
}

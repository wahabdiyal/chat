<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
 

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       public function showView()
    {
       
      return view('myview');
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser(Request $request)
    {

        $request->validate([
           'email' => 'regex:/^.+@.+$/i',
          
            'password' => 'required',
              
           ]);
       // dd($request->all());
        $user = User::where('email',$request->email)->first();

        if ($user) {
             if(\Hash::check($request->password, $user->password)){
               \Session::put('user', $user);
          return redirect('/messagebox');

             }
        }
      
       return 'Error user not found';
       
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
        //
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
    }
}

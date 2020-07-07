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
        //
        return view('insert');
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
        //
        $input = $request->all();

        // VALIDARI
        // $validatedData = $request->validate([
        //     'promotional_code' => 'required|max:8|exists:laravel_voxline.promotional_codes',
            
        // ]);

        $this->validate($request,[
            'name'=> 'required',
            'mobile_number'=>'required',
            'promotional_code' => 'required|unique:users,promotional_code|exists:promotional_codes,promotional_code|min:8|max:8',
            'GDPR'=> 'required',
            'terms'=> 'required',


        ],[
            'name.required'=>'You need to insert your name.',
            'mobile_number.required'=>'You need to insert your mobile number.',
            'promotional_code.required'=>'You need to insert your promotional code.',
            'GDPR.required'=>'You need to accept General Data Protection Regulation.',
            'terms.required'=>'You need to accept our terms and conditions.',
            'promotional_code.unique'=>'This promotional code is already registered.',
            'promotional_code.exists'=>'This promotional code it\'s not valid. Please try insert a correct one.',
        ]);

    

        User::create($input);

        return redirect()->back()->with('message', 'Your promotional code is registered successfully.');;
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

<?php

namespace App\Http\Controllers;

use App\Models\StaffInformation;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('staffInformation')->get();
        return view('staff', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-staff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        $infor = new StaffInformation();
        $infor->name = $request->input('name');
        $infor->birthday = $request->input('birthday');
        $infor->phone = $request->input('phone');
        $infor->user_id = $user->id;
        $infor->save();

        return redirect()->route('staff.index');
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
        // dd($id);
        $users = User::find($id);

        $infor = StaffInformation::where('user_id', $id)->get();
        // dd($infor);
        return view('edit-staff', compact('users', 'infor'));
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
        $user = User::findOrFail($id);
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->update();

        $infor = StaffInformation::where('user_id', $id)->firstOrFail();
        $infor->name = $request->input('name');
        $infor->birthday = $request->input('birthday');
        $infor->phone = $request->input('phone');
        $infor->user_id = $user->id;

        $infor->update();
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $infor = StaffInformation::where('user_id', $id)->firstOrFail();
        $user->delete();
        $infor->delete();
        return redirect()->route('staff.index');
    }
}

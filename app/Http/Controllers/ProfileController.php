<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        $user=Auth::user();//يمكن إحضار البيانات من ثاعدةر البيانات ولكن الاوس تفيدني كذلك
        $id=Auth::id();
       if ($user->profile==null)
       {
        $profile=Profile::create([

          "user_id" => $id
           ,"province" =>'Aleppo'
           ,"gender"=>'male'
           ,"bio" =>'Hello world'
          ,"facebook" => 'https://www.facebook.com'

        ]);
       }
        return view('users.profile')->with('user',$user);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            "name" =>'required'
            ,"province" =>'required'
            ,"gender"=>'required'
            ,"bio" =>'required'


        ]);
        $user=Auth::user();
        $user->name=$request->name;
        $user->profile->province=$request->province;
        $user->profile->gender=$request->gender;
        $user->profile->bio=$request->bio;
        $user->save();
        $user->profile->save();
//        dd($request->all());
        if ($request->has('password'))
        {
//            $user->password=bycrpt($request->password);
            $user->save();
        }
        return redirect()->back();
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

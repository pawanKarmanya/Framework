<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Project/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
           $validator = Validator::make($request->all(), [
                    'FirstName' => 'required|max:255',
                    'LastName' => 'required|max:255',
                    'GenderId' => 'required|max:6',
                    'UserName' => 'required|max:255',
                    'Password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            
           return redirect('registration')
                            ->withErrors($validator)
                            ->withInput();
        }
        else{
            $FirstName=$request->FirstName;
            $LastName=$request->LastName;
            $GenderId=$request->GenderId;
            $UserName=$request->UserName;
            $Password=$request->Password;
            $ValidationToken=  str_shuffle($UserName);
            $InsertValues = User::create(['FirstName' => $FirstName,
               'LastName'=>$LastName,
                'GenderId'=>$GenderId,
                'UserName'=>$UserName,
                'Password'=>$Password,
                'ValidationToken'=>$ValidationToken,
                'IsValidated'=>0,
                'CreatedAt'=>  Carbon::now()
                ]);
        }
    }
    public function createView()
    {
        //
        return view('Project/RegistrationForm');
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

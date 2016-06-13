<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FormController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user() {
//        $username=Auth::user();
//       $user=User::where('UserName',$username->UserName)->first();
//        $user->decrement('IsDeleted');
//        $user->save();
//        echo User::find(1);
    }

    public function index() {
        //

        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('pages/examples/login');
        }
    }

    public function main() {
        //Auth::logout();
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        //
        $validator = Validator::make($request->all(), [
                    'FirstName' => 'required|max:255',
                    'LastName' => 'required|max:255',
                    'GenderId' => 'required|max:6',
                    'UserName' => 'required|email',
                    'Password' => 'required|min:8',
        ]);

        if ($validator->fails()) {

            return redirect('registration')
                            ->withErrors($validator)
                            ->withInput();
        } else {


            $FirstName = $request->FirstName;
            $LastName = $request->LastName;
            $GenderId = $request->GenderId;
            $UserName = $request->UserName;
            $Password = $request->Password;
            $ValidationToken = md5($UserName);
            $LogIn = User::where('UserName', $UserName)->count();
            if ($LogIn == 1) {

                $errorMessage = "UserName Already registered Please use other Email address";
                return view('pages/examples/RegistrationForm')->with('errorMessage', $errorMessage);
            } else {
                $InsertValues = User::create(['FirstName' => $FirstName,
                            'LastName' => $LastName,
                            'GenderId' => $GenderId,
                            'UserName' => $UserName,
                            'Password' => $Password,
                            'ValidationToken' => $ValidationToken,
                            'CreatedAt' => Carbon::now()
                ]);

                $Link = "http://framework.karmanya.co.in/validate/" . $ValidationToken;


                Mail::raw($Link, function ($message)use ($UserName) {
                    //
                    $message->from('pawankumar.s@karmanya.co.in', 'Registration');

                    $message->to($UserName)->subject('Validate the Registration');
                });
                $Message = "Registration complete please validate the link sent to your email";
                return view('pages/examples/RegistrationForm')->with('message', $Message);
            }
        }
    }

    public function forgotpassword() {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('pages/examples/forgotpassword');
        }
    }

    public function passwordforgot(Request $request) {

        $validator = Validator::make($request->all(), [

                    'UserName' => 'required|email',
        ]);

        if ($validator->fails()) {

            return redirect('forgotpassword')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $UserName=$request->UserName;
            $validate=User::where('UserName',$UserName)->count();
            if($validate==1){
                $getPassword=User::where('UserName',$UserName)->first();
                   $password=$getPassword->Password;     
                Mail::raw($password, function ($message)use ($UserName) {
                    //
                    $message->from('pawankumar.s@karmanya.co.in', 'Registration');

                    $message->to($UserName)->subject('Password');
                });
                $Message = "Password Has been sent to your email address";
                return view('pages/examples/forgotpassword')->with('message', $Message);
            
            }
            else{
                    $Message = "UserName doesn't exits";
                return view('pages/examples/forgotpassword')->with('message', $Message);
            
            }
        }
    }

    public function createView() {
        //
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('pages/examples/RegistrationForm');
        }
    }

    public function validateToken($token) {

        $Id = User::where('ValidationToken', $token)->count();
        if ($Id == 1) {
            $IsValidate = User::select('IsValidated')->where('ValidationToken', $token)->get();
            $Isval = $IsValidate->toArray();

            if ($Isval[0]['IsValidated'] == 0) {

                User::where('ValidationToken', $token)
                        ->update(['IsValidated' => 1]);
                $message = "Profile has been activated";
                return view('Project/Valid', ['message' => $message]);
            } else {

                $message = "Link has expired";
                return view('Project/Valid', ['message' => $message]);
            }
        }
    }

    public function loginUser(Request $request) {

        $validator = Validator::make($request->all(), [
                    'UserName' => 'required|email',
                    'Password' => 'required|min:8',
        ]);

        if ($validator->fails()) {

            return redirect('login')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $UserName = $request->UserName;
            $Password = $request->Password;
            $LogIn = User::where('UserName', $UserName)
                            ->where('Password', $Password)->count();

            if ($LogIn == 0) {
                $message = "UserName Password doesn't exit";
                return view('pages/examples/login')->with('message', $message);
            } else {
                $user = User::where('UserName', $UserName)->where('Password', $Password)->first();
                Auth::login($user);
                return redirect()->intended('/');
                //return redirect::route("/");
                //return view('index');
            }
        }
    }

    public function logout() {
        Session::flush();
        return redirect::route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword() {


        return view('pages/examples/changePassword');
    }

    public function changeSubmit(Request $request) {
        $validator = Validator::make($request->all(), [
                    'OldPassword' => 'required|min:8',
                    'NewPassword' => 'required|min:8',
        ]);

        if ($validator->fails()) {

            return redirect('changepassword')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $OldPassword = $request->OldPassword;
            $NewPassword = $request->NewPassword;
            $userdetails = Auth::user();

            $LogIn = User::where('UserName', $userdetails->UserName)->where('Password', $OldPassword)->count();
            if ($LogIn == 1) {
                $cityval = User::find($userdetails->Id);
                $cityval->Password = $NewPassword;
                $cityval->save();
                return view('pages/examples/changePassword')
                                ->with('message', 'Password Has Been Changed successfully');
            } else {
                return view('pages/examples/changePassword')
                                ->with('message', 'Please Enter Valid old password');
            }
        }
    }

    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}

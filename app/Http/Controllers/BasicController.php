<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use DB;
use Session;
/*use session_start();*/
class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function logout(Request $request){
      //Session::end();
      //session_end();
      //Auth::logout();
      Session::flush();
      //Session::forget('userid');
      //$request->session->flush();
      /*
      $request->session()->flash('status', 'Task was successful!');
      if($request){
        return redirect('welcome');
      }
      */
      return redirect('welcome');
      
      /*
      if($req->session()->has('userid')){
        return view('dashboard');
      }
      else{
        return view('welcome');
      }
      */
      //return redirect('welcome');
    }
    public function welcome(){
      return view('welcome');
   }
    public function eventdraft(){
      return view('dashboard-event-draft');
    }
    public function login(){
      return view('signin');
   }
   public function myprofile(){
      return view('profile');
   }
   public function editprofile(){
    return view('edit-profile');
   }
   public function calender(){
    return view('calender');
   }
   public function dashboard(){
      //Session::get('userid');
      //session_start();
    /*
      if($req->session()->has('userid')){
        return view('dashboard');
      }
      else{
        return view('login');
      }
    */
      /*
      if(!Session::has('userid')){
            return redirect('/login');
        }else{
          return view('dashboard');
        }
        */
      return view('dashboard');
   }
   public function loginStore(Request $request){
      $email    = $request->email;
      $password = $request->password;
      //$admin     = 1

      /*
      $user = Users::where('email','=',$email)
                     ->where('password','=',$password)
                     ->where('role','=',$admin)
                     ->first();
      
      $obj = new users();
        $obj->name      = $name;
      */
      $user = users::where('email','=',$email)
                     ->where('password','=',$password)
                     ->first();
      if($user){
         //echo 'Role is: '.$user->role;
         // echo 'User is in database';
         Session::put('userid',$user->id);
         return redirect('admin-panel');
      }
      else {
        Session::get('exception','Email and password not matched');
         return redirect('login');
      }

      //echo 'email: '.$email.home' password: '.$password;
   }
   

   ////////////////////////////////////////////////////////////////

   public function signup(){
      //$obj = users::all();
      //return view('try2',['data'=>$obj]);
      return view('try2');
   }

   public function signupStore(Request $req)
   {
      
      $password        = $req->password;
      $confirmpassword = $req->confirmpassword;
      if($password == $confirmpassword){
        $name = $req->name;
        $email = $req->email;
        $phone = $req->phone;
        $address = $req->address;
        $obj = new users();
        $obj->name      = $name;
        $obj->email     = $email;
        $obj->password  = $password;
        $obj->phone     = $phone;
        $obj->address   = $address;

        if($obj->save()){
           echo 'Successfully Inserted';
           return redirect('login');
       }
      }
      else {
        // redirect to previous page and show the error message
        // see how to pass data using 'with' in laravel
      }
    
 }

 public function eventStore(Request $req)
   {

      echo 'Successfully Inserted';
      /*
        $password        = $req->password;
        $confirmpassword = $req->confirmpassword;
        $name = $req->name;
        $email = $req->email;
        $phone = $req->phone;
        $address = $req->address;
        $obj = new users();
        $obj->name      = $name;
        $obj->email     = $email;
        $obj->password  = $password;
        $obj->phone     = $phone;
        $obj->address   = $address;

        if($obj->save()){
           echo 'Successfully Inserted';
           return redirect('login');
       }
      else {
        // redirect to previous page and show the error message
        // see how to pass data using 'with' in laravel
      }
      */
    
 }
 }


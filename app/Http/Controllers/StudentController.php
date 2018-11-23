<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use Session;
class StudentController extends Controller

{
	public function logout(){
	Session::flush();
      return redirect('/');
	}		
    public function signup()
    {
    	return view('signup');
    }
    public function loginStore(Request $request)
    {
      $email    = $request->email;
      $password = $request->password;
      
      $user = User::where('email','=',$email)
                     ->where('password','=',$password)
                     ->first();
      if($user){
         Session::put('userid',$user->id);
         return redirect('home');
      }
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
        $obj = new User();
        $obj->name      = $name;
        $obj->email     = $email;
        $obj->password  = $password;
        $obj->phone     = $phone;
        $obj->address   = $address;

        if($obj->save()){
           echo 'Successfully Inserted';
           return redirect('/');
       }
      }
    }

    public function index()
    {
    	$students = Student::all();
    	return view('welcome',compact('students'));
    }

    public function create()
    {
    	return view('create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
         'firstname' => 'required',
         'lastname' => 'required',
         'email' => 'required',
         'phone' => 'required'
    	]);

    	$student = new Student;
    	$student->first_name = $request->firstname;
    	$student->last_name = $request->lastname;
    	$student->email = $request->email;
    	$student->phone = $request->phone;
       	$student->save();
       	return redirect(route('home'))->with('successMsg','Student Successfully Added');

    }

       public function edit($id)
    {
    	$student = Student::find($id);
    	return view('edit',compact('student'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
         'firstname' => 'required',
         'lastname' => 'required',
         'email' => 'required',
         'phone' => 'required'
    	]);


    	$student = Student::find($id);
    	$student->first_name = $request->firstname;
    	$student->last_name = $request->lastname;
    	$student->email = $request->email;
    	$student->phone = $request->phone;
       	$student->save();
       	return redirect(route('home'))->with('successMsg','Student Successfully Update');
    }

    public function delete($id)
    {
    	
    	Student::find($id)->delete();
    	return redirect(route('home'))->with('successMsg','Student Successfully Delete');
    	/*return view('edit',compact('student'));*/
    }

}

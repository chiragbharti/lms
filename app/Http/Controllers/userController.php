<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class userController extends Controller
{
    //index page
    public function index_page(){
        return view('welcome');
    }


    //sign up
    public function sign_up(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:admins',
            'password'  => 'required',
        ]);

        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request->password
        ];

        DB::table('admins')->insert($data);
        return response()->json(['status'=>"success",'message'=>"Successfully registered"]);
    }


    //login validation
    public function login(Request $request){
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        $login_data = DB::table('admins')->where('email', $request->email)->where('password',$request->password)->first();
        if($login_data){
            // $request->session()->put('admin_id',$login_data->admin_id);
            Session::put('user_id', $login_data->admin_id);
            return response()->json(['status'=>"success",'message'=>"successfully login"]);
        }
        else{
            return response()->json(['status'=>"unsuccessfull",'message'=>"unsuccessfully"]);
        }
    }


    //dashboard
    public function dashboard(Request $request){
        $userId = Session::get('user_id');
        if($userId){
            $user_infos = DB::table('admins')->where('admin_id',$userId)->first();
            $all_books = DB::table('books')->where('status','1')->get();
            $get_student_details = DB::table('students')->where('status','1')->get();
            $issued_books = DB::table('issuedbooks')
                ->join('students', 'students.student_id', '=', 'issuedbooks.student_id')
                ->join('books', 'books.book_id', '=', 'issuedbooks.book_id')
                ->get();

            return view('dashboard',compact('user_infos','all_books','issued_books','get_student_details'));
        }
        else{
            // return response()->json(['status'=>"unsuccessfull",'message'=>"unsuccessfully"]);
            return redirect('/');
        }
    }


    //edit books
    public function edit_book(Request $request){
        $validator = Validator::make($request->all(), [
           'book_id'=>'required',
           'file'    => 'nullable|mimes:jpeg,png,jpg,gif',
           'title' => 'required',
           'author' => 'required',
           'isbn' => 'required',
           'publisher' => 'required',
           'year_publish' => 'required',
           'category' => 'required',
           'quantity' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['status' => "failed", 'errors' => $validator->errors()->first()]);
        }
        else{
            if($request->file('file')){
                $image = $request->file('file');
                $file_name = $image->getClientOriginalName();
                $data = [
                    'images'=>$file_name,
                    'title'=>$request->title,
                    'author'=>$request->author,
                    'isbn'=>$request->isbn,
                    'publisher'=>$request->publisher,
                    'year_published'=>$request->year_publish,
                    'category'=>$request->category,
                    'quantity'=>$request->quantity,
                ];
            }


            $edit_books = DB::table('books')
            ->where('book_id', $request->book_id)
            ->update([
                'title'=>$request->title,
                'author'=>$request->author,
                'isbn'=>$request->isbn,
                'publisher'=>$request->publisher,
                'year_published'=>$request->year_publish,
                'category'=>$request->category,
                'quantity'=>$request->quantity,
            ]);
            if($edit_books){
                if($request->file('file')){
                    $file_path = $image->storeAs('images', $file_name, 'public');
                }
                return response()->json(['status'=>"success",'message'=>"your books is updated successfully"]);
            }
            else{
                return response()->json(['status'=>"failed",'message'=>"Something went wrong please try again later"]);
            }
        }
    }


    //add books
    public function add_book(Request $request){
        $validator = Validator::make($request->all(), [
            'file'    => 'required|mimes:jpeg,png,jpg,gif',
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required',
            'publisher' => 'required',
            'year_publish' => 'required',
            'category' => 'required',
            'quantity' => 'required',
         ]);



         if($validator->fails()){
            return response()->json(['status' => "failed", 'errors' => $validator->errors()->first()]);
         }
         else{
            $image = $request->file('file');
            $file_name = $image->getClientOriginalName();
            $edit_books = DB::table('books')
             ->insert([
                'images'=>$file_name,
                'title'=>$request->title,
                'author'=>$request->author,
                'isbn'=>$request->isbn,
                'publisher'=>$request->publisher,
                'year_published'=>$request->year_publish,
                'category'=>$request->category,
                'quantity'=>$request->quantity,
            ]);

            if($edit_books){
                $file_path = $image->storeAs('images', $file_name, 'public');
                return response()->json(['status'=>"success",'message'=>"your books is addedd successfully"]);
            }
            else{
                return response()->json(['status'=>"failed",'message'=>"Something went wrong please try again later"]);
            }
        }
    }


    //delete books
    public function delete_book(Request $request){
        $validator = Validator::make($request->all(), [
            'book_id'    => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => "failed", 'errors' => $validator->errors()->first()]);
        }
        else{
            $delete_book = DB::table('books')->where('book_id', $request->book_id)->delete();
            if($delete_book){
                return response()->json(['status'=>"success",'message'=>"your books is deleted successfully"]);
            }
            else{
                return response()->json(['status'=>"failed",'message'=>"Something went wrong please try again later"]);
            }
        }
    }


    //edit issued books
    public function edit_issued_books(Request $request){
        $validator = Validator::make($request->all(), [
            'book_id' => 'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => "failed", 'errors' => $validator->errors()->first()]);
        }
        else{
            $edit_issued_books = DB::table('issuedbooks')
            ->where('issue_id', $request->book_id)
            ->update([
                'book_id'=>$request->book_name,
                'due_date'=>$request->due_date,
                'return_date'=>$request->return_date,
            ]);
            if($edit_issued_books){
                return response()->json(['status'=>"success",'message'=>"your issued books is updated successfully"]);
            }
            else{
                return response()->json(['status'=>"failed",'message'=>"Something went wrong please try again later"]);
            }
        }
    }




    //add new issued book
    public function add_new_issued_book(Request $request){
        $validator = Validator::make($request->all(), [
           'student_name' =>'required',
            'book_name' =>'required',
            'issue_date' =>'required',
        ]);
        if($validator->fails()){
            return response()->json(['status' => "failed", 'errors' => $validator->errors()->first()]);
        }
        else{
            // Your initial date
            $initial_date = $request->issue_date;

            // Add 15 days to the date
            $due_date = date('Y-m-d', strtotime($initial_date . ' + 15 days'));


            $add_issued_books = DB::table('issuedbooks')
            ->insert([
                'student_id' => $request->student_name,
                'book_id' => $request->book_name,
                'issue_date' => $initial_date, // This will insert the original issue date
                'due_date' => $due_date, // This will insert the due date, 15 days later
            ]);
            if($add_issued_books){
                return response()->json(['status'=>"success",'message'=>"your new issued books is added successfully"]);
            }
            else{
                return response()->json(['status'=>"failed",'message'=>"Something went wrong please try again later"]);
            }
        }
    }


    //logout
    public function logout(){
        $distroy_session = Session::flush();
        return redirect('/');
    }
}

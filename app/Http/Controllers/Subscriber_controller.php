<?php

namespace App\Http\Controllers;

use App\Models\subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class Subscriber_controller extends Controller
{
    public function create()
    {
        return view('forms.signup');
    }

    static public function userDetail()
    {
        $id = Session::get('id');
        // dd($id);
        $userDetail = subscriber::find($id);
        // return $userDetail;
        return  ['data' => $userDetail];

        
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg'
        ]);
        // user image
        $extension = $request->image->extension();
        // dd($extension);
        $unique_name = time() . '.' . $extension;


        $fname = $request->firstname;
        $lname = $request->lastname;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $image = $request->image->storeAs('public/assets/uploads', $unique_name);


        $contect_user = new subscriber();

        $contect_user->fname = $fname;
        $contect_user->lname = $lname;
        $contect_user->phone = $phone;
        $contect_user->email = $email;
        $contect_user->password = $password;
        $contect_user->image = $unique_name;

        $result = $contect_user->save();

        if ($result) {
            $request->session()->flash('success', 'Registered Successfully');
        } else {
            $request->session()->flash('error', 'Try Again Later');
        }
        return back();
    }

    public function Users_list()
    {
        // $allData = contact_user::all(); // get all data
        $allData = subscriber::paginate(5); // for pagination also add this  (use Illuminate\Pagination\Paginator; and ( Paginator::useBootstrap();) in app/provides/appserviceprovides //


        return view('lists.users_list', ['output' => $allData]);
    }

    public function deleteUser(Request $request, $id = false)
    {
        // echo $id;die;
        $this_user = subscriber::find($id);
        if ($this_user) {
            $this_user->delete();
            $request->session()->flash('success', 'User Deleted Successfully');
        }
        return redirect()->back();
    }

    public function editUser(Request $request, $id = false)
    {
        $edit_user = subscriber::find($id);
        // print_r($edit_user);die;
        return view('update.user_edit', ['data' => $edit_user]);
    }

    public function updateUser(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric|digits:10',
            'password' => 'required',
        ]);

        $id = $request->id;
        $fname = $request->firstname;
        $lname = $request->lastname;
        $phone = $request->phone;
        $password = $request->password;

        $update_user = subscriber::find($id);


        $update_user->fname = $fname;
        $update_user->lname = $lname;
        $update_user->phone = $phone;
        $update_user->password = $password;

        $result = $update_user->save();
        if ($result) {

            $request->session()->flash('success', 'User Data Update Successfully');
        } else {

            $request->session()->flash('error', 'Something Went Wrong? try Again later!');
        }
        return redirect('/user/edit/' . $id);
    }

    public function loginUser(Request $request)
    {
        return view('forms.login');
    }
    public function loginStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $subscriber = Subscriber::where(['email' => $username, 'password' => $password])->first();
        // dd($subscriber);
        if ($subscriber) {
            $request->session()->put('id', $subscriber->id);
            $request->session()->flash('success', 'Logged In Successfully');
            return redirect(route('subject.dashboard'));
        } else {
            $request->session()->flash('error', 'Cnvalid Credentials!');
        }
        return redirect(route('subject.loginUser'));
    }

    // public function dashboard()
    // {
    //     return view('dashboard.dashboard');
    // }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('subject.loginUser');
    }
}

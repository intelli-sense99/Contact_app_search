<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Contact_controller extends Controller
{
    public function contactAdd()
    {
        return view('contacts.add');
    }

    public function contactStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:contacts,email', //uniquer email validator
            'address' => 'required',
            'phone' => 'required|numeric|digits:10',
            'city' => 'required',
            'id' => 'author_id',
            'image' => 'required|image|mimes:jpeg,jpg,png,svg',
        ]);

        // image upload
        $extension = $request->image->extension();
        // dd($extension);
        $unique_name = time() . '.' . $extension;


        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $city = $request->city;
        $is_highlight = $request->is_highlight;

        $author_id = $request->author_id;
        $image = $request->image->storeAs('public/assets/uploads', $unique_name);

        $contacts_obj = new contact(); //model object

        $contacts_obj->fname = $firstName;
        $contacts_obj->lname = $lastName;
        $contacts_obj->email = $email;
        $contacts_obj->phone = $phone;
        $contacts_obj->city = $city;
        $contacts_obj->address = $address;
        $contacts_obj->author_id = $author_id;
        $contacts_obj->image = $unique_name;

        if ($is_highlight == 1) {
            $contacts_obj->is_highlighted = $is_highlight;
        }

        $result = $contacts_obj->save();

        if ($result) {
            $request->session()->flash('success', 'New Contact Added Successfully');
        } else {
            $request->session()->flash('error', 'Try Again Later');
        }
        return back();
    }

    public function contactList(Request $request)
    {
        $id = $request->session()->get('id');

        $contactData = contact::where(['author_id' => $id])->paginate(5);
        // dd($contactData);
        return view('contacts.list', ['data' => $contactData]);
    }

    public function deleteContact(Request $request, $id = false)
    {
        // echo $id;die;

        $this_contact = contact::find($id);
        // dd($this_contact);
        if ($this_contact) {
            $this_contact->delete();
            $request->session()->flash('success', 'Contact Deleted Successfully');
        }
        return redirect()->back();
    }


    public function editContact(Request $request, $id = false)
    {
        $edit_contact = contact::find($id);
        // dd($edit_contact);
        return view('contacts.edit_contact', ['data' => $edit_contact]);
    }

    public function updateContact(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'id' => 'required',
        ]);




        $id = $request->id;
        $fname = $request->firstname;
        $lname = $request->lastname;
        $phone = $request->phone;
        $address = $request->address;
        $is_highlight = $request->is_highlight;


        if ($request->file('image')) {
            $extension = $request->image->extension();
            $unique_name = time() . '.' . $extension;
            $image = $request->image->storeAs('public/assets/uploads', $unique_name);
        }

        $update_contact = contact::find($id);
        // dd($update_contact);


        $update_contact->fname = $fname;
        $update_contact->lname = $lname;
        $update_contact->phone = $phone;
        $update_contact->address = $address;

        // uniquer name condition
        if (!empty($unique_name)) {
            $update_contact->image = $unique_name;
        }

        // is highlight condition update
        if ($is_highlight == 1) {
            $update_contact->is_highlighted = $is_highlight;
        } else {
            $is_highlight = 0;
            $update_contact->is_highlighted = $is_highlight;
        }

        $result = $update_contact->save();
        if ($result) {
            $request->session()->flash('success', 'Contact Update Successfully');
        } else {

            $request->session()->flash('error', 'Something Went Wrong? try Again later!');
        }
        return redirect('/contact/edit/' . $id);
    }

    public function dashboard(Request $request)
    {

        $id = $request->session()->get('id');

        $subscriber = subscriber::find($id);
        $latest_contacts  = $subscriber->contacts;
        // dd($latest_contacts);
        return view('dashboard.dashboard', ['data' => $latest_contacts]);
    }


    static public function getHighlightedContact($id = null)
    {
        $id = Session::get('id');

        $hightlightedContects = contact::where(['is_highlighted' => 1, 'author_id' => $id])->orderBy('created_at', 'desc')->limit(3)->get();
        return $hightlightedContects;
    }

    // public function profile(Request $request, $id = null)
    // {
    //     return redirect('/contact/profile/');
    // }
    public function search(Request $request)
    {
        // dd($request->all());
        $id = $request->session()->get('id');
        $keyword = $request->search ?? null;

        if ($request->search == '1' || $request->search == '0') {

            $data = contact::where('author_id', $id)
                ->where(function ($query) use ($keyword) {
                    $query->Where('is_highlighted', 'like', "%{$keyword}%");
                })->paginate(5);

        } else {
           

            $request->validate([
                'search' => 'min:3'
            ]);

            $data = contact::where('author_id', $id)
                ->where(function ($query) use ($keyword) {
                    $query->Where('fname', 'like', "%{$keyword}%")
                        ->orWhere('lname', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%")
                        ->orWhere('address', 'like', "%{$keyword}%")
                        ->orWhere('phone', 'like', "%{$keyword}%")
                        ->orWhere('is_highlighted', 'like', "%{$keyword}%")
                        ->orWhere('city', 'like', "%{$keyword}%");
                })->paginate(5);
        }


        if (count($data) > 0) {
            return view('contacts.list', ['data' => $data]);
        } else {
            $request->session()->flash('error', 'No Search Results !');
        }


        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    public function index() {
        return view("frontend.index");
    }

    // enter user profile
    public function UserProfile() {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view("frontend.dashboard.edit_profile", compact('userData'));

    }

    // edit profile
    public function UserProfileStore(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file("photo")) {
            $file = $request->file("photo");
            @unlink(public_path("upload/user_images/".$data->photo));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("upload/user_images"), $filename);
            $data["photo"] = $filename;
        }

        $data->save();
        $notification = array(
            "message" => "User profile has been updated successfully",
            "alert-type" => "success",
        );

        return redirect()->back()->with($notification);
    }

    // logout user
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            "message" => "User log out successfully",
            "alert-type" => "success",
        );

        return redirect('/login')->with($notification);
    }

    // changing password
    public function UserChangePassword(Request $request) {
        return view('frontend.dashboard.change_password');
    }

    // save the edited password

    public function UserPasswordUpdate(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'

        ]);

        /// Match The Old Password

        if (!Hash::check($request->old_password, auth::user()->password)) {

        $notification = array(
            'message' => 'Old Password Does not Match!',
            'alert-type' => 'error'
        );

        return back()->with($notification);
        }

        /// Update The New Password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);

        $notification = array(
            'message' => 'Password Change Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    } // end method adminChangePasswordChange
}

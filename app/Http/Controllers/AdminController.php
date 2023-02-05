<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::query()->simplePaginate(5)->where('registerStatus', 0);
        return view("admin.admin_home",compact('user'));
    }

    public function update(Request $request,$id){
        $user = User::query()->findOrFail($id);
        $user->registerStatus = $request->input('registerStatus');

        if ($user->save()) {
            return redirect()->route('admin_home')->with('success', 'Row successfully created');
        } else {
            return redirect()->route(back())->with('fail', 'fail');
        }
    }

    public function destroy($id)
    {
        $delete =  User::query()->findOrFail($id);

        if($delete->delete()) {
            return redirect()->route('admin_home')->with('success','Deleted successfully');
        } else {
            return redirect()->route('admin_home')->with('success','Deleted file');
        }
    }
}

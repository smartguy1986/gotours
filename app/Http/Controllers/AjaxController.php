<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function subscription(Request $request)
    {
        $validatedData = $request->validate([
            'usermail' => 'required|email|max:255'
        ]);

        $user = DB::table('subscriber_list')->where('usermail', '=', $request->usermail)->first();
        if ($user === null) {
            $check = DB::table('subscriber_list')->insertGetId(array(
                'usermail'      => $request->usermail,
                'status'          => '1'
            ));
            $msg = '<div class="alert alert-primary" role="alert">You have subscribed to GoTours NewsLetter successfully.</div>';
        }
        else
        {
            $msg = '<div class="alert alert-danger" role="alert">You have already subscribed.</div>';
        }

        return response()->json(array('msg'=> $msg), 200);
    }
}

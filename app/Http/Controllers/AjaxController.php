<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Contacts;

class AjaxController extends Controller
{
    public function subscription(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'usermail' => 'required|email|max:255'
        ]);

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            $msg = '<div class="alert alert-danger" role="alert">' . $errors . '</div>';
        } else {
            $user = DB::table('subscriber_list')->where('usermail', '=', $request->usermail)->first();
            if ($user === null) {
                $check = DB::table('subscriber_list')->insertGetId(
                    array(
                        'usermail' => $request->usermail,
                        'status' => '1'
                    )
                );
                $msg = '<div class="alert alert-primary" role="alert">You have subscribed to GoTours NewsLetter successfully.</div>';
            } else {
                $msg = '<div class="alert alert-danger" role="alert">You have already subscribed.</div>';
            }
        }

        return response()->json(array('msg' => $msg), 200);
    }

    public function contactsubmit(Request $request)
    {
        $msg = "";
        $validatedData = Validator::make(
            $request->all(),
            [
                'contactname' => 'required',
                'contactmail' => 'required|email|max:255',
                'contactmessage' => 'required'
            ],
            [
                'contactname.required' => "Please enter your name.",
                'contactmail.required' => "Please enter your email",
                'contactmail.email' => "Please enter a valid email",
                'contactmessage.required' => "Please enter your message"
            ]
        );

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            $msg .= '<div class="alert alert-danger" role="alert"><ul>';
            foreach ($errors->all() as $error)
                $msg .= "<li>".$error."</li>";
            $msg .= '</ul></div>';
        } else {
            $save = new Contacts;
            $save->name = $request->contactname;
            $save->email = $request->contactmail;
            $save->message = $request->contactmessage;
            $save->response = 0;
            $save->save();

            $msg = '<div class="alert alert-primary" role="alert">Thank you for leaving your message with us and we will get you back very soon.</div>';
        }
        return response()->json(array('msg' => $msg), 200);
    }
}
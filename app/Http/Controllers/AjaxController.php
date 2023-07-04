<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Contacts;
use App\Models\Careerquery;

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
                $msg .= "<li>" . $error . "</li>";
            $msg .= '</ul></div>';
            $status = false;
        } else {
            $save = new Contacts;
            $save->name = $request->contactname;
            $save->email = $request->contactmail;
            $save->message = $request->contactmessage;
            $save->response = '0';
            $save->save();

            $status = true;
            $msg = '<div class="alert alert-primary" role="alert">Thank you for leaving your message with us and we will get you back very soon.</div>';
        }
        return response()->json(array('msg' => $msg, 'status' => $status), 200);
    }

    public function careerquery(Request $request)
    {
        $msg = "";
        $validatedData = Validator::make(
            $request->all(),
            [
                'username' => 'required',
                'usermail' => 'required|email|max:255',
                'usermessage' => 'required'
            ],
            [
                'username.required' => "Please enter your name.",
                'usermail.required' => "Please enter your email",
                'usermail.email' => "Please enter a valid email",
                'usermessage.required' => "Please enter your message"
            ]
        );

        if ($validatedData->fails()) {
            $errors = $validatedData->errors();
            $msg .= '<div class="alert alert-danger" role="alert"><ul>';
            foreach ($errors->all() as $error)
                $msg .= "<li>" . $error . "</li>";
            $msg .= '</ul></div>';
            $status = false;
        } else {
            $save = new Careerquery;
            $save->name = $request->username;
            $save->email = $request->usermail;
            $save->phone = $request->userphone;
            $save->message = $request->usermessage;
            $save->response = '0';
            $save->save();

            $status = true;
            $msg = '<div class="alert alert-primary" role="alert">Thank you for applying. If it\'s a good match we will get you back very soon.</div>';
        }
        return response()->json(array('msg' => $msg, 'status' => $status), 200);
    }

    public function searchd(Request $request)
    {
        $msg = '';
        $keyword = $request->search;
        if ($keyword) {
            $results = DB::table('destinations')
                ->select('id', 'name', 'slug')
                ->where('name', 'like', '%' . $keyword . '%')
                ->orWhere('slug', 'like', '%' . $keyword . '%')
                ->get();
            // dd($results);
            $msg .= "<ul>";
            foreach ($results as $res) {
                $msg .= "<li><a href='" . url('packages-by-destination/' . $res->slug) . "'>Destinations - " . $res->name . "</a></li>";
            }
            $msg .= "</ul>";
            return response()->json(array('msg' => $msg), 200);
        } else {
            return response()->json(array('msg' => $msg), 200);
        }
    }
}
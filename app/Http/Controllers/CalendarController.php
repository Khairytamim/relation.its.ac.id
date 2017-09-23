<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\Calendar_Confirmation;
use \Carbon\Carbon;
use App\Mail\CalendarRequest;
use Validator;
use Mail;

class CalendarController extends Controller
{
    public function request(Request $request)
    {
    	$uuid = Uuid::generate(4);
    	$now = Carbon::now();
    	$insert = new Calendar_Confirmation;
    	$insert->token = $uuid;
    	$insert->expired_at = $now->addDays(5);
    	$insert->save();

        Mail::to($request->emailitspic)->send(new CalendarRequest($uuid));

    	return back()-with('status', 'Silahkan CekEmail anda');
    }

    public function index(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'token' => 'required|exists:calendar_confirmation,token'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator, 'gagalcalendar')
                        ->withInput();
        }

    	$cek = Calendar_Confirmation::find($request->token);

    	if(strtotime($cek->expired_at) > strtotime(date("Y-m-d H:i:s"))) return view('calendar.calendar'); 
    	else return redirect('/')->with('calendarexpired', 'Token anda expired, mohon melakukan permohonan kembali');
    }
}

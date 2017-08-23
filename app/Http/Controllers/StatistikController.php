<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acara;
use Carbon\Carbon;
use Response;
use DB;

class StatistikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$this->setActive('statistik');
        $this->setTitle('statistik');

    	$acara = Acara::select('*', DB::raw('DATEDIFF(DATE(waktu_konfirmasi),DATE(created_at)) as respon_1'))->get();
    	$this->data['acara'] = $acara;

    	return view('statistik.index', $this->data);
    }

    public function ajax(Request $request)
    {

    	$acara = Acara::select('*', DB::raw('DATEDIFF(DATE(waktu_konfirmasi),DATE(created_at)) as respon_1'))->get();

    	
    	$this->data['confirmed'] = $acara->where('status', 1)->count();
    	$this->data['unconfirmed'] = $acara->where('status', 0)->count();
    	$this->data['total'] = $acara->count();

    	$respon1=0;
        $respon2=0;
        $jumlahrespon1=0;
        

    	foreach ($acara as $key => $value) {
    		$jumlahrespon1++;
    		// $tes = Carbon::parse($value->created_at);
    		// $tes->hour = 0;
    		// $tes->minute = 0;
    		// $tes->second = 0;

    		// echo $tes->toDateString() . ' ' .$value->waktu_konfirmasi. ' ' . $tes->diffInDays($value->waktu_konfirmasi).'<br>';
    		$respon1 = $respon1 + $value->respon_1;
    		// echo $value->respon_1.'<br>';
    	}
    	if($jumlahrespon1 == 0) $this->data['avgrespon1'] = 0;
        else $this->data['avgrespon1'] = $respon1/$jumlahrespon1;

        // echo $this->data['avgrespon2'];
        // dd($this->data);
    	return Response::json($this->data);
    }
}

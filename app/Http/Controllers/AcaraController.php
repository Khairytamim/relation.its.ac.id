<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Response;
use Route;
use App\Acara;
use Uuid;
// use Response;
use Validator;
use DB;
use Mail;
use App\Mail\KonfirmasiAcara;
use Carbon\Carbon;
use App\Mail\NotifikasiPertanyaan;
use App\Mail\AddAcara;


class AcaraController extends Controller
{
    public function __construct(Route $route)
    {
        // if($route->getActionMethod($route)!='jadwal' ) $this->middleware('auth');

        // $this->middleware('auth');
    }
    public function index()
    {
        $this->setActive('admin');
        $this->setTitle('admin');

        return view('admin.home.index', $this->data);
    }

    public function user()
    {
        $this->setActive('user');
        $this->setTitle('user');
        $this->data['user'] = Acara::where('id_acara', '$id')->get();

        return view('user.index', $this->data);
    }

    public function home()
    {
        $this->setActive('home');
        $this->setTitle('home');

        return view('welcome', $this->data);
    }

    public function calendar()
    {
        $this->setActive('calendar');
        $this->setTitle('calendar');

        return view('calendar.index', $this->data);
    }

    public function list()
    {
        $this->setActive('acara');
        $this->setTitle('confirmed');
        $this->data['acara'] = Acara::where('status', 1)->orderBy('created_at', "desc")->get();
        //dd($halo);

        return view('admin.listacara.index', $this->data);
    }

    public function confirm()
    {
        $this->setActive('acara');
        $this->setTitle('confirmation');
        $this->data['acara'] = Acara::where('status', 0)->where('status_email', 1)->orderBy('created_at', "desc")->get();
        //dd($this->data['acara']);

        return view('admin.konfirmasiacara.index', $this->data);
    }

    public function add(Request $request)
    {

        $messages["tanggalmulai.after"] = "Tanggal yang anda masukkan harus 5 hari setelah hari ini";
        $messages['waktu.date_format'] = "Waktu yang anda masukkan tidak sesuai format. contoh: 17:25:00";



            //echo var_dump($result);
        $validator = Validator::make($request->all(), [
            
            'namapic' => 'required',
            'namaacara' => 'required',
            'lokasi' => 'required',
            'kontakpic' => 'required', 
            'deskripsi_agenda' => 'required',
            'deskripsi' => 'required',
            'nama_agenda' => 'required',
            'tanggalmulai' => 'required|date_format:Y-m-d|after:'.Carbon::now()->addDays(5)->toDateString().'',
            'waktu' => 'required:date_format:H:i:s',
                        
            
        ], $messages);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $create = new Acara;
        $create->id_acara = Uuid::generate(4);
        $create->pengaju_acara = $request->namapic;
        $create->nama_acara = $request->namaacara;
        $create->lokasi_agenda = $request->lokasi;
        $create->kontak_pengaju = $request->kontakpic;
        $create->email_pengaju = $request->emailpic;
        $create->deskripsi_acara = $request->deskripsi;
        $create->deskripsi_agenda = $request->deskripsi_agenda;
        $create->nama_agenda = $request->nama_agenda;

        $create->status = 0;
        $file = $request->poster;
                     
        if ($file) {
            $filename = 'acara/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $create->poster_acara = "storage/$filename";
        }
       
        $create->tanggal_mulai = $request->tanggalmulai;
        $create->waktu_agenda = $request->waktu;
        $create->status_email = 0;
        $create->email_its_pengaju = $request->emailitspic;
        $create->save();

        if($create->emailitspic != '') Mail::to($request->emailpic)->cc($request->emailitspic)->send(new AddAcara($create->id_acara));
        else Mail::to($request->emailpic)->send(new AddAcara($create->id_acara));
       
        // Mail::to('melania.muntini@gmail.com')->cc('hlmn.hg@gmail.com')->send(new NotifikasiPertanyaan($create->id_acara));

        return back()->with('status', 'Sukses!');
    }

    public function verifikasi(Request $request)
    {
        $update = Acara::find($request->verif);

        if(!$update) return "Acara tidak ditemukan";

        $update->status_email = 1;
        $update->save();

        Mail::to('melania.muntini@gmail.com')->cc(['hlmn.hg@gmail.com', 'advenfirman@gmail.com'])->send(new VerifikasiPertanyaan($update->id_acara));

        echo 'Email Telah Terverifikasi, Silahkan Tunggu Jawaban Lewat Inbox/Spam Email Anda';
    }

    public function update(Request $request)
    {

        $update = Acara::find($request->id_acara);
        if($update->status == 0) $update->waktu_konfirmasi = Carbon::now()->toDateString();
        $update->pengaju_acara = $request->namapic;
        $update->nama_acara = $request->namaacara;
        $update->lokasi_agenda = $request->lokasi;
        $update->kontak_pengaju = $request->kontakpic;
        $update->email_pengaju = $request->emailpic;
        $update->deskripsi_acara = $request->deskripsi;
        $update->deskripsi_agenda = $request->deskripsi_agenda;
        $update->nama_agenda = $request->nama_agenda;
        $update->status = 1;
        $file = $request->poster;

        if ($file) {
            $filename = 'acara/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $update->poster_acara = "storage/$filename";

        }

        $update->tanggal_mulai = $request->tanggalmulai;
        $update->waktu_agenda = $request->waktu;
        $update->save();

        Mail::to($query->email_pengaju)->send(new KonfirmasiAcara($this->data));

        return back()->with('status','Data Updated!');
    }

    public function updateemail(Request $request)
    {


        $update = Acara::find($request->id_acara);
        if($update->status_notes != 1 ) return back()->with('status', 'Anda tidak berhak mengupdate acara');
        $update->pengaju_acara = $request->namapic;
        $update->nama_acara = $request->namaacara;
        $update->lokasi_agenda = $request->lokasi;
        $update->kontak_pengaju = $request->kontakpic;
        $update->email_pengaju = $request->emailpic;
        $update->deskripsi_acara = $request->deskripsi;
        $update->deskripsi_agenda = $request->deskripsi_agenda;
        $update->nama_agenda = $request->nama_agenda;
        $update->status = 0;
        $update->status_notes = 0;
        $file = $request->poster;

        if ($file) {
            $filename = 'acara/'. Uuid::generate(4) . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put($filename, File::get($file));
            $update->poster_acara = "storage/$filename";

        }

        $update->tanggal_mulai = $request->tanggalmulai;
        $update->waktu_agenda = $request->waktu;
        $update->save();

        

        return back()->with('status','Data Updated');
    }
 
    public function jadwal(Request $request)
    {
        $result = Acara::select(DB::raw('nama_agenda as title'), DB::raw('tanggal_mulai as start'), DB::raw('id_acara as id_acara'))->where('status', 1)->get();

        return Response::json($result);
    }

    public function delete(Request $request)
    {
        $delete = Acara::find($request->id);
        $delete->delete();


        return back()->with('delete', 'Acara Telah Terhapus');
    }

    public function lihat(Request $request)
    {
        $this->data['value'] = Acara::find($request->id);
        //dd($this->data['value']);
        return view('lihat.index', $this->data);
    }


    public function notes(Request $request)
    {
        $query = Acara::find($request->id);
        //dd($query);
        $this->data['id'] = $request->id;
        $this->data['note'] = $request->note;
        $query->status_notes = 1;
        $query->save();
        // dd($query);
        Mail::to($query->email_pengaju)->send(new KonfirmasiAcara($this->data));
        return back()->with('status', 'Data Sukses Terkirim');
    }

    public function event(Request $request)
    {
        $event = Acara::find($request->id);
        
        return Response::json($event);
    }
}

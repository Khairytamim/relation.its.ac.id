<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use Response;

use App\Acara;
use Uuid;
// use Response;
use DB;

class AcaraController extends Controller
{
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
        $this->data['acara'] = Acara::where('status', 0); //sementara yang 0 dulu

        return view('calendar.index', $this->data);
    }

    public function list()
    {
        $this->setActive('list');
        $this->setTitle('list');
        $this->data['acara'] = Acara::where('status', 1)->get();
        //dd($halo);

        return view('admin.listacara.index', $this->data);
    }

    public function confirm()
    {
        $this->setActive('list');
        $this->setTitle('list');
        $this->data['acara'] = Acara::get();
        //dd($halo);

        return view('admin.konfirmasiacara.index', $this->data);
    }

    public function add(Request $request)
    {

        $create = new Acara;
        $create->id_acara = Uuid::generate(4);
        $create->pengaju_acara = $request->namapic;
        $create->nama_acara = $request->namaacara;
        $create->lokasi_acara = $request->lokasi;
        $create->kontak_pengaju = $request->kontakpic;
        $create->email_pengaju = $request->emailpic;
        $create->deskripsi_acara = $request->deskripsi;
        $create->status = 0;
        $file = $request->poster;
        $filename = 'acara/'. Uuid::generate(4) . '.' . $file->guessExtension();             
        if ($file) {
            Storage::disk('public')->put($filename, File::get($file));
        }

        $create->poster_acara = "storage/$filename";
        $create->tanggal_mulai = $request->tanggalmulai;
        $create->tanggal_selesai = $request->tanggalselesai;
        $create->save();

        return back()->with('status', 'Sukses!');
    }

    public function update(Request $request)
    {
        $update = Acara::find($request->id_acara);
        $update->pengaju_acara = $request->namapic;
        $update->nama_acara = $request->namaacara;
        $update->lokasi_acara = $request->lokasi;
        $update->kontak_pengaju = $request->kontakpic;
        $update->email_pengaju = $request->emailpic;
        $update->deskripsi_acara = $request->deskripsi;
        $update->status = 1;
        $file = $request->poster;
        $filename = 'acara/'. Uuid::generate(4) . '.' . $file->guessExtension();             
        if ($file) {
            Storage::disk('public')->put($filename, File::get($file));
        }

        $update->poster_acara = "storage/$filename";
        $update->tanggal_mulai = $request->tanggalmulai;
        $update->tanggal_selesai = $request->tanggalselesai;
        $update->save();

        return back()->with('status','About updated!');
    }

    public function jadwal(Request $request)
    {
        $result = Acara::select(DB::raw('nama_acara as title'), DB::raw('tanggal_mulai as start'), DB::raw('tanggal_selesai as end'))->get();

        return Response::json($result);
    }

}

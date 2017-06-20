<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Acara;

class KonfirmasiAcara extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public $result;

    public function __construct($data)
    {
        $this->id = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->result = Acara::find($this->id);
        // return $this->view('view.name');
        return $this->subject($data->nama_acara)->from('no-reply@humas.its.ac.id')->view('konfirmasi.index');

    }
}

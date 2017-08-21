<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Acara;

class NotifikasiPertanyaan extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id_kelas_matkul;
    public $acara;

    public function __construct($data)
    {
        $this->acara = Acara::find($data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->acara->nama_acara)->from('no-reply@humas.its.ac.id')->view('notifikasiemail.index');
    }
}

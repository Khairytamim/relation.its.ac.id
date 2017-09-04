<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Acara;

class AddAcara extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $result;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        set_time_limit(0);

        $this->result = Acara::find($this->data);

        return $this->subject('Verifikasi Pertanyaan')->from('no-reply@humas.its.ac.id')->view('verifikasiemail.index');
    }
}

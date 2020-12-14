<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Livewire\WithFileUploads;

class WorksOfUsersMail extends Mailable
{
    use Queueable, SerializesModels;
    use WithFileUploads;

    public $data;

    public function __construct($data)
    {
        $this->data = array(
            'name'       => $data->name,
            'email'      => $data->email,
            'subject'    => $data->subject,
            'message'    => $data->message,
            'photo'      => $data->photo,
            'schema'     => $data->schema
        );
    }

    public function build()
    {
        return $this->subject('mail from Knitting Blog')->
        from('borashek29@gmail.com')->view('dynamic_email_template')->with('data', [$this->data]);
    }
}

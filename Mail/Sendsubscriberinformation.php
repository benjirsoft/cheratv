<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Sendsubscriberinformation extends Mailable
{
    use Queueable, SerializesModels;
   

     private $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
         $this->data = $data;

    }


    public function Build()
    {
       return $this->from('jolbihongo@gmail.com')
                    ->subject('Subscriber Information')
                    ->view('Mail.index')
                    ->with('user_id', $this->data['user_id'])
                    ->with('name', $this->data['name'])
                    ->with('email', $this->data['email'])
                    ->with('mobileNo', $this->data['mobileNo']);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(subject: 'Subscriber Information');
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
         return new Content(view: 'Mail.index');
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
    public function build(){    
        
        // return $this->from('ict.cvenriquez@gmail.com')
        // ->view('emails.newuser'); 

        return $this->from('ict.cvenriquez@gmail.com')
        ->to('ict.cvenriquez@gmail.com')
        ->cc('ict.cvenriquez@gmail.com')
           ->subject('Auf Wiedersehen')
           ->markdown('mails.exmpl')
           ->with([
             'name' => 'New Mailtrap User',
             'link' => '/inboxes/'
           ]);


        //return $this->view('view.name');

    }


}

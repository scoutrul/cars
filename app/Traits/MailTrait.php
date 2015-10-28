<?php


namespace App\Traits;


use App\MetaTag;
use App\Request;
use Illuminate\Support\Facades\Mail;

trait MailTrait {


    public function newRequest(Request $request)
    {
        Mail::queue('emails.request_admin', [
            'request' => $request,
        ], function($msg) {
            $msg->to('igoshin18@gmail.com')
                ->subject('Новый заказ | Комтранс');
        });
    }
    

}
<?php


namespace App\Traits;


use App\Company;
use App\MetaTag;
use App\Request;
use App\Room;
use App\User;
use Illuminate\Support\Facades\Mail;

trait MailTrait {


    /**
     * Send email with verification code to user
     *
     * @param $code
     * @param User $user
     */
    public static function verifyUser($code, User $user)
    {
        Mail::queue('emails.verify', ['code' => $code], function($msg) use ($user){
            $msg->to($user->email)
                ->subject('Подтверждение почты');
        });
    }


    /**
     * Send mail to Admin
     *
     * @param Company $company
     */
    public static function newCompany(Company $company)
    {
        Mail::queue('emails.company.admin', [
            'company' => $company->load('user', 'type', 'spec', 'cType', 'makes', 'models'),
        ], function($msg) {
            $msg->to(env('ADMIN_EMAIL'))
                ->subject('Новая компания | Комтранс');
        });
    }


    /**
     * Send mail to Company with moderate result
     *
     * @param Company $company
     */
    public static function moderateCompany(Company $company)
    {
        Mail::queue('emails.company.moderated', [
            'company' => $company->load('user'),
        ], function($msg) use ($company){
            $msg->to($company->user->email)
                ->subject('Компания проверена | Комтранс');
        });
    }



    /**
     * Send mail to Company
     *
     * @param Request $request
     * @param Company $company
     * @param Room $room
     */
    public static function companyRequest(Request $request, Company $company, Room $room)
    {
        Mail::queue('emails.request.request', [
            'request' => $request,
            'room' => $room
        ], function($msg) use ($company){
            $msg->to($company->user->email)
                ->subject('Новый заказ | Комтранс');
        });
    }


    /**
     * Send mail to Admin
     *
     * @param Request $request
     */
    public static function newRequest(Request $request)
    {
        Mail::queue('emails.request.request_admin', [
            'request' => $request->load('user', 'type', 'make', 'model'),
        ], function($msg) {
            $msg->to(env('ADMIN_EMAIL'))
                ->subject('Новый заказ | Комтранс');
        });
    }


    /**
     * Send mail to user with request moderate result
     *
     * @param Request $request
     */
    public static function moderateRequest(Request $request)
    {
        Mail::queue('emails.request.request_moderated', [
            'request' => $request->load('user', 'type', 'make', 'model'),
        ], function($msg) use ($request){
            $msg->to($request->user->email)
                ->subject('Заказ проверен | Комтранс');
        });
    }


    /**
     * Send email with response to Admin
     *
     * @param Room $room
     * @param Company $company
     */
    public static function adminResponse(Room $room, Company $company)
    {
        Mail::queue('emails.response.response_admin', [
            'request' => $room->request,
            'room' => $room,
            'company' => $company
        ], function($msg) use ($room){
            $msg->to($room->request->user->email)
                ->subject('Новый заказ | Комтранс');
        });
    }


    /**
     * Send email with response to User
     *
     * @param Room $room
     * @param Company $company
     */
    public static function clientResponse(Room $room, Company $company)
    {
        Mail::queue('emails.response.response', [
            'request' => $room->request,
            'room' => $room,
            'company' => $company
        ], function($msg) use ($room){
            $msg->to($room->request->user->email)
                ->subject('Новый заказ | Комтранс');
        });
    }

}
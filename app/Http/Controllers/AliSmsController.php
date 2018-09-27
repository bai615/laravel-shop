<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mrgoon\AliSms\AliSms;

class AliSmsController extends Controller
{
    public function index(Request $request)
    {
        $aliSms = new AliSms();
        $response = $aliSms->sendSms('phone number', 'SMS_code', ['name'=> 'value in your template']);
        var_dump($response);
        dump($response);
        exit;
    }
}
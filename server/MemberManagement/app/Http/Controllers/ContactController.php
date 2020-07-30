<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Exception;


class ContactController extends Controller
{
    public function confirm(Request $request)
    {
        $input = $request->all();

        return view('contact/confirm')->with('input', $input['content']);
    }
    
    public function send(Request $request)
    {
        try {
            // お問い合わせ内容をメール
            // https://reffect.co.jp/laravel/laravel-send-email#i-4
            // https://qiita.com/KZ-taran/items/ffa60ac6353bc4dcc759
            Mail::to('送り先のアドレス')->send(new ContactMail($request->content));
            return view('contact/done');
        } catch (Exception $e) {
            // エラーページ表示
            // エラーログ吐き出す
            dump($e);
            return;
        }
    }
}

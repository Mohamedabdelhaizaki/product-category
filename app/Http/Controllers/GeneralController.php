<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GeneralController extends Controller
{
    public function changeLang(Request $request)
    {

        $url =  LaravelLocalization::getLocalizedURL($request->lang, url()->previous());

        return redirect()->to($url);
    }
}

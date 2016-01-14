<?php
namespace App\Http\Controllers;



class NonAuthController extends Controller{

    public function infos(){
        return view('pages/infos');
    }


}
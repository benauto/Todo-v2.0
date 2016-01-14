<?php
namespace App\Http\Controllers;



use Symfony\Component\HttpFoundation\Request;

class LinkController extends Controller{

    // Redirige vers le login si tu n'es pas connecté ( aller voir dans route )
    // il y a une fonction pour rediriger

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(){
        return view('pages/home');
    }

    public function login(){
        return view('auth/login');
    }
    public function register(){
        return view('auth/register');
    }




}
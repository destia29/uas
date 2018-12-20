<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foto;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foto = foto::all();
        return view('home')->with("foto",$foto);
    }

    public function post()
    {
        return view('post');
    }

    public function prosesPost(Request $input){
        $foto = new foto;
        $foto->caption = $input->caption;

        $file       = $input->file('file');
        $fileName   = $file->getClientOriginalName();
        $input->file('file')->move("images/", $fileName);

        $foto->foto = $fileName;

        $foto -> save();
        return view('welcome');
    }

    public function list(){
      $foto = foto::all();
      return view('home')->with("foto",$foto);
    }
    public function user(){
      $user = user::all();
      return view('dashboard')->with("user",$user);
    }

    public function destroy($id){
      $user = user::findOrFail($id);
      $user ->delete();
        return view('dashboard')->with('auth');

    }
}

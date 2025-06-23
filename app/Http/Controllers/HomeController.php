<?php
namespace App\Http\Controllers;

use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        // peralihan login sesuai role
        if ($user->isAdmin == 1) {
            return redirect('admin');
        } else {
            return redirect('/');
        }
        return view('home');
    }
}

<?php
namespace App\Http\Controllers;

class BackendController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }
}

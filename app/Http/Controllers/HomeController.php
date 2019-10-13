<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param ProcessRequest $request
     */
    public function process(ProcessRequest $request)
    {
        var_dump($request->file('ing-file'));
    }
}

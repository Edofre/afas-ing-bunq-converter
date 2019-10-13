<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProcessRequest;
use App\Jobs\Process;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function process(ProcessRequest $request)
    {
        // Store the file
        $path = \Storage::putFile('csv', $request->file('ing-file'));

        // Dispatch job
        Process::dispatch($path);

        flash(__('Your file is being processed'))->success();
        return redirect()->back();
    }
}

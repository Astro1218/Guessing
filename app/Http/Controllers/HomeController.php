<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $now = date('Y-m-d', strtotime(now()));

        $lucky = \App\Models\Word::whereDate('updated_at', $now)->where('expired', 1)->first();

        $lucky = $lucky ? "Today lucky man is <strong>" . $lucky->user->email . "</strong>" : null;

        return view('home')->with([
            'words' => \App\Models\Word::where('expired', 1)->orderBy('id', 'DESC')->with('user')->get(),
            'lucky' => $lucky
        ]);
    }

}

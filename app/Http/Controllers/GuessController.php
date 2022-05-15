<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class GuessController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guess');
    }

    public function guess(Request $request)
    {
        if (Auth::user()->bid_count > 0) {
            // $now = date('Y-m-d', strtotime(now()));

            $word = \App\Models\Word::all()->last();

            $isMatch = $word->word == $request->guess_word;

            if ($isMatch) {
                $word = \App\Models\Word::find($word->id);

                $word->expired = 1;
                $word->user_id = Auth::user()->id;
                $word->save();
            }

            $history = new \App\Models\History;

            $history->user_id = Auth::user()->id;
            $history->word = $request->guess_word;
            $history->ip = str_replace("::1", "127.0.0.1", $request->ip());
            $history->state = $isMatch;
            $history->save();

            $user = \App\Models\User::find(Auth::user()->id);
            $user->bid_count = $user->bid_count - 1;
            $user->save();

            if ($isMatch)
                return redirect()->to('/guess')->with(['error' => 'success', 'result' => "Success"]);
            else
                return redirect()->to('/guess')->with(['error' => 'danger', 'result' => "Unfortunately, your <strong> " . $request->guess_word . "</strong> word is incorrect."]);

        } else {
            return redirect()->to('/guess')->with(['error' => 'info', 'result' => "Please charge"]);
        }
    }
}

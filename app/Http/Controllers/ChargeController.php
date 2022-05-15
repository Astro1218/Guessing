<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ChargeController extends Controller
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

    public function index()
    {
        return view('charge');
    }

    public function charge(Request $request) {

    }

    public function present(Request $request) {
        $present = $request->present;

        $last_present = \App\Models\Present::all()->last();

        if ($last_present->id == Auth::user()->last_present) {
            return redirect()->to('/charge')->with(['error' => 'warning', 'result' => "You got already present."]);
        }

        if ($present == $last_present->present) {
            $user = \App\Models\User::find(Auth::user()->id);

            $user->bid_count = $user->bid_count + 2;
            $user->last_present = $last_present->id;
            $user->save();

            return redirect()->to('/charge')->with(['error' => 'success', 'result' => "Present Number Success"]);
        } else {
            return redirect()->to('/charge')->with(['error' => 'danger', 'result' => "Failed"]);
        }
    }
}

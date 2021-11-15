<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClaimCreateRequest;
use App\Mail\ClaimCreated;
use App\Models\Claim;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClaimController extends Controller
{

    public function create()
    {
        $userClaims = Claim::where('user_email', Auth::user()->email);

        if ($userClaims->get()->isNotEmpty()) {
            $lastClaimTime = $userClaims->orderBy('created_at')->get()->last()->created_at;
            $now = Carbon::now();
            $diff = $lastClaimTime->diffInDays($now);

            return view('claim_form', ['diff' => $diff]);
        }

        return view('claim_form', ['diff' => 10]);
    }

    public function store(ClaimCreateRequest $request)
    {

        $claim = Claim::create([
            'user_email' => $request->email,
            'message' => $request->message,
            'answered' => false,

        ]);

        $managers = User::where('role', 'manager')->get();

        foreach($managers as $manager) {
            Mail::to($manager)->queue(new ClaimCreated($claim));
        }

        return redirect()->route('main')->with('success', 'Обращение отправлено');
    }

    public function show()
    {
        $claims = Claim::orderBy('created_at')->paginate(10);
        return view('dashboard', ['claims' => $claims]);
    }

    public function update($claimId, $page)
    {
        $claim = Claim::where('id', $claimId)->first();
        $claim->answered = true;
        $claim->save();
        return redirect()->route('dashboard', '?page=' . $page)->with('success', 'Обращение отмечено');
    }
}

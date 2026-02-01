<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightRegisterRequest;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class FirstRegisterController extends Controller
{
    public function store (WeightRegisterRequest $request)
    {
        $userId = Auth::id();

        WeightLog::create([
            'user_id' => $userId,
            'weight' => $request->weight,
            'date' => now()
        ]);
        WeightTarget::create([
            'user_id' => $userId,
            'target_weight' => $request->target_weight
        ]);

        return redirect()->route('admin');
    }
}

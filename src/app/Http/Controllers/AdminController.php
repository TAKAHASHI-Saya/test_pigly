<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightLogRequest;
use App\Http\Requests\WeightTargetRequest;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $targetWeight = $user->weightTarget->target_weight;
        $currentWeight = $user->weightLogs()
        ->orderByDesc('created_at')
        ->first()
        ->weight;

        $difference = $currentWeight - $targetWeight;

        $weightLogs = WeightLog::orderBy('date', 'desc')
        ->paginate(8);

        return view ('admin', compact('targetWeight', 'currentWeight', 'difference', 'weightLogs'));
    }

    public function store(WeightLogRequest $request)
    {
        $userId = Auth::id();
        WeightLog::create([
            'user_id' => $userId,
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_content' => $request->exercise_content,
        ]);
        return redirect()->route('admin');
    }

    public function search(Request $request)
    {
        $user = Auth::user();

        $targetWeight = $user->weightTarget->target_weight;
        $currentWeight = $user->weightLogs()
        ->orderByDesc('created_at')
        ->first()
        ->weight;

        $difference = $currentWeight - $targetWeight;

        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        $weightLogs = WeightLog::forCurrentUser()
        ->when($startDate, fn($q) => $q->dateRange($startDate, $endDate))
        ->orderBy('date', 'desc')
        ->paginate(8);

        return view('admin', compact('targetWeight', 'currentWeight', 'difference', 'weightLogs', 'startDate', 'endDate'));
    }

    public function show($weightLogId)
    {
        $weightLog = WeightLog::findOrFail($weightLogId);
        
        return view('detail', compact('weightLog'));
    }

    public function update(WeightLogRequest $request, $weightLogId)
    {
        $weightLog = WeightLog::findOrFail($weightLogId);

        $data = $request->only(['date', 'weight', 'calories', 'exercise_time', 'exercise_content']);

        $weightLog->update($data);

        return redirect()->route('admin');
    }

    public function destroy($weightLogId)
    {
        $weightLog = WeightLog::findOrFail($weightLogId);

        $weightLog->delete();

        return redirect()->route('admin');

    }

    public function goalShow()
    {
        $weightTarget = WeightTarget::where('user_id', auth()->id())
        ->first();

        return view('weight-goal', compact('weightTarget'));
    }

    public function goalUpdate(WeightTargetRequest $request)
    {
        WeightTarget::where('user_id', auth()->id())
        ->update([
            'target_weight' => $request->target_weight,
        ]);

        return redirect()->route('admin');
    }
}

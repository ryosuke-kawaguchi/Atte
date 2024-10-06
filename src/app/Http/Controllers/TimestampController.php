<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Timestamp;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;


class TimestampController extends Controller
{
    public function index()
    {
        return view('stamp');
    }

    public function admin()
    {
        $timestamps = Timestamp::Paginate(5);
        return view('attendance' , compact('timestamps'));
    }

    public function workin(Request $request)
    {
        $Timestamp = Timestamp::firstOrNew([
            'user_id' => auth()->id(),
            'date' => Carbon::today()->toDateString(),
        ]);

        if ($Timestamp->workIn) {
            return redirect()->back()->with('message' , '勤務中もしくは本日勤務済みです');
        }

        $Timestamp->workIn = Carbon::now()->format('H:i');
        $Timestamp->save();

        return redirect()->back()->with('message' , '勤務開始しました');

    }

    public function workout(Request $request)
    {
        $Timestamp = Timestamp::where('user_id', auth()->id())
            ->where('date', Carbon::today()->toDateString())
            ->first();

        if (!$Timestamp || $Timestamp->workOut) {
            return redirect()->back()->with('message' , '既に退勤済みか勤務開始されていません');
        }

        $Timestamp->workOut = Carbon::now()->format('H:i');
        $Timestamp->save();
        return redirect()->back()->with('message' , '退勤しました');
    }

    public function breakin()
    {
        $today = Carbon::today()->toDateString();
        $Timestamp = Timestamp::where('user_id', Auth::id())
            ->where('date', $today)
            ->first();

        if ($Timestamp) {
            $Timestamp->breakIn = Carbon::now()->format('H:i');
            $Timestamp->save();
            return redirect()->back()->with('message' , '休憩開始しました');
        }

        return redirect()->back()->with('message' , '勤務開始されていません');
    }

    public function breakout()
    {
        $today = Carbon::today()->toDateString();
        $timeEntry = Timestamp::where('user_id', Auth::id())
            ->where('date', $today)
            ->first();

        if ($timeEntry) {
            $timeEntry->breakOut = Carbon::now()->format('H:i');
            $timeEntry->save();
            return redirect()->back()->with('message' , '休憩終了しました');
        }

        return redirect()->back()->with('message' , '勤務開始されていません');
    }

}

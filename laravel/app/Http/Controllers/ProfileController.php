<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Fiction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.account_info');
    }

    public function fiction_list()
    {
        $fictions = Fiction::whereUserId(Auth::guard('web')->user()->id)->withCount('like_fiction_history')
                            ->orderByDesc('created_at')
                            ->paginate(10);

        $data = [
            'fictions' => $fictions,
        ];

        return view('user.profile.list_fictions', $data);
    }

    public function favorite_fiction_list()
    {
        $fictions = Fiction::whereHas('like_fiction_history', function ($like_history) {
            $like_history->whereUserId(Auth::guard('web')->user()->id);
        })
            ->where('user_id', '!=', Auth::guard('web')->user()->id)
            ->withCount('like_fiction_history')
            ->orderByDesc('created_at')
            ->paginate(10);

        $data = [
            'fictions' => $fictions,
        ];

        return view('user.profile.favorite_fictions', $data);
    }

    public function series_list()
    {
        $series = Series::whereUserId(Auth::guard('web')->user()->id)->orderByDesc('created_at')->get();

        $data = [
            'series' => $series
        ];

        return view('user.profile.list_series', $data);
    }

    public function favorite_series_list()
    {
        $series = Series::whereHas('like_series_history', function ($like_history) {
            $like_history->whereUserId(Auth::guard('web')->user()->id);
        })
            ->where('user_id', '!=', Auth::guard('web')->user()->id)
            ->withCount('like_series_history')
            ->orderByDesc('created_at')
            ->paginate(10);

        $data = [
            'allSeries' => $series,
        ];

        return view('user.profile.favorite_series', $data);
    }

    public function favorite_author_list()
    {
        
        $authors = User::whereHas('like_author_history', function ($like_history) {
            $like_history->whereUserId(Auth::guard('web')->user()->id);
        })
            ->withCount('like_author_history')
            ->orderByDesc('created_at')
            ->paginate(10);

        $data = [
            'authors' => $authors,
        ];

        return view('user.profile.favorite_author', $data);
    }
}

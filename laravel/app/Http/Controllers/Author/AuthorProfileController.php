<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Fiction;
use App\Models\Series;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorProfileController extends Controller
{
    private function no_view_yourself(string $author_id)
    {
        $user = auth('web')->user();
        $author = User::findOrFail($author_id);
        if(!$user)
            return true;
        if($user->id === $author->id)
            return false;
        return true;
    }

    private function author(string $author_id){
        return User::withCount('like_author_history')->findOrFail($author_id);
    }
    public function index(string $author_id) 
    {
        if(!$this->no_view_yourself($author_id))
            return redirect()->route('user.profile');
        $author = $this->author($author_id);
        return view('other_user.profile.account_info', [
            'author' => $author
        ]);
    }

    public function fiction_list(string $author_id){
        if(!$this->no_view_yourself($author_id))
            return redirect()->route('user.profile');
        $author = $this->author($author_id);
        $fictions = Fiction::where('user_id', $author_id)
            ->with('series')
            ->withCount('like_fiction_history')
            ->latest()
            ->paginate(10);

        return view('other_user.profile.list_fictions', [
            'fictions' => $fictions,
            'author' => $author,
        ]);
    }

    public function series_list(string $author_id){
        if(!$this->no_view_yourself($author_id))
            return redirect()->route('user.profile');
        $author = $this->author($author_id);
        $series = Series::where('user_id', $author_id)
            ->withCount('like_series_history')
            ->latest()
            ->paginate(10);

        return view('other_user.profile.list_series', [
            'allSeries' => $series,
            'author' => $author,
        ]);
    }
}

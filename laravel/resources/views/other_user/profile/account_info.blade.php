@extends('other_user.profile')
@section('title')
    Thông tin người dùng {{ $author->username }}
@endsection
@section('other_user_profile_component')
<div class="text-center">
    <h2>Thông tin tài khoản {{ $author->username }}</h2>
</div>
<div class="row">
    <div class="col-sm-6">
        <p>Tên tài khoản: <i>{{ $author->username }}</i></p>
    </div>

    <div class="col-sm-6">
        <p>Email: <i>{{ $author->email }}</i></p>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <p>Số lượt thích: <i id="likeCount">{{ $author->like_author_history_count }}</i></p>
    </div>
</div>

<div class="row">
    @if(auth()->guard('web')->user())
        <div class="col-sm-6">
            <button class="btn btn-success btn-disabled" id="likeButton" onclick="like_author(this)"
                    data-bs-id="{{ $author->id }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                    <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                </svg>
                Thích tác giả này
            </button>
        </div>
    @endif
</div>

<script>
    const BASE_URL = "{{ url('') }}";
    const CSRF_TOKEN = "{{ csrf_token() }}";
</script>
<script src="{{ @asset('js/interactions/like.js') }}"></script>

@endsection
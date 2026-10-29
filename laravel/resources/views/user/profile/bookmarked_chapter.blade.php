@extends('user.profile')
@section('title')
    Danh sách bookmark chương truyện
@endsection

@section('user_profile_component')
<h2 class="text-center">Danh sách bookmark chương truyện</h2>

<div class="d-flex flex-column">
    @if (count($chapters) == 0)
        <div class="mt-3">
            <h4 class="text-center">Bạn chưa bookmark chương nào, hãy bookmark ít nhất một chương truyện để hệ thống hiển thị</h4>
        </div>
    @else
        @foreach ($chapters as $chapter)
            <div class="card p-3 mt-3 chapter">
                <a href="{{ url('/chapter/' . $chapter->id) }}"><h5 class="mb-1">{{ $chapter->chapter_name }}</h5></a>
                <p class="mb-0">Tên truyện: <a href="{{ route('fiction.detail', $chapter->fiction_id) }}">{{ $chapter->fiction->fiction_name }}</a></p>
                <p class="mb-0">Tác giả: <a href="{{ route('other_user.profile', $chapter->fiction->user_id) }}">{{ $chapter->fiction->author->username }}</a></p>
                <p class="mb-0">Ngày đăng tải: <i>{{ $chapter->created_at }}</i></p>
            </div>
        @endforeach

        <div class="d-flex flex-column justify-content-center mt-4">
            {{ $chapters->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
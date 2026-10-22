@extends('other_user.profile')
@section('title')
    Series của {{ $author->username }}
@endsection

@section('other_user_profile_component')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ @asset('css/series_list.css') }}">
<h2 class="text-center">Danh sách series của {{ $author->username }}</h2>

<div class="d-flex flex-column">
    @if (count($allSeries) == 0)
        <div class="mt-3">
            <h4 class="text-center">Người dùng này chưa đăng tải series nào</h4>
        </div>
    @else
        @foreach ($allSeries as $series)
            <div class="series card p-3 mt-3 ms-2 me-2">
                <img class="cover_image" src="{{ @asset('storage/' . $series->image_link) }}">
                <div class="series-info ms-3">
                    <a href="{{ route('series.detail', $series->id) }}"><h4 class="series-title">{{ $series->series_name }}</h4></a>  
                    <p>Ngày đăng tải: <i>{{ $series->created_at }}</i></p>
                    <p>Cập nhật lần cuối: <i>{{ $series->updated_at }}</i></p>
                    <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                        </svg> {{ $series->like_series_history_count }}</p>
                </div>
            </div>
        @endforeach

        <div class="d-flex flex-column justify-content-center mt-4">
            {{ $allSeries->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>

@endsection
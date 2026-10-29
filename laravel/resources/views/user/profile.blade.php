@extends('main')
@section('content')
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-sm-3">
            <ul class="nav nav-pills flex-column">
                <!-- Tab chuyển đổi -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.profile') }}">Thông tin tài khoản</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.fiction_list') }}">Danh sách truyện sáng tác</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.series_list') }}">Danh sách series sáng tác</a>
                </li>

                <hr>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.favorite_fiction') }}">Danh sách truyện yêu thích</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.favorite_series') }}">Danh sách series yêu thích</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.favorite_author') }}">Danh sách tác giả yêu thích</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.bookmarked_chapter') }}">Danh sách bookmark chương truyện</a>
                </li>

                <hr>

                <li class="nav-item mt-3">
                    <a class="nav-link bg-secondary text-white" href="{{ route('user.delete_account') }}">Xóa tài khoản</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>
        <div class="col-sm-9">
            @yield('user_profile_component')
        </div>
    </div>
</div>
@endsection
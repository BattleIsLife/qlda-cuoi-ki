@extends('main')
@section('content')
<div class="container-fluid p-3">
    <div class="row">
        <div class="col-sm-3">
            <ul class="nav nav-pills flex-column">
                <!-- Tab chuyển đổi -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('other_user.profile', $author->id) }}">Thông tin tài khoản</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('other_user.fiction_list', $author->id) }}">Danh sách truyện sáng tác</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('other_user.series_list', $author->id) }}">Danh sách series sáng tác</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>
        <div class="col-sm-9">
            @yield('other_user_profile_component')
        </div>
    </div>
</div>
@endsection
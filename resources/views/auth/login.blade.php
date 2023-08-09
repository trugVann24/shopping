@extends('layouts.auth')

@section('content')
    <div class="form login">
        <div class="form-content">
            <header>Đăng Nhập</header>
            <form action="{{ route('logining') }}" method="POST">
                @csrf
                <div class="field input-field">
                    <input type="email" placeholder="Email" class="input" name="email">
                </div>
                @error('email')
                    <div class="errors-mess"><i class='bx bx-error-circle'></i>{{ $message }}</div>
                @enderror
                <div class="field input-field">
                    <input type="password" placeholder="Mật khẩu" class="password" name="password">
                    <i class='bx bx-hide eye-icon'></i>
                </div>

                <div class="form-link">
                    <a href="#" class="forgot-pass">Quên mật khẩu ?</a>
                </div>

                <div class="field button-field">
                    <button>Đăng Nhập</button>
                </div>
            </form>

            <div class="form-link">
                <span>Bạn chưa có tài khoản ? <a href="{{ route('register') }}" class="link ">Đăng ký</a></span>
            </div>
        </div>

        <div class="line"></div>

        <div class="media-options">
            <a href="#" class="field facebook">
                <i class='bx bxl-facebook facebook-icon'></i>
                <span>Đăng nhập bằng Facebook</span>
            </a>
        </div>

        <div class="media-options">
            <a href="#" class="field google">
                <img src="#" alt="" class="google-img">
                <span>Đăng nhập bằng Google</span>
            </a>
        </div>

    </div>
@endsection

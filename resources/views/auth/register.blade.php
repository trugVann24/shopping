@extends('layouts.auth')

@section('content')
    <div class="form signup">
        <div class="form-content">
            <header>Đăng Ký</header>
            <form action="{{ route('registing') }}" method="POST">
                @csrf
                <div class="field input-field">
                    <input type="text" placeholder="Họ và tên" class="input" name="name">
                </div>
                @error('name')
                    <div class="errors-mess">{{ $message }}</div>
                @enderror
                <div class="field input-field">
                    <input type="email" placeholder="Email" class="input" name="email">
                </div>
                @error('email')
                    <div class="errors-mess">{{ $message }}</div>
                @enderror
                <div class="field input-field">
                    <input type="password" placeholder="Mật khẩu" class="password" name="password">
                </div>
                @error('password')
                    <div class="errors-mess">{{ $message }}</div>
                @enderror
                <div class="field input-field">
                    <input type="password" placeholder="Xác nhận mật khẩu" class="password" name="password_confirmation">
                    <i class='bx bx-hide eye-icon'></i>
                </div>
                <div class="field button-field">
                    <button>Đăng Ký</button>
                </div>
            </form>

            <div class="form-link">
                <span>Bạn đã có tài khoản? <a href="{{ route('login') }}" class="link ">Đăng nhập</a></span>
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

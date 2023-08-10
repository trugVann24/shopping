@extends('layouts.client.master')

@section('content')
    <div class="py-2"></div>
    <div class="container my-5">
        <!-- Breadcrumb -->
        <div class="card mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3 px-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">Chi tiết</a>
                    </li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>
        <!-- End Breadcrumb -->

        <!-- Profile -->
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    @if (auth()->user()->avatar == '')
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    @else
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                            alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    @endif
                                    <input type="file" name="image" class="">
                                    <h5 class="my-3">{{ auth()->user()->name }}</h5>
                                    @if (auth()->user()->is_admin == 0)
                                        <p class="text-muted mb-2">Người mua hàng</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="lableName" class="mb-0 cursor-pointer">Tên đăng nhập</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="text-primary form-control border-0 outlinenone"
                                                id="lableName" value="{{ auth()->user()->name }}" placeholder="..."
                                                name="name">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="lableEmail" class="mb-0 cursor-pointer">Email</label>
                                        </div>
                                        <div class="col-sm-9 ">
                                            <input type="text" class="text-primary form-control border-0 outlinenone"
                                                id="lableEmail" value="{{ auth()->user()->email }}" placeholder="..."
                                                name="email">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="lablePhone" class="mb-0 cursor-pointer">Số điện thoại</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="text-primary form-control border-0 outlinenone"
                                                id="lablePhone" value="{{ auth()->user()->phone_number }}" placeholder="..."
                                                name="phone_number">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="lableAddress" class="mb-0 cursor-pointer">Địa chỉ</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="text-primary form-control border-0 outlinenone"
                                                id="lableAddress" value="{{ auth()->user()->address }}" placeholder="..."
                                                name="address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <button type="submit" class="button-add">Cập nhật thông tin</button>
                        </div>
                    </div>
                </form>

            </div>
            <!-- End Profile -->
        </div>
    @endsection

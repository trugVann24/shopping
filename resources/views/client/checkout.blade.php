@extends('layouts.client')

@section('content')
    <div class="py-2"></div>
    <div class="container my-5">
        <div class="card mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3 px-3">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('cart.load') }}">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item active">Thanh toán</li>
                </ol>
            </nav>
        </div>
        <form action="{{route('order.add')}}" method="POST">
            @csrf
        <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-2 mt-1">
                                <div class="col mb-0">
                                    <label for="nameWithTitle" class="mb-1"><span class="text-danger">(*)</span> Tên người
                                        nhận</label>
                                    <input type="text" id="nameWithTitle" class="form-control" name="name" value="{{auth()->user()->name}}">
                                </div>
                                <div class="col mb-0">
                                    <label for="nameWithTitle" class="mb-1"><span class="text-danger">(*)</span> Số điện
                                        thoại</label>
                                    <input type="text" id="nameWithTitle" class="form-control" name="phone" value="{{auth()->user()->phone_number}}">
                                </div>
                            </div>
                            <div class="row g-2 mt-1">
                                <label for="nameWithTitle" class="mb-1"><span class="text-danger">(*)</span> Địa chỉ email</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="email" value="{{auth()->user()->email}}">
                            </div>
                            <div class="row g-2 mt-1">
                                <label for="nameWithTitle" class="mb-1"><span class="text-danger">(*)</span> Tỉnh/Thành
                                    phố</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="city">
                            </div>
                            <div class="row g-2 mt-1">
                                <label for="nameWithTitle" class="mb-1"><span class="text-danger">(*)</span>
                                    Quận/Huyện</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="town_country">
                            </div>
                            <div class="row g-2 mt-1">
                                <label for="nameWithTitle" class="mb-1"><span class="text-danger">(*)</span> Địa chỉ cụ
                                    thể</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="address_detail">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h6>Sản Phẩm</h6>
                            @foreach ($cart as $item)
                                <div class="card mb-3 mx-1 cart">
                                    <div class="card-body">
                                        <div class="ms-3 d-flex justify-content-between">
                                            <p class="fw-bold">{{ $item->name }} </p>
                                            <p class="small mb-0">
                                                <span class="text-info fw-bold">
                                                    {{ 'x' . $item->qty }}
                                                </span>
                                            <p>
                                            <p class="small mb-0">
                                                <span>
                                                    <span class="text-info fw-bold">
                                                        {{ number_format($item->price * $item->qty) . ' VND' }}
                                                    </span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
                            <p>Tổng Tiền : <span class="text-danger fw-bold">{{ $total . ' VND' }}</span></p>
                            <hr>
                            <div class="">
                                <p>Hình thức thanh toán</p>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="defaultCheck3" checked name="payment_type">
                                    <label class="form-check-label" for="defaultCheck3" >Thanh toán khi nhận hàng</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

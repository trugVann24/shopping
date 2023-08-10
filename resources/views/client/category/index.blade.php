@extends('layouts.client.master')

@section('content')
<div class="py-2"></div>
<div class="container my-5">
    <!-- Breadcrumb -->
    <div class="card mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3 px-3">
                  <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Trang chủ</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="">Chi tiết</a>
                  </li>
                  <li class="breadcrumb-item active">Data</li>
                </ol>
              </nav>
    </div>
    <!-- End Breadcrumb -->
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-sm-6 col-xl-3 mb-3">
                        <div class="card">
                            <div class="card-body ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex justify-content-center flex-wrap align-items-center mb-2 pb-1">
                                        <img src="{{ asset('uploads/products/' . $item->image) }}" alt=""
                                            class="img-fluid rounded-3 mb-2">

                                        <div class="text-center mt-2">
                                            <a href="{{ route('productDetails.load', $item->id) }}"
                                                class="d-block card-link pull-up">{{ $item->name }}</a>
                                            <span class="fw-bold text-black">{{ $item->price }} VNĐ</span>
                                        </div>
                                        <div class="mt-1">
                                            <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                                4.4 <span class="text-warning"><i
                                                        class="bx bxs-star me-1 mb-1"></i></span><span
                                                    class="text-muted">(1.23k)</span>
                                            </h6>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <a href="{{ route('cart.add', $item->id) }}"
                                                    class="btn btn-outline-primary d-flex align-items-center me-3"><i
                                                        class="bx bx-cart me-1"></i>Thêm giỏ hàng</a>
                                                <a href="javascript:;"
                                                    class="btn rounded-pill btn-icon btn-outline-danger"><i
                                                        class="bx bx-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
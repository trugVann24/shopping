@extends('layouts.client')

@section('content')
    <div class="py-2"></div>

    <div class="container my-5">
        <!-- Breadcrumb -->
        <div class="card mb-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-3 px-3">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0);">Library</a>
                    </li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </nav>
        </div>
        <!-- End Breadcrumb-->

        <!-- Start Cart-->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if (Cart::count() > 0)
                        @foreach ($cart as $item)
                            <div class="card mb-3 mx-1 cart">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="{{ asset('uploads/products/' . $item->options->image) }}"
                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 70px;">
                                            </div>
                                            <div class="ms-3">
                                                <p class="fw-bold">{{ $item->name }} </p>
                                                <p class="small mb-0">
                                                    Số lượng:
                                                    <span class="text-info ">
                                                        <input style="width: 50px" type="number"
                                                            value="{{ $item->qty }}"
                                                            class="form-control mt-1 quantity cart_update"
                                                            data-rowId="{{ $item->rowId }}" />
                                                    </span>
                                                <p>
                                                <p class="small mb-0">
                                                    <span>Giá tiền :
                                                        <span class="text-primary">
                                                            {{ number_format($item->price) . ' VND' }}
                                                        </span>
                                                    </span>
                                                </p>
                                                <p class="small mb-0">
                                                    <span>Tổng tiền :
                                                        <span class="text-primary">
                                                            {{ number_format($item->price * $item->qty) . ' VND' }}
                                                        </span>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class=" align-items-center">
                                            <i class="btn btn-outline-danger border-0 bx bx-trash"
                                                onclick="window.location = './cart/delete-to-cart/{{ $item->rowId }}'"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <p>Tổng tiền:
                                    <span>{{ $subtotal }}</span>
                                </p>
                            </div>
                            <div class="">
                                <a href="{{route('checkout.load')}}" class="btn btn-primary">Thanh toán</a>
                            </div>
                        </div>
                    @else
                        <p>Giỏ hàng trống</p>
                    @endif

                </div>
            </div>
        </div>
        <!-- End Cart-->

    </div>
@endsection
@push('js')
    <script>
        const rowId = $button.parent().find('input').data('rowId');
        updateCart(rowId, newVal);

        function updateCart(rowId, qty: qty) {
            $.ajax({
                type: "GET",
                url: "cart/update",
                data: {
                    rowId: rowId,
                    qty = qty,
                },
                success: function(response) {
                    alert('Cập nhật thành công !');
                }
            });
        }
    </script>
@endpush

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

                    @php
                        $total = 0;
                    @endphp

                    @if (session('cart'))
                        @foreach (session('cart') as $id => $product)
                            @php
                                $total += $product['price'] * $product['quantity'];
                            @endphp
                            <div class="card mb-3 mx-1 cart" data-id={{ $id }}>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="{{ asset('uploads/products/' . $product['image']) }}"
                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 70px;">
                                            </div>
                                            <div class="ms-3">
                                                <p class="fw-bold">{{ $product['name'] }} </p>
                                                <p class="small mb-0">
                                                    Số lượng:
                                                    <span class="text-info ">
                                                        <input style="width: 50px" type="number" value="{{ $product['quantity'] }}" class="form-control mt-1 quantity cart_update" min="1" />
                                                    </span>
                                                    <p>
                                            <p class="small mb-0">
                                                <span>Giá tiền :
                                                    <span class="text-primary">
                                                        {{ number_format($product['price']) . ' VND' }}
                                                    </span>
                                                </span>
                                            </p>
                                            <p class="small mb-0">
                                                <span>Tổng tiền :
                                                    <span class="text-primary">
                                                        {{ number_format($product['price'] * $product['quantity']) . ' VND' }}
                                                    </span>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class=" align-items-center">
                                        <a href="" class="btn btn-outline-danger border-0 cart-remove"><i
                                                class="bx bx-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                </div>
                @endforeach
                @endif
                <hr>
                <div class="d-flex justify-content-between">
                    <p>Tổng tiền : <span>{{ number_format($total) . ' VND' }}</span></p>
                    <div class="">
                        <a href="" class="btn btn-primary">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart-->

    </div>
@endsection
@push('js')
    <script>
        // change quantity
        $(document).ready(function() {
            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                $('#quantity').val(quantity + 1);
            });
            $('.quantity-left-minus').click(function(e) {
                e.preventDefault();
                var quantity = parseInt($('#quantity').val());
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
        // Update quantity
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents(".cart").attr("data-id"),
                    quantity: ele.parents(".cart").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
        $('.cart-remove').click(function(e) {
            e.preventDefault();
            console.log('a');
            var ele = $(this);

            if (confirm("Bạn có muốn xoá sản phẩm khỏi giỏ hàng ?")) {
                $.ajax({
                    url: '{{ route('cart.remove') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents(".cart").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endpush

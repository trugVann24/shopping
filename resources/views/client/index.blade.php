@extends('layouts.client.master')

@section('content')
    <div class="row mb-3">
        <div class="col-md">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class=""></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="1" class=""></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="2" class="active" aria-current="true"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item ">
                        <img class="d-block w-100"
                            src="https://images.unsplash.com/photo-1608739872119-f78feab7f976?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>First slide</h3>
                            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block w-100"
                            src="https://images.unsplash.com/photo-1584093091778-e7f4e76e8063?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Second slide</h3>
                            <p>In numquam omittam sea.</p>
                        </div>
                    </div>
                    <div class="carousel-item active ">
                        <img class="d-block w-100"
                            src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                            alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>Third slide</h3>
                            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="row mb-4 g-3 rounded">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Danh Mục</h5>
                    <div class="demo-inline-spacing text-center">
                        @php
                            $sub_categories = App\Models\SubCategory::where('status', '1')
                                ->where('status', '1')
                                ->get();
                        @endphp
                        @foreach ($sub_categories as $item)
                            <a href="" class="badge bg-primary">{{ $item->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4 g-3 bg-white rounded">
            <div class="col-sm-6 col-xl-3">
                <div class="border rounded">
                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">Tìm kiếm sản phẩm</div>
                        </div>
                        @php
                            $category = App\Models\Category::where('status', '1')
                                ->where('status', '1')
                                ->get();
                        @endphp
                        @foreach ($category as $item)
                            <div class="form-check mb-3 ">
                                <input class="form-check-input" type="checkbox" value="" id="{{ $item->id }}">
                                <label class="form-check-label cursor-pointer" for="{{ $item->id }}">
                                    {{ $item->name }} </label>
                            </div>
                        @endforeach
                        <div class="divider">
                            <div class="divider-text">Đánh Giá</div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3"> Checked </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3"> Checked </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3"> Checked </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3"> Checked </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3"> Checked </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row" id="product-data">
                    <!--Product Data-->
                </div>
                <div class="text-center m-3">
                    <button class="button-add" id="load-more" data-paginate="2">Xem thêm</button>
                    <p class="invisible">Không tìm thấy sản phẩm</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // $(document).ready(function() {
        //     $.ajax({
        //         type: "GET",
        //         url: "{{ route('home') }}",
        //         success: function(data) {
        //             if (data.products.length > 0) {
        //                 for (let index = 0; index < data.products.length; index++) {
        //                     let img = data.products[index]['image'];
        //                     let price = data.products[index]['price'];
        //                     let discount_price = data.products[index]['discount_price'];
        //                     let name = data.products[index]['name'];
        //                     $('#product-data').append(`
        //                 <div class="col-sm-6 col-xl-4 mb-3 " >
        //                     <div class="border rounded item-product">
        //                         <a href = "/home/product-details/` + data.products[index]['id'] + `" class = "">
        //                         <div class="card-body ">
        //                             <div class="d-flex align-items-center justify-content-between">

        //                                     <div class="d-flex justify-content-center flex-wrap align-items-center mb-2 pb-1">
        //                                     <img src="{{ asset('uploads/products/`+img+`') }}" alt=""
        //                                         class="img-fluid rounded-3 mb-2">
        //                                     <div class="text-center mt-2">
        //                                         <span class="d-block text-black fw-bold">` + name + `</span>
        //                                         <span class="text-danger fw-bold mt-2">` + discount_price + ` VNĐ</span>
        //                                         <span class="d-block text-secondary fw-bold">` + price + ` VNĐ</span>
        //                                             <div class="mt-1">
        //                                             <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
        //                                                 4.4 <span class="text-warning"><i
        //                                                         class="bx bxs-star me-1 mb-1"></i></span><span
        //                                                     class="text-muted">(1.23k)</span>
        //                                             </h6>
        //                                     </div>
        //                                     <div class="mt-2">
        //                                         <a href="/home/cart/add-to-cart/` + data.products[index]['id'] + `"
        //                                             class="d-flex align-items-center me-3 button-add">
        //                                             <i class="bx bx-cart me-1" ></i>Thêm giỏ hàng</a>
        //                                     </div>
        //                                     </div>
        //                                 </div>
        //                             </div>
        //                         </div>
        //                         </a>
        //                     </div>
        //             </div>
        //             `);
        //                 }
        //             } else {
        //                 $('#product-data').append('<span>Không có sản phẩm</span>');
        //             }
        //         },
        //         error: function(err) {
        //             console.log(err.responseText);
        //         }
        //     });
        // });

        var paginate = 1;
        loadMoreData(paginate);

        $('#load-more').click(function() {
            var page = $(this).data('paginate');
            loadMoreData(page);
            $(this).data('paginate', page + 1);
        });
        // run function when user click load more button
        function loadMoreData(paginate) {
            $.ajax({
                    url: '?page=' + paginate,
                    type: 'get',
                    datatype: 'html',
                    beforeSend: function() {
                        $('#load-more').text('Đang tải...');
                    }
                })
                .done(function(data) {
                    if (data.length == 0) {
                        $('.invisible').removeClass('invisible');
                        $('#load-more').hide();
                        return;
                    } else {
                        $('#load-more').text('Xem thêm sản phẩm');
                        $('#product-data').append(data);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('Đã xảy ra sự cố');
                });
        }
    </script>
@endpush

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
        <!-- End Breadcrumb -->

        <!-- Start Product Details -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-5 mb-md-0 mb-4">
                        <div class="card-body h-100 text-center">
                            <img src="{{ asset('uploads/products/' . $product_details->image) }}" alt="" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 mb-0 mt-4">
                        <span class="card-title fs-4">
                            {{ $product_details->name }}
                        </span>
                        <div class="row mt-3 text-center">
                            <div class="col-lg-3 border-end">
                                <h6 class="d-flex align-items-center justify-content-center gap-1 mb-0">
                                    4.4 <span class="text-warning"><i class="bx bxs-star me-1 mb-1"></i></span>
                                </h6>
                            </div>
                            <div class="col-lg-3 border-end">
                                <span class="text-muted">(1.23k) Đánh giá</span>
                            </div>
                            <div class="col-lg-3">
                                <span class="text-muted">(1.23k) Lượt bán</span>
                            </div>
                        </div>
                        @if ($product_details->discount_price != null)
                        <div class="mt-3 p-1" style="background-color: #fafafa">
                            <span class="card-text">Giảm giá : </span>
                            <span class="text-danger fs-4 fw-bold">{{ number_format($product_details->discount_price) }} VNĐ</span>
                            
                        </div>
                        @else
                        <div class="mt-3 p-1">
                            <span class="card-text">Giá sản phẩm : </span>
                            <span class="text-muted fs-4 fw-bold">{{ number_format($product_details->price).'VND' }}</span>
                        </div>
                        @endif
                        <div class="mt-3 p-1">
                            <span class="card-text">Số lượng còn lại: </span>
                            <span class="text-muted">{{ $product_details->quantity }}</span>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-4 col-lg-4">
                                <div class="input-group form-control" >
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-number" data-type="minus" data-field="">
                                            <span class=""><i class="bx bx-minus"></i></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control border-0 text-center input-number" value="1"
                                        min="1" max="10">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                            <span class=""><i class="bx bx-plus"></i></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-outline-primary "><i class="bx bx-cart me-1 mb-1"></i>Thêm vào giỏ hàng</button>

                            <button class="btn btn-outline-danger mx-2">Mua ngay</button>
                        </div>
                    </div>
                </div>
                <hr>

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8 text-center">
                        <h4 class="text-center mb-4 pb-2">Chi tiết sản phẩm</h4>
                        <span>
                            {!! $product_details->description !!}
                        </span>
                    </div>
                    <div class="col-lg-4 md:border-start">
                        <div class="row">
                            <div class="card mb-3 mx-1">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                            </div>
                                            <div class="ms-3">
                                                <h5>Samsung galaxy Note 10 </h5>
                                                <p class="small mb-0">256GB, Navy Blue</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div style="width: 50px;">
                                                <h5 class="fw-normal mb-0">2</h5>
                                            </div>
                                            <div style="width: 80px;">
                                                <h5 class="mb-0">$900</h5>
                                            </div>
                                            <a href="#!" style="color: #cecece;"><i class="bx bx-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 mx-1">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                            </div>
                                            <div class="ms-3">
                                                <h5>Samsung galaxy Note 10 </h5>
                                                <p class="small mb-0">256GB, Navy Blue</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div style="width: 50px;">
                                                <h5 class="fw-normal mb-0">2</h5>
                                            </div>
                                            <div style="width: 80px;">
                                                <h5 class="mb-0">$900</h5>
                                            </div>
                                            <a href="#!" style="color: #cecece;"><i class="bx bx-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 mx-1">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                            <div>
                                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img2.webp"
                                                    class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                            </div>
                                            <div class="ms-3">
                                                <a href="" class="">
                                                    <h6 class="">Samsung Galaxy Note 10 </h6>
                                                </a>
                                                <p class="small mb-0">256GB, Navy Blue</p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center">
                                            <div style="width: 50px;">
                                                <h5 class="fw-normal mb-0">2</h5>
                                            </div>
                                            <div style="width: 80px;">
                                                <h5 class="mb-0">$900</h5>
                                            </div>
                                            <a href="#!" style="color: #cecece;"><i class="bx bx-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Details -->

        <!-- Start Comment Feedback Product -->
        <div class="mt-3">
            <div class="card">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="text-center mb-4 pb-2">Đánh giá sản phẩm</h4>

                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-start">
                                            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp"
                                                alt="avatar" width="65" height="65" />
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            Maria Smantha <span class="small">- 2 hours ago</span>
                                                        </p>
                                                        <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                                    </div>
                                                    <p class="small mb-0">
                                                        It is a long established fact that a reader will be distracted by
                                                        the readable content of a page.
                                                    </p>
                                                </div>

                                                <div class="d-flex flex-start mt-4">
                                                    <a class="me-3" href="#">
                                                        <img class="rounded-circle shadow-1-strong"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(11).webp" alt="avatar" width="65"
                                                            height="65" />
                                                    </a>
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="mb-1">
                                                                    Simona Disa <span class="small">- 3 hours ago</span>
                                                                </p>
                                                            </div>
                                                            <p class="small mb-0">
                                                                letters, as opposed to using 'Content here, content here',
                                                                making it look like readable English.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-start mt-4">
                                                    <a class="me-3" href="#">
                                                        <img class="rounded-circle shadow-1-strong"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65"
                                                            height="65" />
                                                    </a>
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="mb-1">
                                                                    John Smith <span class="small">- 4 hours ago</span>
                                                                </p>
                                                            </div>
                                                            <p class="small mb-0">
                                                                the majority have suffered alteration in some form, by
                                                                injected humour, or randomised words.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-start mt-4">
                                            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(12).webp"
                                                alt="avatar" width="65" height="65" />
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            Natalie Smith <span class="small">- 2 hours ago</span>
                                                        </p>
                                                        <a href="#!"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                                    </div>
                                                    <p class="small mb-0">
                                                        The standard chunk of Lorem Ipsum used since the 1500s is
                                                        reproduced below for those interested. Sections 1.10.32 and
                                                        1.10.33.
                                                    </p>
                                                </div>

                                                <div class="d-flex flex-start mt-4">
                                                    <a class="me-3" href="#">
                                                        <img class="rounded-circle shadow-1-strong"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="avatar" width="65"
                                                            height="65" />
                                                    </a>
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="mb-1">
                                                                    Lisa Cudrow <span class="small">- 4 hours ago</span>
                                                                </p>
                                                            </div>
                                                            <p class="small mb-0">
                                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
                                                                scelerisque ante sollicitudin commodo. Cras purus odio,
                                                                vestibulum in vulputate at, tempus viverra turpis.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-start mt-4">
                                                    <a class="me-3" href="#">
                                                        <img class="rounded-circle shadow-1-strong"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(29).webp" alt="avatar" width="65"
                                                            height="65" />
                                                    </a>
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="mb-1">
                                                                    Maggie McLoan <span class="small">- 5 hours ago</span>
                                                                </p>
                                                            </div>
                                                            <p class="small mb-0">
                                                                a Latin professor at Hampden-Sydney College in Virginia,
                                                                looked up one of the more obscure Latin words, consectetur
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-start mt-4">
                                                    <a class="me-3" href="#">
                                                        <img class="rounded-circle shadow-1-strong"
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" width="65"
                                                            height="65" />
                                                    </a>
                                                    <div class="flex-grow-1 flex-shrink-1">
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <p class="mb-1">
                                                                    John Smith <span class="small">- 6 hours ago</span>
                                                                </p>
                                                            </div>
                                                            <p class="small mb-0">
                                                                Autem, totam debitis suscipit saepe sapiente magnam officiis
                                                                quaerat necessitatibus odio assumenda, perferendis quae iusto
                                                                labore laboriosam minima numquam impedit quam dolorem!
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Comment Feedback Product -->
    </div>
@endsection
@push('js')
    <script>

        // Click Quantity
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
    </script>
@endpush

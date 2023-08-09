@extends('layouts.admin')
@section('content')
    {{-- Notifications Error --}}
    @if ($errors->any())
        <div class="bs-toast toast-placement-ex toast fade bg-danger mx-3 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Có lỗi</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            @foreach ($errors->all() as $error)
                <div class="toast-body">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif

    {{-- Modal Add Category --}}
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Thêm Sản Phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="sub_category_id" class="">Danh Mục Nhỏ</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-select">
                                    <option value="">Chọn danh mục nhỏ</option>
                                    @foreach ($sub_categories as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="">Tên sản phẩm</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col mb-0">
                                <label for="nameWithTitle" class="">Giá gốc</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="price" value="{{ old('price') }}">
                            </div>
                            <div class="col mb-0">
                                <label for="nameWithTitle" class="">Giảm giá</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="discount_price" value="{{ old('discount_price') }}">
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="">Số Lượng</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="quantity" value="{{ old('quantity') }}">
                            </div>
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="">Hình Ảnh</label>
                                <input type="file" id="nameWithTitle" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Trạng thái hiển thị</label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col mb-1">
                                <label class="form-check-label" for="textarea-des">Chi Tiết</label>
                                <textarea class="form-control" id="textarea-des" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Thêm danh mục nhỏ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Product Details --}}
    <div class="modal fade" id="productDetailModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Thông tin chi tiết sản phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <div class="modal-body">
                    <p><strong>Tên danh mục nhỏ : </strong> <span id="pro-sub-category"></span></p>
                    <p><strong>Tên Sản Phẩm : </strong> <span id="pro-name"></span></p>
                    <p><strong>Số lượng : </strong> <span id="pro-quantity"></span></p>
                    <p><strong>Giá : </strong> <span id="pro-price"></span></p>
                    <p><strong>Giảm giá : </strong> <span id="pro-discount-price"></span></p>
                    <p><strong>Hình ảnh : </strong> <img src="{{asset('uploads/products/')}}" alt="" style="max-width: 100%;" id="pro-image"></p>
                    <p><strong>Chi tiết : </strong> <span id="pro-desc"></span></p>
                </div>
            </div>
            </form>
        </div>
    </div>

<!-- Breadcrumb -->
<div class="card mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3 px-3">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Sản Phẩm</a>
            </li>
            <li class="breadcrumb-item active">Danh Sách</li>
        </ol>
    </nav>
</div>
<!-- End Breadcrumb -->

<!-- Start Button Add Category -->
<div class="card mb-2">
    <div class="row">
        <div class="col-lg-4 col-md-4 order-0 my-3 mx-2">
            <div class="">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                    Thêm Sản Phẩm
                </button>
            </div>
        </div>
    </div>
</div>
<!-- End Button Add Category -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table-hover table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Danh Mục</th>
                        <th>Danh Mục Nhỏ</th>
                        <th>Sản Phảm</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- Load Data Sub Category --}}
                    @foreach ($products as $product)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $product->id }}</strong></td>
                            <td>{{ $product->sub_category->category->name }}</td>
                            <td>{{ $product->sub_category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->status == '1')
                                    <span class="badge bg-label-primary me-1">Hiển thị</span>
                                @elseif($product->status == '0')
                                    <span class="badge bg-label-danger me-1">Ẩn</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a 
                                        href="#" 
                                        class="btn btn-link p-0 ms-2 show_product_details"
                                        data-id="{{$product->id}}"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#productDetailModal">
                                        <i class="bx bx-show me-1"></i>
                                    </a>

                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-link p-0 ms-2 " data-bs-toggle="tooltip"
                                        data-bs-placement="top" aria-label="Edit" data-bs-original-title="Sửa sản phẩm"><i class="bx bx-edit-alt me-1"></i></a>

                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link p-0 ms-2 show_confirm text-danger" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Delete" data-bs-original-title="Xoá sản phẩm"><i
                                                class="bx bx-trash me-1"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
        <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.show_product_details').click(function (e) { 
                const id = $(this).attr('data-id');
                $.ajax({
                    type: "GET",
                    url: "product/show/" + id,
                    data: {
                        "id" : id,
                    },
                    success: function (data) {
                        $('#pro-sub-category').html(data.sub_category_id);
                        $('#pro-name').html(data.name);
                        $('#pro-quantity').html(data.quantity);
                        $('#pro-price').html(data.price);
                        $('#pro-discount-price').html(data.discount_price);
                        $('#pro-image').attr('src',data.image);
                        $('#pro-desc').html(data.description);
                    }
                });
                
            });
        });
        // Show Alert Confirm Delete
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Bạn có muốn xoá danh mục ?`,
                    icon: "warning",
                    buttons: ["Huỷ", "Đồng ý!"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });

        ClassicEditor
            .create(document.querySelector('#textarea-des'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush

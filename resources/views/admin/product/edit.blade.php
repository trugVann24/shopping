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
            <li class="breadcrumb-item active">Sửa</li>
        </ol>
    </nav>
</div>
<!-- End Breadcrumb -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Sửa Sản Phẩm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <form action="{{ route('product.update', $products->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <input type="hidden" name="id" value="{{ $products->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="sub_category_id" class="">Danh Mục Nhỏ</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-select">
                                    <option value="">Chọn danh mục nhỏ</option>
                                    @foreach ($sub_categories as $sub)
                                        <option @selected($sub->id == $products->sub_category_id)
                                            value="{{ $sub->id }}">{{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="">Tên sản phẩm</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="name" value="{{$products->name }}">
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col mb-0">
                                <label for="nameWithTitle" class="">Giá gốc</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="price" value="{{ $products->price }}">
                            </div>
                            <div class="col mb-0">
                                <label for="nameWithTitle" class="">Giảm giá</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="discount_price" value="{{ $products->discount_price }}">
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="">Số Lượng</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="quantity" value="{{ $products->quantity }}">
                            </div>
                            <div class="col mb-1">
                                <label for="nameWithTitle" class="">Hình Ảnh</label>
                                <input type="file" id="nameWithTitle" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="row g-2 mt-1">
                            <div class="form-check form-switch">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Trạng thái hiển thị</label>
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status"
                                {{ $products->status == 1 ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col mb-1">
                                <label class="form-check-label" for="textarea-des">Chi Tiết</label>
                                <textarea class="form-control" id="textarea-des" name="description" >{{ $products->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                    </div>
                </form>
            </div>
    </div>
@endsection
@push('js')
<script>
    ClassicEditor
    .create(document.querySelector('#textarea-des'))
    .catch(error => {
        console.error(error);
    });
</script>
@endpush
@extends('layouts.admin.master')
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
                    <a href="">Danh Mục Phụ</a>
                </li>
                <li class="breadcrumb-item active">Sửa</li>
            </ol>
        </nav>
    </div>
    <!-- End Breadcrumb -->

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Sửa Danh Mục Phụ</h5>
            </div>
            <form action="{{ route('subcategory.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $subcategories->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="category_id" class="">Tên Danh Mục</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="">Chọn danh mục</option>
                                @foreach ($categories as $category)
                                <option @selected($category->id == $subcategories->category_id)
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="">Danh Mục Phụ</label>
                            <input type="text" id="nameWithTitle" class="form-control" name="name" value="{{ $subcategories->name }}">
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Trạng thái hiển thị</label>
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status"
                            {{ $subcategories->status == 1 ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="button-add">Sửa danh mục phụ</button>
                </div>
            </form>
        </div>
    </div>



@endsection

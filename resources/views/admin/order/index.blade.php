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

    {{-- Modal Add Category --}}
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Thêm Danh Mục Nhỏ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr>
                <form action="{{ route('subcategory.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="category_id" class="">Tên Danh Mục</label>
                                <select name="category_id" id="category_id" class="form-select">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameWithTitle" class="">Danh Mục Nhỏ</label>
                                <input type="text" id="nameWithTitle" class="form-control" name="name">
                            </div>
                        </div>
                        
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Trạng thái hiển thị</label>
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Thêm danh mục nhỏ</button>
                    </div>
                </form>
            </div>
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
                    <a href="">Danh Mục Phụ</a>
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
                        Thêm Danh Mục Phụ
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
                        <th>Slug</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    {{-- Load Data Sub Category --}}
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $subcategory->id }}</strong></td>
                            <td>{{ $subcategory->category->name }}</td>
                            <td>{{ $subcategory->name }}</td>
                            <td>{{ $subcategory->slug }}</td>
                            <td>
                                @if ($subcategory->status == '1')
                                    <span class="badge bg-label-primary me-1">Hiển thị</span>
                                @elseif($subcategory->status == '0')
                                    <span class="badge bg-label-danger me-1">Ẩn</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{route('subcategory.edit', $subcategory->id)}}" class="btn btn-link p-0 ms-2 editButton" data-bs-toggle="tooltip"
                                        data-bs-placement="top" aria-label="Edit" data-bs-original-title="Sửa danh mục"><i class="bx bx-edit-alt me-1"></i></a>

                                    <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link p-0 ms-2 show_confirm text-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Delete" data-bs-original-title="Xoá danh mục"><i class="bx bx-trash me-1"></i></button>
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

    <script>
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
    </script>
@endpush

@extends('layouts.admin')
@section('content')
<!-- Breadcrumb -->
<div class="card mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3 px-3">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Danh Mục</a>
            </li>
            <li class="breadcrumb-item active">Sửa</li>
        </ol>
    </nav>
</div>
<!-- End Breadcrumb -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Sửa Danh Mục</h5>
            </div>
            <form action="{{ route('category.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $categories->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameWithTitle" class="">Tên Danh Mục</label>
                            <input type="text" id="nameWithTitle" class="form-control" name="name"
                                value="{{ $categories->name }}">
                            @error('name')
                                <div class="errors-mess"><i class='bx bx-error-circle'></i>{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Trạng thái hiển thị</label>
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status"
                            {{ $categories->status == 1 ? 'checked' : '' }}>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sửa danh mục</button>
                </div>
            </form>
        </div>
    </div>



@endsection

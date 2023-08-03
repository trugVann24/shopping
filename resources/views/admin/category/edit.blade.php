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
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Sửa Danh Mục</h5>
        </div>
        <form action="{{route('category.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$categories->id}}">
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="">Tên Danh Mục</label>
                        <input type="text" id="nameWithTitle" class="form-control" name="name" value="{{$categories->name}}">
                    </div>
                </div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Trạng thái hiển thị</label>
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="status" {{ $categories->status==1 ? 'checked': '' }}>
                    
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sửa danh mục</button>
            </div>
        </form>
    </div>
    </div>



@endsection

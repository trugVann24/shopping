@extends('layouts.admin.master')

@section('content')
    
<!-- Start Data Product -->
<div class="card">
    <div class="table-responsive text-nowrap">
        <table class="table-hover table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Avatar</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Số ĐT</th>
                    <th>Địa Chỉ</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                {{-- Load Data Sub Category --}}
                @foreach ($accounts as $account)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $account->id }}</strong></td>
                        <td>
                            <img class="img-fluid rounded my-4" src="https://images.unsplash.com/photo-1690975243919-4aa73dc78c81?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=464&q=80" height="40" width="40" alt="User avatar">
                        </td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->phone }}</td>
                        <td>{{ $account->address }}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{ route('account.destroy', $account->id) }}" method="POST">
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
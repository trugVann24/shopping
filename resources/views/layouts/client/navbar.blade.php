<div class="container-fluid">
    <a class="navbar-brand text-primary fs-2 fw-bold" href="javascript:void(0)">V-STORE</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-7">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbar-ex-7">
        <div class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Trang Chủ</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle hide-arrow navbar-ex-15-mega-dropdown mega-dropdown"
                    href="javascript:void(0)" data-bs-toggle="dropdown" data-trigger="hover">Danh Mục</a>
                <div class="dropdown-menu ">
                    <a class="dropdown-item " href="javascript:void(0)"></a>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Bài Viết</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Liên Hệ</a>
            </li>
        </div>
        <div class="">
            <ul class="navbar-nav ms-lg-auto">
                <li class="nav-item btn-group" id="hover-dropdown-demo">
                    <a class="nav-link dropdown-toggle hide-arrow" href="" data-bs-toggle="dropdown"
                        data-trigger="hover" aria-expanded="false">
                        <i class="bx bx-cart bx-sm"></i>
                        <span class="badge bg-danger rounded-pill badge-notifications">{{ Cart::count() }}</span>
                    </a>
                    <ul class="dropdown-menu"data-popper-placement="left-end"
                        style="position: absolute; inset: auto 0px 0px auto; margin: 0px; transform: translate3d(-26px, 100%, 0px);">
                        <li class="">
                            <div class="dropdown-item">
                                <div class="row ">
                                    @if (Cart::count() > 0)
                                        @foreach (Cart::content() as $cart)
                                            <div class="card mb-3 mx-1">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center mx-1">
                                                            <div style="width:50px; height: 70px;"
                                                                class="overflow-hidden object-fit">
                                                                <img src="{{ asset('uploads/products/' . $cart->options->image) }}"
                                                                    class="img-fluid " alt="Shopping item">
                                                            </div>
                                                            <div class="ms-4">
                                                                <p class="fs-6">{{ $cart->name }}</p>
                                                                <p class="small mb-0">
                                                                    <span>
                                                                        Số lượng:
                                                                        <span class="text-info">
                                                                            {{ 'x' . $cart->qty }}
                                                                        </span>
                                                                    </span>
                                                                </p>
                                                                <p class="mb-0 small">
                                                                    <span>Giá tiền :
                                                                        <span class="text-primary">
                                                                            {{ number_format($cart->price * $cart->qty) . ' VND' }}
                                                                        </span>
                                                                    </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="btn btn-outline-danger border-0 bx bx-trash"
                                                                onclick="window.location = './cart/delete-to-cart/{{ $cart->rowId }}'"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <hr>
                                        <p>
                                            Tổng tiền:
                                            <span>{{ Cart::total() }}</span>
                                        </p>
                                        <a href="{{ route('cart.load') }}" class="button-add text-center">Xem tất cả
                                            <i class='bx bx-chevrons-right'></i>
                                        </a>
                                    @else
                                        <p>Giỏ hàng trống !</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="javascript:void(0)" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                        <i class=" bx bx-search bx-sm"></i>
                    </a>
                </li>


                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a href="" class="dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <div class="avatar me-2 avatar-online pull-up">
                            <img src="https://images.unsplash.com/photo-1682687220363-35e4621ed990?ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=387&q=80"
                                alt="Avatar" class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="pages-account-settings-account.html">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <span class="fw-medium d-block">{{ auth()->user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('profile.load')}}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Trang cá nhân</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" target="_blank">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Đăng Xuất</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

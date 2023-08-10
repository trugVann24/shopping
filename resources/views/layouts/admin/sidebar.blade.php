<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">V-Store</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large d-block d-xl-none ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" id="menu-inner">
        <!-- Dashboard -->
        <li class="menu-item {{Request::is('admin') ? 'active' : ''}}">
            <a href="{{route('admin')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Trang Chủ</div>
            </a>
        </li>

        <!-- Category -->
        <li class="menu-header">
        </li>
        <li class="menu-item {{Request::is('admin/category') ? 'active' : ''}}">
            <a href="{{route('category.index')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Account Settings">QL Danh Mục</div>
            </a>
        </li>

        <!-- Sub Category -->
        <li class="menu-header ">
        </li>
        <li class="menu-item {{Request::is('admin/subcategory') ? 'active' : ''}}">
            <a href="{{route('subcategory.index')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Account Settings">QL Danh Mục Nhỏ</div>
            </a>
        </li>

        <!-- Product -->
        <li class="menu-header ">
        </li>
        <li class="menu-item {{Request::is('admin/product') ? 'active' : ''}}">
            <a href="{{route('product.index')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Account Settings">QL Sản Phẩm</div>
            </a>
        </li>

        <!-- Order -->
        <li class="menu-header">
        </li>
        <li class="menu-item {{Request::is('admin/order') ? 'active' : ''}}">
            <a href="javascript:void(0);" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-cart-alt"></i>
                <div data-i18n="Account Settings">QL Đơn Hàng</div>
            </a>
        </li>

        <!-- Comment -->
        <li class="menu-header">
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-message-rounded-dots"></i>
                <div data-i18n="Account Settings">QL Bình Luận</div>
            </a>
        </li>

        <!-- Account -->
        <li class="menu-header">
        </li>
        <li class="menu-item {{Request::is('admin/account') ? 'active' : ''}}">
            <a href="{{route('account.index')}}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">QL Tài Khoản</div>
            </a>
        </li>
    </ul>
</aside>
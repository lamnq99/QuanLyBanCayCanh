<div id="sidebar" class="sidebar-container">
    <header>
        <a href="#">My App</a>
    </header>
    <ul class="nav d-flex flex-column">
        <li>
            <a href="{{ route('products.index') }}">
                Quản lý sản phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('customer.index') }}">
                Quản lý khách hàng
            </a>
        </li>
        <li>
            <a href="{{ route('staff.index') }}">
                Quản lý nhân viên
            </a>
        </li>
        <li>
            <a href="{{ route('bill.index') }}">
                Quản lý hóa đơn
            </a>
        </li>
    </ul>
</div>

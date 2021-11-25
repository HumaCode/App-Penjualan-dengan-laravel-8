<div class="sidebar" data-color="purple" data-image="/assets/img/sidebar-5.jpg">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="/dashboard" class="simple-text">
                Website Penjualan
            </a>
        </div>

        <ul class="nav">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard">
                    <i class="fa fa-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('product*') ? 'active' : '' }}">
                <a href="/product">
                    <i class="pe-7s-box1"></i>
                    <p>Daftar Produk</p>
                </a>
            </li>
            <li class="{{ Request::is('category*') ? 'active' : '' }}">
                <a href="/category">
                    <i class="pe-7s-note2"></i>
                    <p>Kategori</p>
                </a>
            </li>

            <li class="">
                <a href="#">
                    <i class="pe-7s-user"></i>
                    <p>Pelanggan</p>
                </a>
            </li>
            


            <li class="active-pro">
                <a href="/dashboard/profile/{{ auth()->user()->id }}">
                    <i class="pe-7s-user"></i>
                    <p>Profile Saya</p>
                </a>
            </li>
        </ul>
    </div>
</div>
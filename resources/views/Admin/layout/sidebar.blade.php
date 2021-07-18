<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Admin
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
             data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main left_menu">
                    <li slot="dashboard">
                        <a href="{{route('dashboard')}}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li slot="users">
                        <a href="{{route('user.index')}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li slot="products">
                        <a href="{{route('get_list_products')}}">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li slot="sizes">
                        <a href="{{route('get_list_sizes')}}">
                            <i class="fa fa-bar-chart-o" aria-hidden="true"></i>
                            <span>Sizes</span>
                        </a>
                    </li>
                    <li slot="colors">
                        <a href="{{route('get_list_colors')}}">
                            <i class="fa fa-magic" aria-hidden="true"></i>
                            <span>Colors</span>
                        </a>
                    </li>
                    <li slot="categories">
                        <a href="{{route('get_list_categories')}}">
                            <i class="fa fa-cubes" aria-hidden="true"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li slot="product_options">
                        <a href="{{route('get_list_product_options')}}">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            <span>Product options</span>
                        </a>
                    </li>
                    <li slot="orders">
                        <a href="{{route('get_list_orders')}}">
                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li slot="order_details">
                        <a href="{{route('get_list_order_details')}}">
                            <i class="fa fa-circle-o-notch" aria-hidden="true"></i>
                            <span>Order details</span>
                        </a>
                    </li>
                    <li slot="contacts">
                        <a href="{{route('get_list_contacts')}}" slot="1">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Contacts</span>
                        </a>
                    </li>
                    <li >
                        <a href="{{route('get_form')}}" slot="1">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Form</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>

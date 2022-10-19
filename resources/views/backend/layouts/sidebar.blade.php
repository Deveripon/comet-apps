<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="">
                    <a href="{{route('dashboard.page')}}"><i class="fe fe-home"></i></i> <span>Dashboard</span></a>
                </li>

                @if(in_array("Slider",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="">
                    <a href="{{route('slider.index')}}"><i class="fa-brands fa-slideshare"></i> <span>Slider</span></a>
                </li>
                @endif

                @if(in_array("Testimonial",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="">
                    <a href="{{route('testimonial.index')}}"><i style="font-size:20px"
                            class="fa-solid fa-star"></i><span>Testimonials</span></a>
                </li>
                @endif
                @if(in_array("clients",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="">
                    <a href="{{route('client.index')}}"><i style="font-size:20px"
                            class="fa-solid fa-address-card"></i><span>Cliens</span></a>
                </li>
                @endif
                @if(in_array("Expertise",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="">
                    <a href="{{route('expertise.index')}}"><i style="font-size:20px"
                            class="fa-solid fa-biohazard"></i><span>Expertise</span></a>
                </li>
                @endif
                @if(in_array("Vision",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="">
                    <a href="{{route('vision.index')}}"><i style="font-size:20px"
                            class="fa-solid fa-biohazard"></i><span>Vision</span></a>
                </li>
                @endif

                @if(in_array("Portfolio",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fa-solid fa-icons"></i> <span> Portfolio</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('portfolio.index')}}">All portfolio</a></li>
                        <li><a href="{{route('port_category.index')}}">Category</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array("Posts",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('post.index')}}">All Posts</a></li>
                        <li><a href="{{route('category.index')}}">Category</a></li>
                        <li><a href="{{route('tags.index')}}">Tags</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array("Products",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fe fe-cart"></i> <span> Products</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('product.index')}}">All Products</a></li>
                        <li><a href="{{route('product-category.index')}}">Category</a></li>
                        <li><a href="{{route('product-tag.index')}}">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if(in_array("Admin Options",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fa-regular fa-circle-user"></i> <span> Admin Options</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('user.index')}}">Admin Users</a></li>
                        <li><a href="{{route('role.index')}}">Role</a></li>
                        <li><a href="{{route('permission.index')}}">Permision</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array("Theme Options",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fa-solid fa-screwdriver-wrench"></i> <span> Theme Options</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Admin Users</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array("Settings",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="">
                    <a href="{{route('settings.index')}}"><i class="fa-solid fa-gears"></i><span>Settings</span></a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</div>
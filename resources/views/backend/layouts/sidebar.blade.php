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
                    <a href="index.html"><i style="font-size:20px" class="fa-solid fa-star"></i><span>Testimonials</span></a>
                </li>
                @endif
                @if(in_array("clients",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class=""> 
                    <a href="index.html"><i style="font-size:20px" class="fa-solid fa-address-card"></i><span>Cliens</span></a>
                </li>
                @endif
        
                @if(in_array("Our Team",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class=""> 
                    <a href="index.html"><i style="font-size:20px" class="fa-solid fa-users"></i><span>Our Team</span></a>
                </li>
                @endif

                @if(in_array("Portfolio",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fa-solid fa-icons"></i> <span> Portfolio</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">All portfolio</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tags</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array("Posts",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Posts</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">All Posts</a></li>
                        <li><a href="invoice-report.html">Category</a></li>
                        <li><a href="invoice-report.html">Tags</a></li>
                    </ul>
                </li>
                @endif

                @if(in_array("Admin Options",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fa-regular fa-circle-user"></i> <span> Admin Options</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{route('user.index')}}">Admin Users</a></li>
                        <li><a href="{{route('role.index')}}">Role</a></li>
                        <li><a href="{{route('permission.index')}}">Permision</a></li>
                    </ul>
                </li>
                @endif
                @if(in_array("Theme Options",json_decode(Auth::guard('admin')-> user() ->user_role->permissions)))
                <li class="submenu">
                    <a href="#"><i class="fa-solid fa-screwdriver-wrench"></i> <span> Theme Options</span> <span class="menu-arrow"></span></a>
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
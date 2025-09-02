<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href={{ route("admin-home") }} class="brand-link">
        <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href={{ route("admin-home") }} class="nav-link {{ Request::is('secretgate/dashboard') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a 
                        href="#"
                        class="nav-link 
                            {{ Request::is('secretgate/testimonials', 'secretgate/testimonials/*') 
                            || Request::is('secretgate/heroes', 'secretgate/heroes/*') 
                            || Request::is('secretgate/about', 'secretgate/about/*') 
                            || Request::is('secretgate/value', 'secretgate/value/*') 
                            || Request::is('secretgate/statistiks', 'secretgate/statistiks/*') 
                            || Request::is('secretgate/benefits', 'secretgate/benefits/*') 
                            || Request::is('secretgate/others', 'secretgate/others/*') 
                            ? 'active' : ''}}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("heroes.index") }}" class="nav-link {{ Request::is('secretgate/heroes*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hero Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin-about-section") }}" class="nav-link {{ Request::is('secretgate/about*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin-value-section") }}" class="nav-link {{ Request::is('secretgate/value*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Value Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("statistiks.index") }}" class="nav-link {{ Request::is('secretgate/statistiks*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistik Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("benefits.index") }}" class="nav-link {{ Request::is('secretgate/benefits*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Benefit Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("testimonials.index") }}" class="nav-link {{ Request::is('secretgate/testimonials*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonial Section</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin-others-section") }}" class="nav-link {{ Request::is('secretgate/others*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Others</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route("programs.index") }}" class="nav-link {{ Request::is('secretgate/programs', 'secretgate/programs/*') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-award"></i>
                        <p>
                            Programs
                        </p>
                    </a>
                </li> 
                <li class="nav-item">
                    <a href="{{ route("posts.index") }}" class="nav-link {{ Request::is('secretgate/posts', 'secretgate/posts/*') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-blog"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>  --}}
                {{-- <li class="nav-item">
                    <a 
                        href="#"
                        class="nav-link 
                            {{ Request::is('secretgate/facility/categories', 'secretgate/facility/categories/*') 
                            || Request::is('secretgate/facility/facilities', 'secretgate/facility/facilities/*') 
                            ? 'active' : ''}}">
                        <i class="nav-icon fa fa-layer-group"></i>
                        <p>
                            Facilities Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("categories.index") }}" class="nav-link {{ Request::is('secretgate/facility/categories/*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("facilities.index") }}" class="nav-link {{ Request::is('secretgate/facility/facilities/*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Facility</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route("faqs.index") }}" class="nav-link {{ Request::is('secretgate/faqs', 'secretgate/faqs/*') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-question"></i>
                        <p>
                            FAQ
                        </p>
                    </a>
                </li>  --}}
                <li class="nav-item">
                    <a href="{{ route("people.index") }}" class="nav-link {{ Request::is('secretgate/people', 'secretgate/galleries/*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            People
                        </p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a 
                        href="#"
                        class="nav-link 
                            {{ Request::is('secretgate/contacts', 'secretgate/contacts/*') 
                            || Request::is('secretgate/sosmeds ', 'secretgate/sosmeds/*') 
                            || Request::is('secretgate/partners ', 'secretgate/partners/*') 
                            ? 'active' : ''}}">
                        <i class="nav-icon fa fa-phone"></i>
                        <p>
                            Contact Page
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("contacts.index") }}" class="nav-link {{ Request::is('secretgate/contacts*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("sosmeds.index") }}" class="nav-link {{ Request::is('secretgate/sosmeds*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sosial Media</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("partners.index") }}" class="nav-link {{ Request::is('secretgate/partners*') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Partner</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                
                @can('superadmin')
                    <li class="nav-item">
                        <a href="{{ route("admin-employees") }}" class="nav-link {{ Request::is('secretgate/employees', 'secretgate/employees/*') ? 'active' : ''}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Employee
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar_blog_1">
                <div class="sidebar-header">
                    <div class="logo_section">
                        <a href="{{ route('admin.dasboard') }}"><img class=" img-responsive" src=" {{ asset("Admin/asset/images/logo/logo_icon.png") }}" alt="#" /></a>
                    </div>
                </div>
                <div class="sidebar_user_info">
                    <div class="icon_setting"></div>
                    <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{ asset("Admin/asset/images/layout_img/user_img.jpg") }}" alt="#" /></div>
                        <div class="user_info">
                            <h6>{{ Auth::guard('admin')->user()->name }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar_blog_2">
                <h4>General</h4>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                            <li>
                            <a href="{{ route('admin.dasboard') }}">> <span>Default Dashboard</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.article.index') }}" ><i class="fa fa-diamond purple_color"></i> <span>show article detail</span></a>
                    </li>
                    <li>
                        <a href="#apps"><i class="fa fa-object-group blue2_color"></i> <span>show User</span></a>
                    </li>
                    <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-briefcase blue1_color"></i> <span>List of category </span></a></li>
                    <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Create article</span></a></li>
                </ul>
            </div>
        </nav>
        <!-- end sidebar -->


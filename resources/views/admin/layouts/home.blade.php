
<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.includes.header_asset')
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa @yield('main-icon')"></i> <span>@yield('title')</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <?php $image_path = empty(\Illuminate\Support\Facades\Auth::user()->image_path) ? 'images/user.png' : \Illuminate\Support\Facades\Auth::user()->image_path; ?>
                                   <img src="{{ URL::asset($image_path) }}" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>@yield('full-name')</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        @include('admin.includes.sidebar_menu')
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        @include('admin.includes.sidebar_footer')
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                @include('admin.includes.top_navigation')
                <!-- /top navigation -->

                <!-- page content -->
                @yield('page-content')
                <!-- /page content -->

                <!-- footer content -->
                @include('admin.includes.footer_content')
                <!-- /footer content -->
            </div>
        </div>

        @include('admin.includes.footer_asset')
        @yield('add_js')
     </body>
</html>
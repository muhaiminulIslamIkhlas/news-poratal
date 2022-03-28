<style>
    .main-image {
        display: block;
        padding: 5px;
        background: floralwhite;
    }

    .main-image__image {
        max-height: 50px;
        width: auto;
    }

</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL('admin/')}}" class="main-image">
        <img src="{{asset('assets/dist/img/bnbd.png')}}" alt="AdminLTE Logo"
             class="main-image__image"
        >
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('assets/dist/img/avatar5.png')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('admin/')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if(\Illuminate\Support\Facades\Auth::user()->id == 1): ?>
                        <li class="nav-item">
                            <a href="{{URL('admin/user/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="{{URL('admin/user/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            News
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All News</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            প্রচ্ছদ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/procchod/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All প্রচ্ছদ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/procchod/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            রাজনীিত
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/rajniti/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All রাজনীিত</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/rajniti/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            জাতীয়
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/jatio/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All জাতীয়</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/jatio/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            খেলা
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/khela/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All খেলা</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/khela/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            আন্তর্জাতিক
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/antorjatik/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All আন্তর্জাতিক</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/antorjatik/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            বিনোদন
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/binodon/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All বিনোদন</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/binodon/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            স্বাস্থ্য
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/health/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All স্বাস্থ্য</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/health/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            ফিচার
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/news/feature/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All ফিচার</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/news/feature/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/category/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/category/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Catgories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            SubCategory
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/subcategory/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New SubCategory</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/subcategory/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All SubCatgories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Keyword
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/keyword/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Keyword</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/keyword/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Keyword</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Video
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/video/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Video</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/video/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Videos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Image
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/image/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Image</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/news/image/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Images</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Votes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL('admin/vote/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Votes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{URL('admin/vote/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create New</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Opinion
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/opinion/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Opinion</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/opinion/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Opinion</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Information
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/information/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Information</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Contact
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{Url('/admin/contact/create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New Contact</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{Url('/admin/contact/index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View All Contact</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" value="Log out" class="btn btn-danger btn-block"/>
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@php
    $categories = \App\Models\Category::withoutTrashed()->get()
@endphp
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin/dashboard')}}">
        <div class="sidebar-brand-icon">
            <img class="img-fluid" src="{{asset('admin/assets/img/logo-banyuwangi.png')}}" alt="Logo Banyuwangi"
                 width="70%">
        </div>
        <div class="sidebar-brand-text mx-3">Jambesari</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blog
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('/admin/category')}}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Category</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Blog</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category:</h6>
                @foreach($categories as $category)
                    <a class="collapse-item" href="/admin/content/{{$category->id}}">{{$category->title}}</a>
                @endforeach
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Desa
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerangkat"
           aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-fw fa-user"></i>
            <span>Perangkat</span>
        </a>
        <div id="collapsePerangkat" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Desa</h6>
                <a class="collapse-item" href="{{route('level.index')}}">Jabatan</a>
                <a class="collapse-item" href="{{route('staff.index')}}">Perangkat Desa</a>
                <a class="collapse-item" href="{{route('association.index')}}">RT/RW</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengurusan Surat Desa</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Surat dan Prasyarat</h6>
                <a class="collapse-item" href="{{route('document.index')}}">Surat</a>
                <a class="collapse-item" href="{{route('citizen.index')}}">Pengurusan Surat</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('critics.index')}}">
            <i class="fas fa-fw fa-mail-bulk"></i>
            <span>Kritik dan Saran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

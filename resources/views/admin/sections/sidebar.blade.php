<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text" href="{{ url('/') }}">@lang('admin/main.website')</a>
        </div>

        <ul class="nav">
            @role(\Lara\Roles::SUPER_ADMIN)
            <li class="admins">
                <a href="{{ route('admins.index') }}"><i class="ti-user"></i><p>@lang('admin/main.admins')</p></a>
            </li>
            @endrole
            <li class="user">
                <a href="{{ route('admin.user') }}"><i class="ti-user"></i><p>User Profile</p></a>
            </li>
            <li class="table">
                <a href="{{ route('admin.table') }}"><i class="ti-view-list-alt"></i><p>Table List</p></a>
            </li>
            <li class="icons">
                <a href="{{ route('admin.icons') }}"><i class="ti-pencil-alt2"></i><p>Icons</p></a>
            </li>
            <li class="maps">
                <a href="{{ route('admin.maps') }}"><i class="ti-map"></i><p>Maps</p></a>
            </li>
            <li class="notifications">
                <a href="{{ route('admin.notifications') }}"><i class="ti-bell"></i><p>Notifications</p></a>
            </li>
            <li class="active-pro">
                <a href="#"><i class="ti-export"></i>Update</a>
            </li>
        </ul>
    </div>
</div>
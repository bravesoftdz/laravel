<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a class="simple-text" href="{{ url('/') }}">Website</a>
        </div>

        <ul class="nav">
            <li class="admins">
                <a href="{{ route('admins.index') }}"><i class="ti-user"></i><p>Admin Users</p></a>
            </li>
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
<div class="sidebar" data-color="purple" data-image="/backend/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('/')? 'active': ''}}">
                <a href="dashboard.html">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/user')?'active':''}}">
                <a href="{{ route('user.index') }}">
                    <i class="material-icons">person</i>
                    <p>View Users</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/slide')?'active':''}}">
                <a href="{{ route('slide.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Slides</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/catagory')?'active':''}}">
                <a href="{{route('catagory.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Catagiries</p>
                </a>
            </li>
            <li class="{{ Request::is('admin/item')?'active':'' }}">
                <a href="{{ route('item.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Items</p>
                </a>
            </li>
            <li>
                <a href="./maps.html">
                    <i class="material-icons">location_on</i>
                    <p>Maps</p>
                </a>
            </li>
            <li>
                <a href="./notifications.html">
                    <i class="material-icons text-gray">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="active-pro">
                <a href="upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>
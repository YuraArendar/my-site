<li class="dropdown dropdown-user">
    <a class="dropdown-toggle" data-toggle="dropdown">
        <img src="/assets/admin/images/placeholder.jpg" alt="">
        <span>{{ Auth::user()->name }}</span>
        <i class="caret"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-right">
        <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
        <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
        <li><a href="/admin/auth/logout"><i class="icon-switch2"></i> Logout</a></li>
    </ul>
</li>
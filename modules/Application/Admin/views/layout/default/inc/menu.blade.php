<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="/assets/admin/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ Auth::user()->name  }}</span>

                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li><a href="/admin"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li @if($template == 'structure') class="active" @endif><a href="/admin/structure"><i class="fa fa-sitemap"></i> <span>Structure</span></a></li>
                    <li @if($template == 'content') class="active" @endif><a href="/admin/content"><i class="icon-stack-text"></i> <span>Content</span></a></li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
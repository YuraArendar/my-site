
    <!-- Page header mini -->
    <div class="page-header page-header-xs panel border-top-primary" style="padding-bottom: 0;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">{{ $title }}</span></h5>
            </div>

            <div class="heading-elements">
                <div class="btn-group heading-btn">
                    <button class="btn btn-danger btn-icon btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cogs"></i>
                        <span class="caret"></span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/admin/{{ $template }}/create">Add new {{ $itemName }}<i class=" icon-add pull-right"></i></a></li>
                        <li><a href="#"><i class="icon-phone2 pull-right"></i> Another action</a></li>
                        <li><a href="#"><i class="icon-camera pull-right"></i> Something else</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-wide" style="box-shadow: none;">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="/admin/{{ $template }}">{{ \Illuminate\Support\Str::title($template) }}</a></li>
                <li class="active">{{ $title }}</li>
            </ul>



                <div class="btn-group pull-right">
                    <a href="#" class="label bg-brown dropdown-toggle lang-dropdown" data-toggle="dropdown">{{ Config::get('admin.all_locals')[\Application\Admin\Helpers\FormLang::getCurrentLang()] }}<span class="caret"></span></a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        @foreach(Config::get('admin.all_locals') as $local=>$name)
                            @if($local != \Application\Admin\Helpers\FormLang::getCurrentLang())
                                <li><a data-lang="{{ $local }}" class="change-lang-form">{{ $name }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>


        </div>
    </div>
    <!-- /page header mini -->

<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
<link href="/assets/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
<link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/admin/css/core.min.css" rel="stylesheet" type="text/css">
<link href="/assets/admin/css/components.min.css" rel="stylesheet" type="text/css">
<link href="/assets/admin/css/colors.min.css" rel="stylesheet" type="text/css">

@if(isset($styles) && !empty($styles))
    @foreach($styles as $style)
        {!! $style !!}
    @endforeach
@endif
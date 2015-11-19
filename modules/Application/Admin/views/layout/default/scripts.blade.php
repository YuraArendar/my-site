<!-- Core JS files -->
<script type="text/javascript" src="/assets/admin/js/plugins/loaders/pace.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/core/libraries/jquery.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/core/libraries/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/loaders/blockui.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="/assets/admin/js/plugins/forms/styling/switchery.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/forms/styling/switch.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/ui/headroom/headroom.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/ui/headroom/headroom_jquery.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/ui/nicescroll.min.js"></script>

<script type="text/javascript" src="/assets/admin/js/core/app.js"></script>
<script type="text/javascript" src="/assets/admin/js/pages/layout_fixed_custom.js"></script>
<script type="text/javascript" src="/assets/admin/js/pages/layout_navbar_hideable_sidebar.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/notifications/bootbox.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/notifications/pnotify.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/notifications/sweet_alert.min.js"></script>
<!-- /theme JS files -->

<!-- custom files -->
<script type="text/javascript" src="/assets/admin/js/core/main.js"></script>
<script type="text/javascript" src="/assets/admin/js/core/layout.js"></script>
<!-- /custom files -->

@if(isset($scripts) && !empty($scripts))
    @foreach($scripts as $script)
        {!! $script !!}
    @endforeach
@endif
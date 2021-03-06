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

<!-- tree JS -->
<script type="text/javascript" src="/assets/admin/js/core/libraries/jquery_ui/effects.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/core/libraries/jquery_ui/interactions.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/extensions/cookie.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/trees/fancytree_all.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/trees/fancytree_childcounter.js"></script>
<!-- /tree JS -->
<script src="/assets/admin/js/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" ></script>

<script type="text/javascript" src="/assets/admin/js/core/libraries/jquery_ui/datepicker.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/core/libraries/jquery_ui/effects.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/notifications/jgrowl.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/ui/moment/moment.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/anytime.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/pickadate/picker.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/pickadate/picker.date.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/pickadate/picker.time.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/pickers/pickadate/legacy.js"></script>
<script type="text/javascript" src="/assets/admin/js/plugins/uploaders/fileinput.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/pages/uploader_bootstrap.js"></script>


<script type="text/javascript" src="/assets/admin/js/core/main.js"></script>
<script type="text/javascript" src="/assets/admin/js/core/layout.js"></script>
<!-- /custom files -->

@if(isset($scripts) && !empty($scripts))
    @foreach($scripts as $script)
        {!! $script !!}
    @endforeach
@endif
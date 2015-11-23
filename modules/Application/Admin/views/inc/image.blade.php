<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Image</label>
    <div class="col-lg-3 col-sm-6">
        <div class="thumbnail">
            <div class="thumb">
                <img src="/assets/admin/images/placeholder.jpg" alt="">
                <div class="caption-overflow">
                    <span>
                        <a href="/assets/admin/images/placeholder.jpg" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded image_selector"><i class="icon-plus3"></i></a>
                        <a href="#" class="btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-link2"></i></a>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>

<link href="/packages/barryvdh/elfinder/css/elfinder.min.css" rel="stylesheet">
<script type="text/javascript" src="/packages/barryvdh/elfinder/js/elfinder.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
    $('.image_selector').click(function(event){
        event.preventDefault();
        updateID = $(this).attr('data-upateimage'); // Btn id clicked

        // fire elfinder for image selection
        $('#elfinder').elfinder({
            url : '<?= URL::action('\Barryvdh\Elfinder\ElfinderController@showConnector') ?>?_token=<?= csrf_token() ?>',
            commandsOptions: {
                getfile: {
                    oncomplete: 'destroy'
                }
            },
            getFileCallback: function(url) {
                console.log(url)
//                document.getElementById(updateID).value = url.path;
//                jQuery('a.ui-dialog-titlebar-close[role="button"]').click();
            }
        }).elfinder('instance');

    });

</script>
<div id="elfinder"></div>
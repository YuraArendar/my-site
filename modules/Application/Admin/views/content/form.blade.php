<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Date start</label>
    <div class="col-lg-10">
        <div class="input-group">
            <span class="input-group-addon"><i class="icon-calendar22"></i></span>
            {!! Form::text('date_start',(!empty($content['date_start'])? date('m/d/Y',strtotime($content['date_start'])):date('m/d/Y')),['class'=>'form-control daterange-single','id'=>'date_start']) !!}
        </div>
        <div class="form-control-feedback" id="date_start-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="date_start-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Name</label>
    <div class="col-lg-10">
        {!! Form::text('name',@$content['lang']['name'],['class'=>'form-control','id'=>'name']) !!}
        <div class="form-control-feedback" id="name-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="name-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Alias</label>
    <div class="col-lg-10">
        {!! Form::text('alias',@$content['alias'],['class'=>'form-control','id'=>'alias']) !!}
        <div class="form-control-feedback" id="alias-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="alias-error"></span>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Description</label>
    <div class="col-lg-10">
        {!! Form::textarea('description',@$content['lang']['description'],['class'=>'form-control','id'=>'description']) !!}
        <div class="form-control-feedback" id="description-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="description-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Content</label>
    <div class="col-lg-10">
        {!! Form::textarea('content',@$content['lang']['content'],['class'=>'form-control','id'=>'content']) !!}
        <div class="form-control-feedback" id="description-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="description-error"></span>
    </div>
</div>
<script>
    var editor = CKEDITOR.replace( 'content',{
        filebrowserBrowseUrl : '/elfinder/ckeditor'
    } );
</script>


{!! \Application\Admin\Helpers\Main::getEditeImage('image') !!}

{!! Form::hidden('language_id',$locale) !!}
{!! Form::hidden('structure_id',$id_structure) !!}
{!! Form::hidden('_token',csrf_token()) !!}

<div class="text-right">
    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
</div>




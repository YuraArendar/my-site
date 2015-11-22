<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Name</label>
    <div class="col-lg-10">
        {!! Form::text('name',@$structure['lang']['name'],['class'=>'form-control','id'=>'name']) !!}
        <div class="form-control-feedback" id="name-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="name-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Alias</label>
    <div class="col-lg-10">
        {!! Form::text('alias',@$structure['alias'],['class'=>'form-control','id'=>'alias']) !!}
        <div class="form-control-feedback" id="alias-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="alias-error"></span>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Parent</label>
    <div class="col-lg-10">
        {!! Form::select('parent_id',$listStructures,@$structure['parent_id'],['class'=>'form-control mb-md']) !!}
    </div>
</div>


<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Controller</label>
    <div class="col-lg-10">
        {!! Form::select('controller',['list'=>'list','page'=>'page'],null,['class'=>'form-control mb-md']) !!}
    </div>
</div>

<div class="form-group">
    <label class="control-label col-lg-2 text-semibold">Name</label>
    <div class="col-lg-10">
        {!! Form::textarea('description',@$structure['lang']['description'],['class'=>'form-control','id'=>'description']) !!}
        <div class="form-control-feedback" id="description-error-icon">
            <i class="icon-cancel-circle2"></i>
        </div>
        <span class="help-block" id="description-error"></span>
    </div>
</div>

{!! Form::hidden('language_id',$locale) !!}
{!! Form::hidden('_token',csrf_token()) !!}

<div class="text-right">
    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
</div>




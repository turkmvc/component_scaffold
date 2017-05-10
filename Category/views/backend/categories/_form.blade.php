<div class="form-group">
    {!! Form::label(trans('category::form.label1'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
        {!! Form::text('title',null,['placeholder'=>trans('category::form.placeholder1'),'class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label(trans('category::form.label2'),null,['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-10">
      <div class="checkbox-list">
         <label class="checkbox-inline">
             {!! Form::hidden('active','0') !!}
             {!! Form::checkbox('active','1',!isset($category)?true:$category) !!}
         </label>
     </div>
    </div>
</div>

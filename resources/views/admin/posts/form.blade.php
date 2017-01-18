<div class="form-group {{ $errors->has('userId') ? 'has-error' : ''}}">
    {!! Form::label('userId', 'Userid', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('userId', null, ['class' => 'form-control']) !!}
        {!! $errors->first('userId', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    {!! Form::label('body', 'Body', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('review') ? 'has-error' : ''}}">
    {!! Form::label('review', 'Review', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('review', null, ['class' => 'form-control']) !!}
        {!! $errors->first('review', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('rating') ? 'has-error' : ''}}">
    {!! Form::label('rating', 'Rating', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('rating', null, ['class' => 'form-control']) !!}
        {!! $errors->first('rating', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
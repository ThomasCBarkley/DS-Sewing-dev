@php
    //$created_at = old('created_at') ?? (isset($post) ? $post->created_at->format('Y-m-d\TH:i') : null);
@endphp
<div class="row form-row">
    <div class="form-group col-md-6">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', null, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}
    
        @error('title')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('slug', 'Slug (live empty to generate from title)') !!}
        {!! Form::text('slug', null, ['class' => 'form-control' . ($errors->has('slug') ? ' is-invalid' : '')]) !!}

        @error('slug')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    {!! Form::label('meta_title', 'Meta Title') !!}
    {!! Form::text('meta_title', null, ['class' => 'form-control' . ($errors->has('meta_title') ? ' is-invalid' : ''), 'required']) !!}

    @error('meta_title')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('meta_description', 'Meta description') !!}
    {!! Form::text('meta_description', null, ['class' => 'form-control' . ($errors->has('meta_description') ? ' is-invalid' : ''), 'required']) !!}

    @error('meta_description')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('meta_keywords', 'Meta keywords') !!}
    {!! Form::text('meta_keywords', null, ['class' => 'form-control' . ($errors->has('meta_keywords') ? ' is-invalid' : ''), 'required']) !!}

    @error('meta_keywords')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group col-md-3">
    {!! Form::label('publish_at', 'Publish At') !!}
    {!! Form::date('publish_at', null, ['class' => 'form-control' . ($errors->has('publish_at') ? ' is-invalid' : ''), 'required']) !!}

    @error('meta_keywords')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('short_description', 'Short Description') !!}
    {!! Form::textarea('short_description', null, ['class' => 'form-control' . ($errors->has('short_description') ? ' is-invalid' : '')]) !!}

    @error('short_description')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

    <div class="form-group">
    {!! Form::label('body', 'Body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control trumbowyg-form' . ($errors->has('body') ? ' is-invalid' : ''), 'required']) !!}

    @error('body')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

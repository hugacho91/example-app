
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $institución->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">institución <b>nombre</b> instruction.</small>
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('ciudad') }}</label>
    <div>
        {{ Form::text('ciudad', $institución->ciudad, ['class' => 'form-control' .
        ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
        {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">institución <b>ciudad</b> instruction.</small>
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="#" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Submit</button>
            </div>
        </div>
    </div>

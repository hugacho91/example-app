
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $usuario->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">usuario <b>nombre</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('apellido') }}</label>
    <div>
        {{ Form::text('apellido', $usuario->apellido, ['class' => 'form-control' .
        ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
        {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">usuario <b>apellido</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('username') }}</label>
    <div>
        {{ Form::text('username', $usuario->username, ['class' => 'form-control' .
        ($errors->has('username') ? ' is-invalid' : ''), 'placeholder' => 'Username']) }}
        {!! $errors->first('username', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">usuario <b>username</b> instruction.</small>-->
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('usuarios.index') }}"  class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>

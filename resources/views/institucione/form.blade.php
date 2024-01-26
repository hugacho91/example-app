
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('nombre') }}</label>
    <div>
        {{ Form::text('nombre', $institucione->nombre, ['class' => 'form-control' .
        ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">institucione <b>nombre</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('ubicacion') }}</label>
    <div>
        {{ Form::text('ubicacion', $institucione->ubicacion, ['class' => 'form-control' .
        ($errors->has('ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion']) }}
        {!! $errors->first('ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">institucione <b>ubicacion</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $institucione->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">institucione <b>descripcion</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('estado', 'Estado') }}</label>
    <div>
        {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $institucione->estado, [
            'class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''),
            'placeholder' => 'Selecciona el estado',
            'selected' => $institucione->estado ?? 'Activo' // Establece 'Activo' como opción predeterminada
        ]) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>


    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('instituciones.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>

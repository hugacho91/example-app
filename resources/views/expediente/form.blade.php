
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha') }}</label>
    <div>
        <input type="date" id="fecha" name="fecha" value="{{ $expediente->fecha }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="Fecha">
        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha_cierre') }}</label>
    <div>
        <input type="date" id="fecha_cierre" name="fecha_cierre" value="{{ $expediente->fecha_cierre }}" class="form-control{{ $errors->has('fecha_cierre') ? ' is-invalid' : '' }}" placeholder="Fecha cierre">
        {!! $errors->first('fecha_cierre', '<div class="invalid-feedback">:message</div>') !!}

        <!--{{ Form::text('fecha_cierre', $expediente->fecha_cierre, ['class' => 'form-control' .
        ($errors->has('fecha_cierre') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Cierre']) }}
        {!! $errors->first('fecha_cierre', '<div class="invalid-feedback">:message</div>') !!}
        <small class="form-hint">expediente <b>fecha_cierre</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('empleador') }}</label>
    <div>
        {{ Form::text('empleador', $expediente->empleador, ['class' => 'form-control' .
        ($errors->has('empleador') ? ' is-invalid' : ''), 'placeholder' => 'Empleador']) }}
        {!! $errors->first('empleador', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('empleado') }}</label>
    <div>
        {{ Form::text('empleado', $expediente->empleado, ['class' => 'form-control' .
        ($errors->has('empleado') ? ' is-invalid' : ''), 'placeholder' => 'Empleado']) }}
        {!! $errors->first('empleado', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('cuit_empleado') }}</label>
    <div>
        {{ Form::text('cuit_empleado', $expediente->cuit_empleado, ['class' => 'form-control' .
        ($errors->has('cuit_empleado') ? ' is-invalid' : ''), 'placeholder' => 'Cuit Empleado']) }}
        {!! $errors->first('cuit_empleado', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>cuit_empleado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('dni_empleado') }}</label>
    <div>
        {{ Form::text('dni_empleado', $expediente->dni_empleado, ['class' => 'form-control' .
        ($errors->has('dni_empleado') ? ' is-invalid' : ''), 'placeholder' => 'Dni Empleado']) }}
        {!! $errors->first('dni_empleado', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>dni_empleado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estado') }}</label>
    <div>
        {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $expediente->estado, [
            'class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''),
            'placeholder' => 'Selecciona el estado',
            'selected' => $expediente->estado ?? 'Activo' // Establece 'Activo' como opción predeterminada
        ]) }}
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>estado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $expediente->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>descripcion</b> instruction.</small>-->
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('expedientes.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>

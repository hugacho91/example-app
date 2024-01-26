
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha') }}</label>
    <div>
    <input type="date" id="fecha" name="fecha" value="{{ $informeFalla->fecha }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="Fecha">
        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">informeFalla <b>fecha</b> instruction.</small-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('empleado') }}</label>
    <div>
        {{ Form::text('empleado', $informeFalla->empleado, ['class' => 'form-control' .
        ($errors->has('empleado') ? ' is-invalid' : ''), 'placeholder' => 'Empleado']) }}
        {!! $errors->first('empleado', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">informeFalla <b>empleado</b> instruction.</small-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('empleador') }}</label>
    <div>
        {{ Form::text('empleador', $informeFalla->empleador, ['class' => 'form-control' .
        ($errors->has('empleador') ? ' is-invalid' : ''), 'placeholder' => 'Empleador']) }}
        {!! $errors->first('empleador', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">informeFalla <b>empleador</b> instruction.</small-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estado') }}</label>
    <div>
        {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $informeFalla->estado, [
            'class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''),
            'placeholder' => 'Selecciona el estado',
            'selected' => $informeFalla->estado ?? 'Activo' // Establece 'Activo' como opción predeterminada
        ]) }}
        <!--<small class="form-hint">informeFalla <b>estado</b> instruction.</small-->
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('informe-fallas.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>

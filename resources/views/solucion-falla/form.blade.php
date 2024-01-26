
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('fecha') }}</label>
    <div>
    <input type="date" id="fecha" name="fecha" value="{{ $solucionFalla->fecha }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="Fecha">
        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">solucionFalla <b>fecha</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('expediente') }}</label>
    <div>
        {{ Form::text('expediente', $solucionFalla->expediente, ['class' => 'form-control' .
        ($errors->has('expediente') ? ' is-invalid' : ''), 'placeholder' => 'Expediente']) }}
        {!! $errors->first('expediente', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">solucionFalla <b>expediente</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('numero_falla') }}</label>
    <div>
        {{ Form::text('numero_falla', $solucionFalla->numero_falla, ['class' => 'form-control' .
        ($errors->has('numero_falla') ? ' is-invalid' : ''), 'placeholder' => 'Numero Falla']) }}
        {!! $errors->first('numero_falla', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">solucionFalla <b>numero_falla</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('empleador') }}</label>
    <div>
        {{ Form::text('empleador', $solucionFalla->empleador, ['class' => 'form-control' .
        ($errors->has('empleador') ? ' is-invalid' : ''), 'placeholder' => 'Empleador']) }}
        {!! $errors->first('empleador', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">solucionFalla <b>empleador</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('empleado') }}</label>
    <div>
        {{ Form::text('empleado', $solucionFalla->empleado, ['class' => 'form-control' .
        ($errors->has('empleado') ? ' is-invalid' : ''), 'placeholder' => 'Empleado']) }}
        {!! $errors->first('empleado', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">solucionFalla <b>empleado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('estado') }}</label>
    <div>
        {{ Form::select('estado', ['Activo' => 'Activo', 'Inactivo' => 'Inactivo'], $solucionFalla->estado, [
            'class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''),
            'placeholder' => 'Selecciona el estado',
            'selected' => $solucionFalla->estado ?? 'Activo' // Establece 'Activo' como opción predeterminada
        ]) }}
        <!--<small class="form-hint">solucionFalla <b>estado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('descripcion') }}</label>
    <div>
        {{ Form::text('descripcion', $solucionFalla->descripcion, ['class' => 'form-control' .
        ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">solucionFalla <b>descripcion</b> instruction.</small>-->
    </div>
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('solucion-fallas.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>

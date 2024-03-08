
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('numero_expediente') }}</label>
    <div>
        {{ Form::text('numero_expediente', $expediente->numero_expediente, ['class' => 'form-control' .
        ($errors->has('numero_expediente') ? ' is-invalid' : ''), 'placeholder' => 'Número de Expediente']) }}
        {!! $errors->first('numero_expediente', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
        <label class="form-label">Fecha de Entrada</label>
        <input type="date" id="fecha_entrada" name="fecha_entrada" value="{{ $expediente->fecha_entrada }}" class="form-control{{ $errors->has('fecha_entrada') ? ' is-invalid' : '' }}" placeholder="Fecha de inicio">
        {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}

</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('iniciador') }}</label>
    <div>
        {{ Form::text('iniciador', $expediente->iniciador, ['class' => 'form-control' .
        ($errors->has('iniciador') ? ' is-invalid' : ''), 'placeholder' => 'Iniciador']) }}
        {!! $errors->first('iniciador', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
    </div>
</div>


<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('extracto') }}</label>
    <div>
        {{ Form::text('extracto', $expediente->extracto, ['class' => 'form-control' .
        ($errors->has('extracto') ? ' is-invalid' : ''), 'placeholder' => 'Extracto']) }}
        {!! $errors->first('extracto', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('antecedentes') }}</label>
    <div>
        {{ Form::text('antecedentes', $expediente->antecedentes, ['class' => 'form-control' .
        ($errors->has('antecedentes') ? ' is-invalid' : ''), 'placeholder' => 'Antecedente']) }}
        {!! $errors->first('antecedentes', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>cuit_empleado</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('agregados') }}</label>
    <div>
        {{ Form::text('agregados', $expediente->agregados, ['class' => 'form-control' .
        ($errors->has('agregados') ? ' is-invalid' : ''), 'placeholder' => 'Agregados']) }}
        {!! $errors->first('agregados', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>dni_empleado</b> instruction.</small>-->
    </div>
</div>


<div class="form-group mb-3">
    <label class="form-label">Agregar archivos adicionales:</label>
    <input type="file" name="files[]" class="form-control{{ $errors->has('files') ? ' is-invalid' : '' }}" multiple>
    @if ($errors->has('files'))
        <div class="invalid-feedback">{{ $errors->first('files') }}</div>
    @endif
</div>

<div class="form-footer">
    <div class="text-end">
        <div class="d-flex">
            <a href="{{ route('expedientes.index') }}" class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
        </div>
    </div>
</div>

            


    

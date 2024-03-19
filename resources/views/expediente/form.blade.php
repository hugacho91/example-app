
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('numero_expediente') }} *</label>
    <div>
        {{ Form::text('numero_expediente', $expediente->numero_expediente, ['class' => 'form-control' .
        ($errors->has('numero_expediente') ? ' is-invalid' : ''), 'placeholder' => 'Número de Expediente']) }}
        {!! $errors->first('numero_expediente', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">Fecha de Entrada *</label>
    <input type="date" id="fecha_entrada" name="fecha_entrada" value="{{ $expediente->fecha_entrada ?? now()->format('Y-m-d') }}" class="form-control{{ $errors->has('fecha_entrada') ? ' is-invalid' : '' }}" placeholder="Fecha de inicio">
    {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('iniciador') }} *</label>
    <div>
        {{ Form::text('iniciador', $expediente->iniciador, ['class' => 'form-control' .
        ($errors->has('iniciador') ? ' is-invalid' : ''), 'placeholder' => 'Iniciador']) }}
        {!! $errors->first('iniciador', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('contraparte') }} *</label>
    <div>
        {{ Form::text('contraparte', $expediente->contraparte, ['class' => 'form-control' .
        ($errors->has('contraparte') ? ' is-invalid' : ''), 'placeholder' => 'contraparte']) }}
        {!! $errors->first('contraparte', '<div class="invalid-feedback">:message</div>') !!}
        <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('motivo') }} </label>
    <div>
        {{ Form::text('motivo', $expediente->motivo, ['class' => 'form-control' .
        ($errors->has('motivo') ? ' is-invalid' : ''), 'placeholder' => 'motivo']) }}
        {!! $errors->first('motivo', '<div class="invalid-feedback">:message</div>') !!}
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
    <label class="form-label">{{ Form::label('delegacion_id', 'Delegación') }}</label>
    <div>
        {{ Form::select('delegacion_id', $delegaciones, $expediente->delegacion_id, ['class' => 'form-control' . ($errors->has('delegacion_id') ? ' is-invalid' : '')]) }}
        {!! $errors->first('delegacion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>



<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('seccion_id', 'Sección') }}</label>
    <div>
        {{ Form::select('seccion_id', [0 => 'Seleccionar'] + $secciones->toArray(), $expediente->seccion_id, ['class' => 'form-control' . ($errors->has('seccion_id') ? ' is-invalid' : '')]) }}
        {!! $errors->first('seccion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('estado', 'Estado') }}</label>
    <div>
        <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
            {{-- Si el expediente existe (estás editando), selecciona el estado actual --}}
            @if($expediente->exists)
                <option value="Abierto" {{ $expediente->estado == 'Abierto' ? 'selected' : '' }}>Abierto</option>
                <option value="Finalizado" {{ $expediente->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
            {{-- Si estás creando un nuevo expediente, selecciona "Abierto" por defecto --}}
            @else
                <option value="Abierto" selected>Abierto</option>
                <option value="Finalizado">Finalizado</option>
            @endif
        </select>
        {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>


<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('user_id', 'Usuario') }}</label>
    <div>
        <select name="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}">
            {{-- Seleccionar automáticamente al usuario actual --}}
            <option value="{{ $user->id }}" selected>
                {{ $user->name }}
            </option>
        </select>
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
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

            


    

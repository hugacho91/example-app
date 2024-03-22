
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('name') }}</label>
    <div>
        {{ Form::text('name', $user->name, ['class' => 'form-control' .
        ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('email') }}</label>
    <div>
        {{ Form::text('email', $user->email, ['class' => 'form-control' .
        ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('delegacion_id', 'Delegación') }}</label>
    <div>
        {{ Form::select('delegacion_id', [0 => 'Seleccionar',] + $delegaciones->toArray(), $user->delegacion_id, ['class' => 'form-control' . ($errors->has('delegacion_id') ? ' is-invalid' : '')]) }}
        {!! $errors->first('delegacion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">{{ Form::label('seccion_id', 'Sección') }}</label>
    <div>
        {{ Form::select('seccion_id', [0 => 'Seleccionar',] + $secciones->toArray(), $user->seccion_id, ['class' => 'form-control' . ($errors->has('seccion_id') ? ' is-invalid' : '')]) }}
        {!! $errors->first('seccion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Rol') }}</label>
    
    <div id="roles-container">
        @foreach ($roles as $role)
            <div>
                {{ Form::checkbox('roles[]', $role->id, $user->hasRole($role->name), ['class' => 'mr-1 role-checkbox']) }}
                {{ $role->name }}
            </div>
        @endforeach
    </div>
    
</div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener todos los checkboxes de roles
            const roleCheckboxes = document.querySelectorAll('.role-checkbox');

            // Manejar el evento de cambio en los checkboxes
            roleCheckboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Si este checkbox se ha marcado, desmarcar los demás
                    if (this.checked) {
                        roleCheckboxes.forEach(function(otherCheckbox) {
                            if (otherCheckbox !== checkbox) {
                                otherCheckbox.checked = false;
                            }
                        });
                    }
                });
            });
        });
    </script>

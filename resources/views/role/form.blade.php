<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Nombre') }}</label>
    <div>
        {{ Form::text('name', $role->name, ['class' => 'form-control' .
        ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">   {{ Form::label('Permisos') }}</label>
    
    <div id="roles-container">
        @foreach ($permissions as $permission)
            <div>
                {{ Form::checkbox('permissions[]', $permission->id, $role->hasPermissionTo($permission), ['class' => 'mr-1 role-checkbox']) }}
                {{ $permission->description }}
            </div>
        @endforeach
    </div>
</div>


    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>
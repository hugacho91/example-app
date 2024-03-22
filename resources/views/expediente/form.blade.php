
<div class="row">
    <div class="col-md-6">
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
            <label class="form-label">   {{ Form::label('iniciador') }} *</label>
            <div>
                {{ Form::text('iniciador', $expediente->iniciador, ['class' => 'form-control' .
                ($errors->has('iniciador') ? ' is-invalid' : ''), 'placeholder' => 'Iniciador']) }}
                {!! $errors->first('iniciador', '<div class="invalid-feedback">:message</div>') !!}
                <!--<small class="form-hint">expediente <b>empleador</b> instruction.</small>-->
            </div>
        </div>
        
    <div class="form-group mb-3">
        <label class="form-label">{{ Form::label('motivo', 'Motivo') }}</label>
        <div>
            {{ Form::select('motivo', [
                'Solicitud Audiencia' => 'Solicitud Audiencia',
                'Reclamo Laboral' => 'Reclamo Laboral',
                'Presentación documental Laboral' => 'Presentación documental Laboral',
                'Presentación Certificado Médico' => 'Presentación Certificado Médico',
                'Solicitud Homologación' => 'Solicitud Homologación',
                'Otro' => 'Otro'
            ], $expediente->motivo, ['class' => 'form-control select-motivo' . ($errors->has('motivo') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un motivo']) }}
            {!! $errors->first('motivo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
        <div class="form-group mb-3">
            <label class="form-label">   {{ Form::label('numero_dictamen') }} </label>
            <div>
                {{ Form::text('numero_dictamen', $expediente->numero_dictamen, ['class' => 'form-control' .
                ($errors->has('numero_dictamen') ? ' is-invalid' : ''), 'placeholder' => 'numero dictamen']) }}
                {!! $errors->first('numero_dictamen', '<div class="invalid-feedback">:message</div>') !!}
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
        {{ Form::select('seccion_id', $seccionesArray, $expediente->seccion_id, ['class' => 'form-control' . ($errors->has('seccion_id') ? ' is-invalid' : '')]) }}
        {!! $errors->first('seccion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('pase', 'Pase') }}</label>
            <div>
                {{ Form::textarea('pase', $expediente->pase, ['class' => 'form-control' . ($errors->has('pase') ? ' is-invalid' : ''), 'placeholder' => 'Pase']) }}
                {!! $errors->first('pase', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label class="form-label">Fecha de Entrada *</label>
            <input type="date" id="fecha_entrada" name="fecha_entrada" value="{{ $expediente->fecha_entrada ?? now()->format('Y-m-d') }}" class="form-control{{ $errors->has('fecha_entrada') ? ' is-invalid' : '' }}" placeholder="Fecha de inicio">
            {!! $errors->first('fecha_entrada', '<div class="invalid-feedback">:message</div>') !!}
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
            <label class="form-label">{{ Form::label('otro', 'Otro (Motivo)') }}</label>
            <div>
                {{ Form::text('otro', $expediente->otro, ['class' => 'form-control otro' . ($errors->has('otro') ? ' is-invalid' : ''), 'placeholder' => 'otro motivo', 'disabled' => true]) }}
                {!! $errors->first('otro', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group mb-3">
            <label class="form-label">{{ Form::label('dictamen', 'Dictamen') }}</label>
            <div>
                {{ Form::textarea('dictamen', $expediente->dictamen, ['id' => 'editor', 'name' => 'dictamen', 'class' => 'form-control' . ($errors->has('dictamen') ? ' is-invalid' : ''), 'placeholder' => 'dictamen', 'rows' => '15']) }}
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
            <label class="form-label">Agregar archivos adicionales:</label>
            <input type="file" name="files[]" class="form-control{{ $errors->has('files') ? ' is-invalid' : '' }}" multiple>
            @if ($errors->has('files'))
                <div class="invalid-feedback">{{ $errors->first('files') }}</div>
            @endif
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
        

    </div>

    <div class="form-footer">
        <div class="text-end">
            <div class="d-flex">
                <a href="{{ route('expedientes.index') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary ms-auto ajax-submit">Guardar</button>
            </div>
        </div>
    </div>
</div>
    



@section('js') 
    

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/super-build/ckeditor.js"></script>
    <script>
            // This sample still does not showcase all CKEditor&nbsp;5 features (!)
            // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
            CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                toolbar: {
                    items: [
                        'exportPDF','exportWord', '|',
                        'findAndReplace', 'selectAll', '|',
                        //'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', '|',
                        //'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        //'link', 'uploadImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                        // 'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        //'textPartLanguage', '|',
                        //'sourceEditing'
                    ],
                    shouldNotGroupWhenFull: true
                },
                // Changing the language of the interface requires loading the language file using the <script> tag.
                // language: 'es',
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
                    ]
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                placeholder: 'Expediente',
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                fontFamily: {
                    options: [
                        'default',
                        'Arial, Helvetica, sans-serif',
                        'Courier New, Courier, monospace',
                        'Georgia, serif',
                        'Lucida Sans Unicode, Lucida Grande, sans-serif',
                        'Tahoma, Geneva, sans-serif',
                        'Times New Roman, Times, serif',
                        'Trebuchet MS, Helvetica, sans-serif',
                        'Verdana, Geneva, sans-serif'
                    ],
                    supportAllValues: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                fontSize: {
                    options: [ 10, 12, 14, 'default', 18, 20, 22 ],
                    supportAllValues: true
                },
                // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                htmlSupport: {
                    allow: [
                        {
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }
                    ]
                },
                // Be careful with enabling previews
                // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                htmlEmbed: {
                    showPreviews: true
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                link: {
                    decorators: {
                        addTargetToExternalLinks: true,
                        defaultProtocol: 'https://',
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Downloadable',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                mention: {
                    feeds: [
                        {
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }
                    ]
                },
                // The "superbuild" contains more premium features that require additional configuration, disable them below.
                // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                removePlugins: [
                    // These two are commercial, but you can try them out without registering to a trial.
                    // 'ExportPdf',
                    // 'ExportWord',
                    'AIAssistant',
                    'CKBox',
                    'CKFinder',
                    'EasyImage',
                    // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                    // Storing images as Base64 is usually a very bad idea.
                    // Replace it on production website with other solutions:
                    // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                    // 'Base64UploadAdapter',
                    'RealTimeCollaborativeComments',
                    'RealTimeCollaborativeTrackChanges',
                    'RealTimeCollaborativeRevisionHistory',
                    'PresenceList',
                    'Comments',
                    'TrackChanges',
                    'TrackChangesData',
                    'RevisionHistory',
                    'Pagination',
                    'WProofreader',
                    // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                    // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                    'MathType',
                    // The following features are part of the Productivity Pack and require additional license.
                    'SlashCommand',
                    'Template',
                    'DocumentOutline',
                    'FormatPainter',
                    'TableOfContents',
                    'PasteFromOfficeEnhanced',
                    'CaseChange'
                ]
            });
        </script>
        

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtener elementos del DOM
        const selectMotivo = document.querySelector('.select-motivo');
        const inputOtro = document.querySelector('.otro');
        const form = document.querySelector('form');

        // Evento submit del formulario
        form.addEventListener('submit', function (event) {
            // Verificar si el motivo es "Otro" y el campo "Otro" está vacío
            if (selectMotivo.value === 'Otro' && inputOtro.value.trim() === '') {
                // Evitar que el formulario se envíe
                event.preventDefault();
                // Mostrar un mensaje de error
                alert('Por favor, llene el campo "Otro".');
                // Hacer foco en el campo "Otro"
                inputOtro.focus();
            }
        });

        // Evento change en el select
        selectMotivo.addEventListener('change', function () {
            // Habilitar/deshabilitar el campo "Otro" dependiendo de la selección en el select
            if (this.value === 'Otro') {
                inputOtro.disabled = false;
                inputOtro.focus(); // Hacer foco en el campo "Otro"
            } else {
                inputOtro.disabled = true;
                inputOtro.value = ''; // Limpiar el contenido del campo "Otro"
            }
        });

        // Verificar si el motivo es "Otro" al cargar la página y habilitar el campo correspondiente
        if (selectMotivo.value === 'Otro') {
            inputOtro.disabled = false;
        }
    });
</script>

@stop


    

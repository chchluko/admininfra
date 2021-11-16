<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Archivos</h3>
    </div>
    <div class="card-body">
            @if ($movil->resource->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movil->resource as $resource)
                                <tr>
                                    <th><a href="{{ asset('storage/'.$resource->url) }}" target="_blanck"><i class="cursor-pointer fas fa-download"></i></a> {{ $resource->name }}</th>
                                    <td>{{ $resource->comentario }}</td>
                                    <td><i class="cursor-pointer fas fa-trash" wire:click='destroy({{ $resource->id }})'></i></td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    </div>
    <div class="card-footer">
        <form wire:submit.prevent='save'>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class'=>'form-control','wire:model'=>'name']) !!}
                        @error('name')
                        <span class="">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('comentario', 'Comentario') !!}
                        {!! Form::textarea('comentario', null, ['class'=>'form-control','rows'=> 3,'placeholder'=>'Opcional','wire:model'=>'comentario']) !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('file', 'Archivo') !!}
                        <input type="file" wire:model='file' name="file" id="file{{ $iteration }}" class="form-control">
                        <span wire:loading wire:target='file'>
                            Cargando...
                        </span>
                        @error('file')
                            <span class="">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="float-right text-sm btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

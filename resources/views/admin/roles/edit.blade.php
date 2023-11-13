@extends('layout')

@section('content')
    <h4 class="text-center">{{$rol->name}}</h4>
    {!! Form::model($rol, ['route' => ['roles.update', $rol], 'method'=>'put']) !!}
        @foreach ($permissions as $permission)
        <div>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, $rol->hasPermissionTo($permission->id), ['class'=>'mr-1']) !!}
                    {{$permission->details}}
            </label>
        </div>
        @endforeach
        {!! Form::submit('Asignar permiso', ['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection

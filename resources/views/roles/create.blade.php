@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Crear Roles</h2></div>

                <div class="card-body">
                @include('custom.message')

                   
                    <form action="{{route('role.store')}}" method="POST">
                    @csrf
                    
                        <div class="container">
                            <h3>Datos Requeridos</h3>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name')}}">
                            </div>  
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug')}}">
                            </div>  
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" placeholder="Descripción" rows="3">{{old('description')}}</textarea>
                            </div>

                            <hr>
                            <h3>Full Acceso</h3>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="fullaccessyes" name="full-access" class="custom-control-input" value="yes" 
                                @if(old('full-access') == 'yes')
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="fullaccessno" name="full-access" class="custom-control-input" value="no" 
                                @if(old('full-access') == 'no')
                                    checked
                                @endif
                                @if(old('full-access') === null)
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessno">No</label>
                            </div>
                            <hr>

                            <h3>Lista de Permisos</h3>
                            @foreach($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="permisssion_{{$permission->id}}" value="{{$permission->id}}" name="permission[]"
                                    @if( is_array(old('permission')) && in_array($permission->id, old('permission')))
                                        checked
                                    @endif
                                    >
                                    <label class="custom-control-label" for="permisssion_{{$permission->id}}">
                                        {{$permission->id}}
                                        -
                                        {{$permission->name}}
                                        <em>( {{$permission->description}} )</em>
                                    </label>
                                </div>
                            @endforeach
                            <hr>

                            <input type="submit" class="btn btn-primary" value="Guardar">
                            <a class="btn btn-danger" href="{{route('role.index')}}">Regresar</a>

                        </div>
     
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

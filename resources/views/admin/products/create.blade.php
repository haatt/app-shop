@extends('layouts.app')

@section('titlePage','Agregar producto')

@section('body-class','product-page')

@section('content')
    <div class="header header-filter" style="background-image: url({{asset('/img/products-anakel.webp')}});">
       
    </div>

    <div class="main main-raised" style="margin-top: -200px;">
        <div class="container">
            <div class="section text-center" style="padding-top: 10px;">
                

                <div class="team" style="margin-top: 0px;">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <h3 class="title">Agregar producto</h3>
                        </div>
                        <!--div class="col-md-6 text-right" style="padding-top: 20px;">
                            <a href="/admin/products/create" class="btn btn-primary btn-round">Add product</a>
                        </div-->
                    </div>

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="container-fluid text-left">
                            <!--div class="alert-icon"><i class="material-icons">error_outline</i></div-->
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">Cerrar</i></span>
                            </button>
                            <b>!Tienes {{$errors->count()}} errores!</b><br>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="row text-left">
                        <form action="{{url('/admin/products')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label for="" class="control-label">Nombre</label>
                                    <input type="text" name="name" value="{{old('name')}}" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label for="" class="control-label">Precio</label>
                                    <input type="number" name="selling_price" value="{{old('selling_price')}}" id="" step="0.01" class="form-control" pattern="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label for="" class="control-label">Descripcion</label>
                            <input type="text" name="description" value="{{old('description')}}" id="" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label for="" class="control-label">Descripción larga</label>
                            <textarea name="long_description" id="" rows="1" class="form-control"
                        placeholder="">{{old('long_description')}}</textarea>
                        </div>

                        <div class="form-group text-rigth">
                            <button class="btn btn-primary">Guardar producto</button>
                            <a href="{{url('/admin/products/')}}" class="btn btn-default">Regresar</a>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection
@extends('layouts.app')

@section('titlePage','Lista de productos')

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
                            <h2 class="title">Lista de productos</h2>
                        </div>
                        <div class="col-md-6 text-right" style="padding-top: 20px;">
                            <a href="/admin/products/create" class="btn btn-primary btn-round">Agregar producto</a>
                        </div>
                    </div>
                    
                    <div class="row">
                    {{$myProducts->links()}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="col-md-2">Nombre</th>
                                    <th class="col-md-4">Descripcion</th>
                                    <th>Categoría</th>
                                    <th class="text-right">Precio</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myProducts as $product)
                                <tr>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->category ? $product->category->name:'General'}}</td>
                                    <td class="text-right">&dollar; {{$product->selling_price}}</td>
                                    <td class="td-actions text-center">
                                        <form action="{{url('/admin/products/'.$product->id)}}" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="button" rel="tooltip" title="View Product" class="btn btn-info btn-simple btn-xs">
                                            <i class="fa fa-info"></i>
                                        </button>
                                        <a href="{{url('/admin/products/'.$product->id.'/edit')}}" type="button" rel="tooltip" title="Edit Product" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('/admin/products/'.$product->id.'/images/')}}" type="button" rel="tooltip" title="Edit image" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-image btn-warning"></i>
                                        </a>
                                        <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$myProducts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
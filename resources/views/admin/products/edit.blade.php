@extends('layouts.app')

@section('titlePage','Welcome to my store')

@section('body-class','product-page')

@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
       
    </div>

    <div class="main main-raised" style="margin-top: -200px;">
        <div class="container">
            <div class="section text-center" style="padding-top: 10px;">
                

                <div class="team" style="margin-top: 0px;">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <h3 class="title">Editing product: {{$product->name}}</h3>
                        </div>
                        <div class="col-md-6 text-right" style="padding-top: 20px;">
                            <a href="/admin/products/create" class="btn btn-primary btn-round">Add product</a>
                        </div>
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="container-fluid text-left">
                            <!--div class="alert-icon"><i class="material-icons">error_outline</i></div-->
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>!You have {{$errors->count()}} errors!</b><br>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="row text-left">
                        <form action="{{url('/admin/products/'.$product->id.'/update')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label for="" class="control-label">Name</label>
                                    <input value="{{old('name',$product->name)}}" type="text" name="name" id="" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label for="" class="control-label">Price</label>
                                    <input value="{{old('selling_price',$product->selling_price)}}" type="number" name="selling_price" id="" step="0.01" class="form-control" pattern="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                            <label for="" class="control-label">Description</label>
                            <input value="{{old('description',$product->description)}}" type="text" name="description" id="" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label for="" class="control-label">Long description</label>
                            <textarea name="long_description" id="" rows="1" class="form-control"
                        placeholder="">{{old('long_description',$product->long_description)}}</textarea>
                        </div>

                        <div class="form-group text-rigth">
                            <button class="btn btn-primary">Edit</button>
                            <a href="{{url('/admin/products/')}}" class="btn btn-default">Cancel/Back</a>
                            <!--a href="{{url('/admin/products/create')}}" class="btn btn-default">Add new</a-->
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
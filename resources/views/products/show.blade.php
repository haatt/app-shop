@extends('layouts.app')

@section('titlePage', $product->name)

@section('body-class','profile-page')

@section('content')
    <!--div class="header header-filter" style="background-image: url('{{asset('/img/examples/city.jpg')}}');"></div-->
    <div class="header header-filter" style="background-image: url('{{url($product->FeaturedImageUrl)}}');"></div>

    <div class="main main-raised">
        <div class="profile-content">
            <div class="container">
                <div class="row">
                    <div class="profile">
                        <div class="avatar">
                            <img src="{{url($product->FeaturedImageUrl)}}" alt="Circle Image" class="img-rounded img-responsive img-raised">
                        </div>
                        <div class="name">
                            <h3 class="title">{{$product->name}}</h3>
                            <h6>{{$product->description}}</h6>
                            <h6>&dollar;{{$product->selling_price}}</h6>
                        </div>
                    </div>
                </div>
                <div class="description text-center">
                    <p>{{$product->long_description}}</p>
                </div>

                @if(session('message'))
                <div class="alert alert-success">
                    <div class="container-fluid">
                        <div class="alert-icon">
                            <i class="material-icons">check</i>
                        </div>
                        <button class="close" type="button" data-dismiss="alert">
                            <i class="material-icons">clear</i>
                        </button>
                        {{session('message')}}
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="profile-tabs">
                            <div class="nav-align-center">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="active">
                                        <a href="#studio" role="tab" data-toggle="tab">
                                            <i class="material-icons">collections</i>
                                            Images
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#opinProd" role="tab" data-toggle="tab">
                                            <i class="material-icons">thumbs_up_down</i>
                                            Opinions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" role="tab" id="btnShopp"
                                            data-toggle="modal" data-target=".bd-example-modal-sm">
                                            <i class="material-icons">add_shopping_cart</i>
                                            Buy
                                        </a>
                                    </li>
                                </ul>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <div class="container-fluid text-left">
                                        <!--div class="alert-icon"><i class="material-icons">error_outline</i></div-->
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                        </button>
                                        <p>You have {{$errors->count()}}</p>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="tab-content gallery">
                                    <div class="tab-pane active" id="studio">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @foreach($images1 as $image)
                                                    <img src="{{url($image->url)}}" class="img-rounded" />
                                                @endforeach
                                            </div>
                                            <div class="col-md-6">
                                                @foreach($images2 as $image)
                                                    <img src="{{url($image->url)}}" class="img-rounded" />
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane text-center" id="opinProd">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>My opinion 1</h5>
                                                <p>My opinion 1 My opinion 1 My opinion 1 My opinion 1 My opinion 1 My opinion 1 My opinion 1 My opinion 1 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile Tabs -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal Core -->
    <!--div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"-->
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            <form action="{{url('/cart')}}" method="post">
                @csrf
                <input type="hidden" name="idProduc" value="{{$product->id}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Select the cuantity</h4>
                </div>
                <div class="modal-body">
                    <input type="number" name="producCant" id="" value="1" min="1" class="form-control text-center">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-simple">Buy</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    @include('includes.footer')
@endsection
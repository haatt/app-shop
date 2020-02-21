@extends('layouts.app')

@section('titlePage','Store | Dashboard')

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
                            <h3 class="title">Dashboard</h3>
                        </div>
                        <div class="col-md-6 text-right" style="padding-top: 20px;">
                            
                        </div>
                    </div>
                    <div class="row text-left">
                        @if (session('message'))
                            <div class="alert alert-info" role="alert">
                                <button class="close" data-dismiss="alert">
                                    <i class="material-icons">clear</i>
                                </button>
                                {{ session('message') }}
                            </div>
                        @endif

                        <ul class="nav nav-pills nav-pills-primary" role="tablist">
                            <li class="active" >
                                <a href="#shoppingCart" role="tab" data-toggle="tab">
                                    <i class="material-icons">add_shopping_cart</i>
                                    Shopping cart
                                </a>
                            </li>
                            <li>
                                <a href="#ordersTab" role="tab" data-toggle="tab">
                                    <i class="material-icons">reorder</i>
                                    Orders
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <br><br>
                <div class="row text-left">
                    Your shopping cart have 
                    {{auth()->user()->cart->cartDetail->count()}}
                     ithems.
                </div>
                <div class="tab-content gallery row">
                    <div class="tab-pane text-left active" id="shoppingCart">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Cuantity</th>
                                    <th>Sub-total</th>
                                    <th>Modify</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->cart->cartDetail as $cartDet)
                                <tr>
                                    <td><img src="{{url($cartDet->product->FeaturedImageUrl)}}"  alt="" width="50" srcset=""></td>
                                    <td>
                                        <a href="{{url('/products/'.$cartDet->product->id)}}" target="_blank">{{$cartDet->product->name}}</a>
                                    </td>
                                    <td>&dollar;{{$cartDet->product->selling_price}}</td>
                                    <td>{{$cartDet->cuantity}}</td>
                                    <td>&dollar;{{$cartDet->cuantity * $cartDet->product->selling_price}}</td>
                                    <td class="">
                                        <button type="button" rel="tooltip" title="Remove 1" class="btn btn-primary btn-simple btn-xs" style="padding-left: 0px;padding-right: 0px;"
                                        onclick="document.getElementById('formremove{{$cartDet->id}}').submit();">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Add 1" class="btn btn-primary btn-simple btn-xs" style="padding-left: 0px;padding-right: 0px;"
                                        onclick="document.getElementById('formadd{{$cartDet->id}}').submit();">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </td>
                                    <td class="">
                                        <form action="{{url('/cart')}}" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input type="hidden" name="idCart" value="{{$cartDet->id}}">
                                            <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs" style="padding-left: 0px;padding-right: 0px;">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <form action="/cart/add" id="formadd{{$cartDet->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="idCartDet" value="{{$cartDet->id}}">
                                    <input type="hidden" name="addone" value="1">
                                </form>
                                <form action="/cart/add" id="formremove{{$cartDet->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name="idCartDet" value="{{$cartDet->id}}">
                                    <input type="hidden" name="removeone" value="-1">
                                </form>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-right"><strong>Total</strong></td>
                                        <td><strong>&dollar;
                                        @php
                                            $total =0;
                                            foreach(auth()->user()->cart->cartDetail as $cartDet){
                                                $total = $total+($cartDet->cuantity*$cartDet->product->selling_price);
                                            }
                                            echo $total;
                                        @endphp
                                        </strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row text-right">
                            <div class="col-sm-12">
                                <form action="{{url('/cart/order')}}" method="post">
                                    @csrf

                                    <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="material-icons">done</i>
                                        purchase
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="ordersTab">
                        <p>text test</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection

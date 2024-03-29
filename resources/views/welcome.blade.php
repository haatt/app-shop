@extends('layouts.app')

@section('titlePage','Bienvenido a mi tienda')

@section('styles')
    <style>
        .team .row .col-md-4{
            margin-bottom: 3em;
        }

        .team .row{
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        }
        /*
        .row > [class*='col-']{
            display: flex;
            flex-direction: column;
        }*/
    </style>
@endsection

@section('body-class','landing-page')

@section('content')
    <!--div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"-->
    <div class="header header-filter" style="background-image: url('https://s3-us-west-2.amazonaws.com/wp-mpro-blog/wp-content/uploads/2018/10/26105753/Retail-de-supermercado.png');">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Rafael Rivera</h1>
                    <!--h4>My first store page.</h4>
                    <br />
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                        <i class="fa fa-play"></i> Watch video
                    </a-->
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">
        <div class="container">
            <!--div class="section text-center section-landing">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="title">Let's talk product</h2>
                        <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
                    </div>
                </div>

                <div class="features">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-primary">
                                    <i class="material-icons">chat</i>
                                </div>
                                <h4 class="info-title">First Feature</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-success">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <h4 class="info-title">Second Feature</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-danger">
                                    <i class="material-icons">fingerprint</i>
                                </div>
                                <h4 class="info-title">Third Feature</h4>
                                <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div-->

            <div class="section text-center">
                <h2 class="title">Productos</h2>

                <div class="team">
                    {{$products->links()}}
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4">
                            
                            <div class=" team-player">
                                <a href="{{url('/products/'.$product->id)}}">
                                <img src="{{ $product->FeaturedImageUrl }}" alt="Thumbnail Image" class="img-raised img-rounded" style="margin-top: 20px;">
                                <h4 class="title" style="margin-bottom: 10px;margin-top: 20px;">
                                    {{$product->name}} <br />
                                    <small class="text-muted">{{$product->category ? $product->category->name:'General'}}</small>
                                </h4>
                                <p class="description">{{$product->description}}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{$products->links()}}
                </div>
            </div>

            <div class="section landing-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 class="text-center title">Work with us</h2>
                        <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                        <form class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Your Name</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Your Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group label-floating">
                                <label class="control-label">Your Messge</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 text-center">
                                    <button class="btn btn-primary btn-raised">
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    @include('includes.footer')
@endsection
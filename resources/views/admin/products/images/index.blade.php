@extends('layouts.app')

@section('titlePage','Product Images')

@section('body-class','product-page')

@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        
    </div>

    <div class="main main-raised" style="margin-top: -200px;">
        <div class="container">
            <div class="section text-center" style="padding-top: 10px;">
                

                <div class="team" style="margin-top: 0px;">
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <h3 class="title"><strong>Product: </strong>{{$myProducts->name}}</h3>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-3">
                                <input type="file" name="image" id="" class="custom-file-input" style="margin-top: 10px;" 
                                placeholder="Add new image" required>
                            </div>
                            <div class="col-sm-1"><button type="submit" class="btn btn-primary btn-xs">Save</button></div>
                        </form>
                        <div class="col-md-4 text-right" style="padding-top: 20px;">
                            <a href="/admin/products" class="btn btn-default btn-round">Back</a>
                        </div>
                    </div>
                    <div class="row text-left">
                        <div class="col-sm-12">
                            
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($images as $image)
                            <div class="col-sm-4">
                                <div class="panel panel-default team-player">
                                    <div class="panel-body" style="padding-bottom: 0px;">
                                        <img src="{{$image->url}}" alt="Thumbnail Image" class="img-raised img-rounded">
                                        <!--img src="" alt="" class="img-rounded img-raised" width="250" height="250"-->
                                        <hr style="margin-bottom: 0px;margin-top: 0px;">
                                        <form action="" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input type="hidden" name="imgId" value="{{$image->id}}">
                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                            @if($image->featured == true)
                                                <button type="button" class="btn btn-success  btn-xs" rel="tooltip" title="Featured image">
                                                    <i class="material-icons">favorite</i>
                                                </button>
                                            @else
                                                <a href="{{'/admin/products/'.$myProducts->id.'/images/select/'.$image->id}}" class="btn btn-primary  btn-xs"
                                                    onclick="event.preventDefault();
                                                            document.getElementById('forFeat{{$image->id}}').submit();
                                                            "
                                                >
                                                    <i class="material-icons">favorite</i>
                                                </a>
                                            @endif
                                        </form>
                                        <form id="forFeat{{$image->id}}" action="{{'/admin/products/'.$myProducts->id.'/images/select/'.$image->id}}" method="post" style="display:none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.footer')
@endsection
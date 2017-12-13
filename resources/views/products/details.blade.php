@extends('layouts.app')

@section('content')
<div class="content details">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" OnClick="javascript:window.print()" class="pull-right printIcon" title="Imprimer"><i class="fa fa-print fa-2x"></i></a>
                            <div class="product-title">
                                <h4>{{$product->name}}
                                    <a href="{{ url('products/'.$product->id.'/edit') }}" data-toggle="tooltip" data-placement="bottom" title="Edit" class="editIcon">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </a>
                                </h4> 
                                
                                <p>ID : {{$product->id}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-5 details">
                            <span class="detail-title"> Details </span>
                            <div class="detail-hr">
                                <span class="delimeter"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="item">
                                        <span> Description : </span>
                                        {{ $product->description }}
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="item">
                                        <span> Price : </span>
                                        {{$product->price}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="item">
                                        <span> Quantity : </span>
                                        {{ $product->qte }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-7 images">
                            @if ($product->image)
                                <div class="fotorama text-center" data-nav="thumbs" data-allowfullscreen="native" data-maxwidth="370">
                                    <img src=" {{asset('storage/'.$product->image)}} " class="img-responsive" alt="">
                                </div>
                            @else
                                <img src="{{ asset('images/default-no-image.png') }}" class="img-circle" alt="img prod">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

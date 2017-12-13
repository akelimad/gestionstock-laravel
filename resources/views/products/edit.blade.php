@extends('layouts.app')

@section('content')
<div class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="card">
                        <form class="form-horizontal content" role="form" method="POST" action="{{ url('products') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="content">
                                <h4 class="title text-center"> Edit product </h4>
                                <div class="row">
                                    <div class="col-md-6 form-group @if($errors->get('name')) has-error @endif">
                                        <label for="titre" class="col-md-3 control-label"> Name </label>
                                        <div class="col-md-9">
                                            <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Name"  autofocus>
                                            @if(count($errors->get("name")))
                                                <ul class="list-unstyled">
                                                    @foreach($errors->get("name") as $error)
                                                        <li>
                                                            <span class="help-block">{{$error}}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group @if($errors->get('description')) has-error @endif">
                                        <label for="description" class="col-md-3 control-label">Description</label>

                                        <div class="col-md-9">
                                            <textarea id="description" name="description" class="form-control" placeholder="presentation">{{$product->description}}</textarea>
                                            @if(count($errors->get("description")))
                                                <ul class="list-unstyled">
                                                    @foreach($errors->get("description") as $error)
                                                        <li> 
                                                            <span class="help-block">{{$error}}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group @if($errors->get('price')) has-error @endif">
                                        <label for="titre" class="col-md-3 control-label"> Price </label>
                                        <div class="col-md-9">
                                            <input id="price" type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Price"  autofocus>
                                            @if(count($errors->get("price")))
                                                <ul class="list-unstyled">
                                                    @foreach($errors->get("price") as $error)
                                                        <li>
                                                            <span class="help-block">{{$error}}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group @if($errors->get('qte')) has-error @endif">
                                        <label for="titre" class="col-md-3 control-label"> Quantity </label>
                                        <div class="col-md-9">
                                            <input id="qte" type="text" class="form-control" name="qte" value="{{$product->qte}}" placeholder="Quantity"  autofocus>
                                            @if(count($errors->get("qte")))
                                                <ul class="list-unstyled">
                                                    @foreach($errors->get("qte") as $error)
                                                        <li>
                                                            <span class="help-block">{{$error}}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="image" class="col-md-3 control-label">Image</label>
                                        <div class="col-md-9">
                                            <input type="file" name="image" class="form-control" id="image">
                                            @if($product->image)
                                                <div class="media">
                                                    <a class="remove-img-link btn btn-simple btn-danger btn-icon btn-fill pull-right" title="Remove this image">X</a>
                                                    <img src="{{ asset('storage/'.$product->image) }}" alt="image" width="60" class="img-responsive inline-block" title="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Edit product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

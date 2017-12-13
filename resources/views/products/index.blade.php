@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4> {{session()->get('success')}} </h4>
                    </div>
                @endif
                <div class="card content panel panel-default">
                    
                    <div class="panel-heading">
                        <span class="title"><i class="fa fa-list"></i> {{ trans('messages.product_list') }} </span>
                        <a href="{{url('products/create')}}" class="pull-right btn btn-success">New Product </a>
                    </div>
                    <div class="panel-body">
                        @if(count($products) > 0)
                            <div class="row">
                                    <table id="datatables" class="table table-striped table-no-bordered table-hover products-table" style="width:100%;cellspacing:0">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th class="disabled-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <th scope="row">{{$product->id}}</th>
                                                    <td>{{$product->name}}</td>
                                                    <td>
                                                        <img src=" {{ asset('storage/'.$product->image) }} " width="60" height="60" class="img-responsive">
                                                    </td>
                                                    <td>{{$product->description}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->qte}}</td>
                                                    <td>
                                                        {{ csrf_field() }}
                                                        <a href="{{url('products/'.$product->id.'/details')}}" class="btn btn-simple btn-default btn-icon btn-fill edit" role="button"><i class="ti-eye"></i></a> 

                                                        <a href=" {{url('products/'.$product->id.'/edit')}} " class="btn btn-simple btn-warning btn-icon btn-fill edit" role="button"><i class="ti-pencil-alt"></i></a>

                                                        <button type="submit" data-id='{{$product->id}}' class="btn btn-simple btn-danger btn-icon btn-fill delete-product" ><i class="ti-close"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        @else
                            <p>No products found</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

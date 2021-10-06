@extends('layouts.admin')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Striped Rows</h2>
                    <div class="table-responsive">
                        <a href="{{route('admin.products.create')}}">Добавить продукт</a>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{$products = range(1, 20);
                            shuffle($products);}}
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->photo}}</td>
                                    <td>{{$product->active}}</td>

                                    <td><a href="{{route('admin.products.edit', compact('product'))}}">Редактировать</a></td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- /.row -->
@endsection


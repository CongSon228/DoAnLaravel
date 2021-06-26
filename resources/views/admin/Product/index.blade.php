@extends('admin.layouts')

@section('content')
@if(Session::has('message'))
<h4>{{ Session::get('message') }}</h4>
@endif
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>List Product</h3>
                <a href="{{ route('product.create') }}">
                    <button class="btn btn-success" style="float:right;">Add</button>
                </a>
            </header>

            <div class="panel-body">
                <div class="position-center">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>

                                <th>TT</th>
                                <th>proName</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Content</th>
                                <th>Type_ID</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proList as $pro)
                            <tr>
                                <td>#</td>
                                <td>{{$pro->proName}}</td>
                                <td>{{$pro->price}}</td>
                                <td>{{$pro->image}}</td>
                                <td style="white-space: pre-wrap;overflow: hidden;text-overflow: ellipsis;-webkit-line-clamp: 5;-webkit-box-orient: vertical;display: -webkit-box;height: 90px;">{{$pro->content}}</td>
                                <td>{{$pro->type_id}}</td>
                                <td>
                                    <form action="{{ route('product.destroy', $pro->id) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('product.edit', $pro->id) }}">
                                        <button class="btn btn-success">Edit</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>
        </section>

    </div>

    </section>

</div>
</div>
@endsection
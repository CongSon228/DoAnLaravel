@extends('admin.layouts')

@section('content')
@if(Session::has('message'))
    <h4>{{ Session::get('message') }}</h4>
@endif
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>List Type</h3>
                            <a href="{{ route('type.create') }}" >
                                <button class="btn btn-success" style="float:right;">Add</button>
                            </a>
                        </header>
                        
                        <div class="panel-body">
                            <div class="position-center">
                                    <table class="table table-bordered" id="table1">
                                        <thead>
                                        <tr>
                                            
                                            <th>TT</th>
                                            <th>typeName</th>
                                            <th>show</th>
                                            <th>Category_ID</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($typeList as $type)
                                        <tr>
                                            <td>#</td>
                                            <td>{{$type->typeName}}</td>   
                                            <td>{{$type->show}}</td>
                                            <td>{{$type->category_id}}</td>
                                            <td>
                                            <form action="{{ route('type.destroy', $type->id) }}" method="post">
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>
                                            </td>
                                            <td>
                                            <a href="{{ route('type.edit', $type->id) }}" >
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
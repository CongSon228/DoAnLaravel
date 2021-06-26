@extends('admin.layouts')

@section('content')
@if(Session::has('message'))
<h4>{{ Session::get('message') }}</h4>
@endif
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                List Category
                <a href="{{ route('category.create') }}">
                    <button class="btn btn-success" style="float:right;">Add</button>
                </a>
            </header>

            <div class="panel-body">
                <div class="position-center">
                    <table id="table1" class="table table-bordered">
                        <thead>
                            <tr>

                                <th>TT</th>
                                <th>catName</th>
                                <th>show</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($catList as $cat)
                            <tr>
                                <td>#</td>
                                <td>{{$cat->catName}}</td>
                                <td>{{$cat->show}}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $cat->id) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit', $cat->id) }}">
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
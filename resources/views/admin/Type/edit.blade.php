@extends('admin.layouts')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Edit Type</h3>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('type.update', $data->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                        <div class="form-group">                                 
                                            <label for="exampleInputEmail1">Nhập typeName</label>
                                                <input type="text" name="type_name" class="form-control" id="exampleInputEmail1" value="{{ $data->typeName }}">
                                            <label for="exampleInputEmail1">Show</label>
                                            <select class="form-control fh5co_text_select_option" name="show"
                                            id="exampleInputEmail1">
                                                <option>{{$data->show}}</option>
                                                @if($data->show==0)
                                                <option>1</option>
                                                @else
                                                <option>0</option>
                                                @endif
                                            </select>
                                            <label for="exampleInputEmail1">Category_ID</label>
                                            <select class="form-control fh5co_text_select_option" name="category_id"
                                                id="exampleInputEmail1">
                                                    <option>{{$data->category_id}}</option>
                                                @foreach($CategoryID as $key)
                                                    @if($key->id!=$data->category_id)
                                                    <option> {{$key->id}} </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                    <button type="submit" name="" class="btn btn-info">Update</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
           
                </section>

            </div>
        </div>
@endsection
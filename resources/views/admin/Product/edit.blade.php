@extends('admin.layouts')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Edit Product</h3>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('product.update', $data->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('PUT') }}
                                        <div class="form-group">                                 
                                        <label for="exampleInputEmail1">Nhập proName</label>
                                        <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" value="{{ $data->proName }}">

                                        <label for="exampleInputEmail1">Nhập Price</label>
                                        <input type="text" name="price" class="form-control" id="exampleInputEmail1" value="{{ $data->price }}">

                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="text" name="image" class="form-control" id="exampleInputEmail1" value="{{ $data->image }}">

                                        <label for="exampleInputEmail1">Content</label>
                                        <textarea type="text" name="content" class="form-control" id="exampleInputEmail1" rows="7">{{ $data->content }}</textarea>

                                        <label for="exampleInputEmail1">Type_ID</label>
                                        <select class="form-control fh5co_text_select_option" name="type_ID"
                                                id="exampleInputEmail1">
                                            <option> {{ $data->type_id }} </option>
                                            @foreach($typeID as $key)
                                                @if($key->id!=$data->type_id)
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
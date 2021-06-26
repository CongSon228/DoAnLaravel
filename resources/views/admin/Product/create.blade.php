@extends('admin.layouts')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Add Product</h3>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('product.store') }}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    
                                    <label for="exampleInputEmail1">Nhập proName</label>
                                    <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                    <label for="exampleInputEmail1">Nhập Price</label>
                                    <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="text" name="image" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                    <label for="exampleInputEmail1">Content</label>
                                    <input type="text" name="content" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                    <label for="exampleInputEmail1">Type_ID</label>
                                    <select class="form-control fh5co_text_select_option" name="type_ID"
                                            id="exampleInputEmail1">
                                        <option> --Chọn-- </option>
                                        @foreach($typeID as $key)
                                            <option> {{$key->id}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" name="" class="btn btn-info">Add</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
                </section>

            </div>
        </div>
@endsection
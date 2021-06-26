@extends('admin.layouts')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Add Type</h3>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('type.store') }}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    
                                    <label for="exampleInputEmail1">Nhập typeName</label>
                                    <input type="text" name="type_name" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                    <label for="exampleInputEmail1">Show</label>
                                    <select class="form-control fh5co_text_select_option" name="show"
                                            id="exampleInputEmail1">
                                        <option> --Chọn-- </option>
                                        <option> 0 </option>
                                        <option> 1 </option>
                                    </select>
                                    <label for="exampleInputEmail1">Category_ID</label>
                                    <select class="form-control fh5co_text_select_option" name="category_id"
                                            id="exampleInputEmail1">
                                        <option> --Chọn-- </option>
                                        @foreach($CategoryID as $key)
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
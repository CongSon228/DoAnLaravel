@extends('admin.layouts')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Add Category</h3>
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('category.store') }}" id="myTable" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    
                                    <label for="exampleInputEmail1">Nhập CatName</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Vui lòng nhập...">
                                    <label for="exampleInputEmail1">Show</label>
                                    <select class="form-control fh5co_text_select_option" name="show"
                                    id="exampleInputEmail1">
                                        <option> --Chọn-- </option>
                                        <option>0 </option>
                                        <option>1 </option>
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
@extends('admin.layouts')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Edit Category</h3>
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('category.update', $data->id) }}" method="post">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nhập CatName</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1"
                                value="{{ $data->catName }}">
                            <label for="exampleInputEmail1">Show</label>
                            <select class="form-control fh5co_text_select_option" name="show" id="exampleInputEmail1">
                                <option>{{$data->show}}</option>
                                @if($data->show==0)
                                <option>1</option>
                                @else
                                <option>0</option>
                                @endif
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
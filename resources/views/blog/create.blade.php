@extends('master')

@section('title')
    <title>Blog Create</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Blog Create</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">
            Blog Create
        </h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form BlogPage</h4>
                    </div>
                    @if(Session::get('failed'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
                            <strong> {{ Session::get('failed') }} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('blogpost.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title"  placeholder="Title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="editor" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category" class="form-control">
                                    <option>-Select-</option>
                                    @foreach ($category as $ct)

                                        <option value="{{$ct->id}}">{{$ct->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control" onchange="loadPhoto(event)">
                            </div>
                            <div class="form-group">
                                <img id="photo" width="100" height="100">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function loadPhoto(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('photo');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection

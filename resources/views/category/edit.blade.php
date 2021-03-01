@extends('master')

@section('title')
    <title>Halaman Edit</title>
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Halaman Edit</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Category</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('category.update', $category->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Category Name</label>

                                    <input type="text" value="{{$category->name}}" name="category_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

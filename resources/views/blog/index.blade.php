@extends('master')

@section('title')
    <title>Halaman Blog</title>
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Blog Page</h1>
    </div>
    <div class="section-body">
        <h2 class="section-title">
            Blog Page
        </h2>
        <div class="row">
          @if(Session::get('success'))
              <div class="alert alert-success alert-dismissiblefade show" role="alert" id="gone">
                  <strong> {{ Session::get('success') }} </strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('blogpost.create')}}" class="btn btn-lg btn-success">Add</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Title Blog</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Images</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogpost as $bp)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $bp->title }}</td>
                                            <td>{{ $bp->category->name }}</td>
                                            <td>{{ $bp->description }}</td>

                                            <td>
                                              @if(!empty($bp->featured_image_url))
                                                <img src="{{ asset($bp->featured_image_url) }}" width="100" height="100">
                                                @else
                                                <img src="https://via.placeholder.com/50x50">
                                              @endif
                                            </td>
                                            <td> <a href="{{ route('blogpost.edit', $bp->id) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                                                <form action="{{route('blogpost.destroy', $bp->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak Ada Data</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

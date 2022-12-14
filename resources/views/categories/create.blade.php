@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body p-4">
                    <h2>New Category</h2>
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @include('partials.message')
                        @csrf
                        <img src="{{ Storage::url('public/t8mgpoJ8MUjV607FYc6NeMr4nh3fExN4Jx75HCm9.jpg')}}" alt="">
                        <input type="text" name="name" placeholder="Category Name" class="form-control"
                            value="{{ old('name') }}">
                        <div class="row mt-2">
                            <div class="col-sm-6">
                                Category Image
                            </div>
                            <div class="col-sm-6">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">
                            Save
                        </button>
                    </form>
                </div>

            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Image</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ Storage::url($category->image) }}" alt="" width="100">
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection

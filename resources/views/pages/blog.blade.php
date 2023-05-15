@extends('layout.default')
@section('content')
    <div class="card mb-3" style="max-width: 55rem; ">
        <div class="row">
            <div class="col-md-12 d-flex">
                <img src={{ $data->image }} class="img-fluid rounded-start" alt="img">
            </div>
        </div>
        <div class="row ">

            <div class="col-md-12">
                <div class="card-body d-flex flex flex-column">
                    <h5 class="card-title">{{ $data->title }}</h5>
                    <p class="card-text d-flex justify-content-between">
                        <small class="text-body-secondary">created at : {{ $data->created_at }}</small>
                        <small class="text-body-secondary"> {{ 'updated ' . $data->created_at_difference() }}</small>
                    </p>
                    <p class="card-text">{{ $data->description }}</p>
                    <a class="align-self-start btn btn-info text-white" href="{{ route('blog.index') }}">back</a>

                </div>
            </div>
        </div>
    </div>
@endsection

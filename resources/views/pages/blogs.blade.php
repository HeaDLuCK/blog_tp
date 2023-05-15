@extends('layout.default')
@section('content')

    <div class="d-flex flex flex-column gap-5">
        @if (session()->has('login_succ'))
            <div class="d-flex flex flex-column gap-3">
                <h1>{{ session('login_succ') }}</h1>
            </div>
        @endif
        @forelse($data as $row)
            <div class="card mb-3" style="max-width: 55rem; ">
                <div class="row g-0">
                    <div class="col-md-4 d-flex">
                        <img src={{ $row->image }} class="img-fluid rounded-start" alt="img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body d-flex flex flex-column">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">{{ $row->title }}</h5>
                                @if (auth()->user() != null && auth()->user()->role == 'admin')
                                    <strong style="min-width: fit-content;">status :
                                        @if ($row->active)
                                            <small class="text-success">visible</small>
                                        @else
                                            <small class="text-danger">hidden</small>
                                        @endif
                                    </strong>
                                @endif
                            </div>
                            <p class="card-text d-flex justify-content-between">
                                <small class="text-body-secondary">created at : {{ $row->created_at }}</small>
                                <small class="text-body-secondary">{{ 'updated ' . $row->created_at_difference() }}</small>
                            </p>

                            <p class="card-text">{{ $row->clause }}</p>

                            <div class="d-flex justify-content-between px-3">
                                <a class="align-self-end btn btn-info text-white"
                                    href="{{ route('blog.show', ['blog' => $row->id]) }}">read
                                    more</a>

                                @if (auth()->user() != null && auth()->user()->role == 'admin')
                                    <a class="align-self-end btn btn-warning text-white"
                                        href="{{ route('blog.edit', ['blog' => $row->id]) }}">update</a>
                                    <form action="{{ route('blog.destroy', ['blog' => $row->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="align-self-end btn btn-danger text-white">delete</button>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="d-flex flex flex-column gap-3">
                <h2>there's no data</h2>
                @if (auth()->user() != null && auth()->user()->role == 'admin')
                    <a href="{{ route('blog.create') }}" class="btn btn-info text-light">CREATE BLOG</a>
                @endif
            </div>
    </div>
    @endforelse

@endsection

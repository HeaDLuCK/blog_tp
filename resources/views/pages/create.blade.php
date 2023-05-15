@extends('layout.default')
@section('content')
    <form action="{{ route('blog.store') }}" method="POST" style="width: 55rem;">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                placeholder="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">image</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}"
                placeholder="image(url)">
        </div>
        <div class="mb-3 d-flex gap-5">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="active" id="active1" value="1">
                <label class="form-check-label" for="active1">
                    Active
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="active" id="active2" value="0">
                <label class="form-check-label" for="active2">
                    Inactive
                </label>
            </div>
        </div>
        @if ($errors->any())
            <ul class="text-danger rounded px-5 py-2" style="background-color: #e9b6b6">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <a href="#" class="btn btn-secondary">RETOUR</a>
            <button type="submit" class="btn btn-success">SAVE</button>
        </div>
    </form>
@endsection

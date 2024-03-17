@extends('tutunium::layouts.app')

@section('title', 'Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Edit</h1>
            <form action="{{ route($repository->getRouteUpdate(), $model->id) }}" method="POST">
                @csrf
                @method('PUT')

                @foreach($repository->getModelFields() as $fieldName => $field)
                    <div class="form-group">
                        <label for="{{$field}}">{{$fieldName}} :</label>
                        <input type="text" name="{{$field}}" id="{{$field}}" class="form-control" value="{{ $model->{$field} }}">
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route($repository->getRouteIndex()) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection

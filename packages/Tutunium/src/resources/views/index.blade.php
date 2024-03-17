@extends('tutunium::layouts.app')

@section('title', 'Models')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Models</h1>
            <div class="mb-3">
                <a href="{{ route($repository->getRouteCreate()) }}" class="btn btn-primary">Create</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        @foreach($repository->getModelFields() as $fieldName => $field)
                            <th>{{$fieldName}}</th>
                        @endforeach
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                    <tr>
                        @foreach($repository->getModelFields() as $fieldName => $field)
                            <td>{{ $model->{$field} }}</td>
                        @endforeach
                        <td>
                            <a href="{{ route($repository->getRouteShow(), $model->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route($repository->getRouteEdit(), $model->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route($repository->getRouteDestroy(), $model->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

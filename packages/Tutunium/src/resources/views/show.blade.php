@extends('tutunium::layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Details</div>

                    <div class="card-body">
                        @foreach($repository->getModelFields() as $fieldName => $field)
                            <p><strong>{{$fieldName}} :</strong> {{ $model->{$field} }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<form method="POST" action="{{ route($repository->getRouteStore()) }}">
    @csrf

    @foreach($repository->getModelFields() as $fieldName => $field)
        <div>
            <label for="{{$field}}">{{$fieldName}} :</label>
            <input type="text" name="{{$field}}" id="{{$field}}" value="{{ old($field) }}">
        </div>
    @endforeach

    <button type="submit">Create</button>
</form>

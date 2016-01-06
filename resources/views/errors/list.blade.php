@if (count($errors))
    <div style="color: red;">
        <h2>Something went wrong!</h2>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
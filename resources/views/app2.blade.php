@foreach ($novels as $novel)
    <ul>
        <li> {{ $novel->novel_id }} </li>
        <li> {{ $novel->information }} </li>
        <li> {{ $novel->sentence }} </li>
        <li> {{ $novel->type }} </li>
    </ul>
@endforeach

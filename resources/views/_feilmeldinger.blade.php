@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Huff da!</strong> Pur var ikke helt fornøyd med det du la inn:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('app')
@section('content')
    <div class="container">
        <h1>Opprett oppgave</h1>
        {!! Form::open(['url' => 'oppgave']) !!}
        @include('purmoduler.regnskap.bilagssekvenser.inngaaende-faktura.form')
        {!! Form::close() !!}

        </form>

    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        var id= 1;
        $('#ny-inngaende-faktura-post').click(function(){
            id += 1;
            //$('#ny-inngaende-faktura-post').before('<div class="row list-group-item"><div class="col-md-5"><h4>Postering ' + id + '</h4></div> <div class="form-group col-md-3"> <select class="form-control"> <option>2343 Konto 1</option> <option>4324 Konto 2</option> <option>1284 Konto 3</option> </select> </div> <div class="form-group col-md-3"><select class="form-control"> <option>Formel 1</option> <option>Formel 2</option> <option>Formel 3</option> </select> </div> <div class="form-group col-md-1"> <a id="' + id + '" class="btn btn-danger slett-inngaende-faktura-post">Slett</a></div></div>');
            addPostering("#ny-inngaende-faktura-post");
        });
        $('#ny-inngaende-kreditnota-post').click(function(){
            id += 1;
            $('#ny-inngaende-kreditnota-post').before('<div class="row list-group-item"><div class="col-md-5"><h4>Postering ' + id + '</h4></div> <div class="form-group col-md-3"> <select class="form-control"> <option>2343 Konto 1</option> <option>4324 Konto 2</option> <option>1284 Konto 3</option> </select> </div> <div class="form-group col-md-3"><select class="form-control"> <option>Formel 1</option> <option>Formel 2</option> <option>Formel 3</option> </select> </div> <div class="form-group col-md-1"> <a id="' + id + '" class="btn btn-danger slett-inngaende-faktura-post">Slett</a></div></div>');
        });
        $('#ny-utbetaling-post').click(function(){
            id += 1;
            $('#ny-utbetaling-post').before('<div class="row list-group-item"><div class="col-md-5"><h4>Postering ' + id + '</h4></div> <div class="form-group col-md-3"> <select class="form-control"> <option>2343 Konto 1</option> <option>4324 Konto 2</option> <option>1284 Konto 3</option> </select> </div> <div class="form-group col-md-3"><select class="form-control"> <option>Formel 1</option> <option>Formel 2</option> <option>Formel 3</option> </select> </div> <div class="form-group col-md-1"> <a id="' + id + '" class="btn btn-danger slett-inngaende-faktura-post">Slett</a></div></div>');
        });

        function addPostering(id){
            var content = "";
           // content = content.load("postering.php");
            $(id).before(content);
        }


        $('.slett-inngaende-faktura-post').click(function(event){
            $(event.target).closest('.list-group-item').remove();
        });
        $('.slett-inngaende-kreditnota-post').click(function(event){
            $(event.target).closest('.list-group-item').remove();
        });
        $('.slett-utbetaling-post').click(function(event){
            $(event.target).closest('.list-group-item').remove();
        });

    </script>

@endsection
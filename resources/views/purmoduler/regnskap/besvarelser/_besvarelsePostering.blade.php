<div class="postering list-group">
    @foreach($bilag->elevposteringer as $postering)
        {!! Form::model($postering, ['route' => ['posteringsmaler.update', $postering->id], 'method' => 'PATCH', 'submit-async' => 'on-form-focusout']) !!}
        <div class="row list-group-item">
            <div class="col-md-11">
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="input-group pur-dropdown">
                            <div class="input-group-addon">Konto:</div>


                           {!!Form::select('kontokode', $selectKontoer, $postering->kontokode, ['class' => 'form-control kontoliste', 'id' => 'kontokode-' . $postering->id]) !!}

                            <div class="input-group-addon"><span class="fa fa-caret-down"></span></div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group pur-dropdown">
                            <div class="input-group-addon">Beløp =</div>

                           {!! Form::input('number',  $postering->belop, $postering->belop,['id' => 'formel-' . $postering->id, 'class' => 'form-control formelliste']) !!}
                           <div class="input-group-addon">
                               <span class="fa fa-caret-down"></span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="form-group col-md-1">
               <div class="btn-group pull-right">
                   <a class="btn btn-default slett-postering" data-toggle="tooltip" data-placement="top" data-container="body" title="Slett postering">
                       <span class="fa fa-trash-o"></span>
                   </a>
               </div>
               {{-- TODO Slett postering i DB --}}
            </div>
        </div>
    {!! Form::close() !!}
    @endforeach

    <div class="list-group-item list-group-item-info ">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right">
                    <a class="btn btn-default" data-toggle="tooltip" data-placement="top" data-container="body" title="Legg til postering">
                        <span class="fa fa-plus"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
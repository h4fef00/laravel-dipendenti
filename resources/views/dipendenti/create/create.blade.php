@extends('layout')
@section('content')
    <form id="create_dipendente" method="POST" enctype="multipart/form-data" action="{{ route('dipendente.store') }}">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 form-group">
                <label for="name">Nome <span class="text-red"></span></label>
                <input id="name" type="text" name="name" class="form-control" placeholder="Inserisci nome"
                    oninput="hideErrorMsg(this)" value="{{ isset($dipendente) ? $dipendente->name : '' }}">
                <span class="text-danger error-text name_err"></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-group ">
                <label for="surname">Cognome</label>
                <input id="surname" type="text" name="surname" class="form-control" placeholder="Inserisci cognome"
                    value="{{ isset($dipendente) ? $dipendente->surname : '' }}" oninput="hideErrorMsg(this)">
                <span class="text-danger error-text surname_err"></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-group">
                <label for="email">Email</label>
                <input id="email" type="text" name="email" class="form-control" placeholder="Inserisci email"
                    oninput="hideErrorMsg(this)" value="{{ isset($dipendente) ? $dipendente->email : '' }}">
                <span class="text-danger error-text email_err"></span>
            </div>
            <input type="hidden" name="id" value="{{ $dipendente->id ?? '' }}">
            {{-- input hidden per modifica del form --}}
        </div>

    </form>
    <div class="row py-3" id="action_button">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
            <input type="button" value="SALVA" class="btn btn-success" onclick="salva_dipendente()" />
        </div>
    </div>
@endsection

{{-- import per css e js --}}
@section('css')
    @include('dipendenti.index.assets.css')
@endsection
@section('scripts')
    @parent
    @include('dipendenti.index.assets.js')
@endsection

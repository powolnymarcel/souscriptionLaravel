@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Souscription</div>

                    <div class="panel-body">
                        @if (Auth::user()->subscription('main')->cancelled())
                            <p>Vous avez annulé la souscription, acces possible jusque : {{ Auth::user()->subscription('main')->ends_at->format('dS M Y') }}</p>
                            <form action="{{ route('souscription.reprendre') }}" method="post">
                                <button type="submit" class="btn btn-default">Reprendre la souscription</button>
                                {{ csrf_field() }}
                            </form>
                        @else
                            <p>Vous etes souscris</p>
                            <form action="{{ route('souscription.annuler') }}" method="post">
                                <button type="submit" class="btn btn-default">Annuler souscription </button>
                                {{ csrf_field() }}
                            </form>
                        @endif
                        <hr>
                        <a href="{{ route('plans.index') }}">Changer de plan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
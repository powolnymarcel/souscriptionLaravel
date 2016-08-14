@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Factures</div>

                    <div class="panel-body">
                        @if ($factures->count())
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Montant</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($factures as $facture)
                                    <tr>
                                        <td>{{ $facture->date()->toDateTimeString() }}</td>
                                        <td>{{ $facture->total() }}</td>
                                        <td><a href="{{ route('factures.show', $facture->id) }}">Telecharger</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

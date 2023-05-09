@extends('layouts.app')

@section('content')

<h1>Overzicht Magazijn Jamin</h1>

<table>
    <thead>
    <table class="table table-bordered">
            <th>Barcode</th>
            <th>Naam</th>
            <th>Verpakkingseenheid</th>
            <th>AantalAanwezig</th>
            <th>Leverantie Info</th>
            <th>Allergeen Info</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($magazijn as $magazijnItem)
            <tr>
                <td>{{ $magazijnItem->product->Barcode }}</td>
                <td>{{ $magazijnItem->product->Naam }}</td>
                <td>{{ $magazijnItem->VerpakkingsEenheid }}</td>
                <td>{{ $magazijnItem->AantalAanwezig }}</td>
                <td>
                    <a href="{{ route('magazijn.leverancier', ['product' => $magazijnItem->product->Id]) }}">Leverantie Info</a>
                </td>
                <td>
                    <a href="{{ route('magazijn.allergeen', ['product' => $magazijnItem->product->Id]) }}">Allergeen Info</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

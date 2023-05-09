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
            <th>Allergeen Info</th>
            <th>Leverantie Info</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($magazijn as $magazijnItem)
            <tr>
                <td>{{ $magazijnItem->product->Barcode }}</td>
                <td>{{ $magazijnItem->product->Naam }}</td>
                <td>{{ $magazijnItem->VerpakkingsEenheid }}</td>
                @if ($magazijnItem->AantalAanwezig == NULL)
                <td>{{ 0 }}</td>
                @else
                <td>{{ $magazijnItem->AantalAanwezig }}</td>
                @endif
                <td>
                    <a style="color: red;text-decoration:none;" href="{{ route('magazijn.allergeen', ['product' => $magazijnItem->product->Id]) }}" class="fa-solid fa-xmark"></a>
                </td>
                <td>
                    <a style="color: blue;text-decoration:none;" href="{{ route('magazijn.leverancier', ['product' => $magazijnItem->product->Id]) }}" class="fa-solid fa-question"></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@extends('layouts.app')

@section('content')
    <h1>Leveringsinformatie</h1>
    <h2>Naam Leverancier: {{ $product->leveranciers->first()->Naam }}</h2>
    <p>Contactpersoon: {{ $product->leveranciers->first()->ContactPersoon }}</p>
    <p>Nummer: {{ $product->leveranciers->first()->LeverancierNummer }}</p>
    <p>Mobiel: {{ $product->leveranciers->first()->Mobiel }}</p>
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        <script>
                setTimeout(function() {
                    window.location.href = "{{ route('magazijn.index') }}";
                }, 4000);
        </script>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Naam Product</th>
                    <th>Datum Levering</th>
                    <th>Aantal</th>
                    <th>Datum Eerstvolgende Levering</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $leveranciers = $product->leveranciers->unique();
                @endphp
                @foreach ($leveranciers as $leverancier)
                    @php
                        $filteredRows = $leverancier->productPerLeveranciers->where('product_id', $product->Id)->sortBy('DatumEerstVolgendeLevering');
                    @endphp
                    @if ($filteredRows->isNotEmpty())
                        @foreach ($filteredRows as $index => $productPerLeverancier)
                            <tr>
                                <td>{{ $product->Naam }}</td>
                                <td>{{ $productPerLeverancier->DatumLevering }}</td>
                                <td>{{ $productPerLeverancier->Aantal }}</td>
                                <td>{{ $productPerLeverancier->DatumEerstVolgendeLevering }}</td>
                            </tr>
                        @endforeach
                    @endif
                @endforeach
            </tbody>
        </table>

    @endif

@endsection

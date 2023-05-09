@extends('layouts.app')

@section('content')
    <h1>Overzicht Allergenen</h1>
    <h5>Naam Product: {{ $product->Naam }}</h5>
    <h5>Barcode: {{ $product->Barcode }}</h5>
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
                    <th>Naam</th>
                    <th>Omschrijving</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $allergeen = $product->allergeen;
                @endphp
                @foreach ($allergeen->sortBy('Naam') as $allergeen)
                    <tr>
                        <td>{{ $allergeen->Naam }}</td>
                        <td>{{ $allergeen->Omschrijving }}</td>
                    </tr>  
                @endforeach
            </tbody>
        </table>

    @endif

@endsection

@extends('layouts.dashboard')

<!-- Form di creazione -->
@section('content')
    <h1>Inserisci i Dati</h1>
    <!-- visione degli errori -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="error">Attenzione! {{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('user.restaurant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="input-box">

            <label for="name">Nome del ristorante</label>
            <br>
            <input type="text" name="name" placeholder="nome" class="form-control @error('name') is-invalid @enderror">

            <!-- errore relativo all'input -->
            @error('name')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="address">Indirizzo</label>
            <br>
            <input type="text" name="address" placeholder="indirizzo"
                class="form-control @error('address') is-invalid @enderror">

            <!-- errore relativo all'input -->
            @error('address')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="motto">Motto</label>
            <br>
            <textarea name="motto" id="" cols="30" rows="5" placeholder="motto"
                class="form-control @error('motto') is-invalid @enderror"></textarea>

            <!-- errore relativo all'input -->
            @error('motto')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="tax_id">Partita IVA</label>
            <br>
            <input type="text" name="tax_id" placeholder="partita iva"
                class="form-control @error('tax_id') is-invalid @enderror">

            <!-- errore relativo all'input -->
            @error('tax_id')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="phone_number">Numero di telefono</label>
            <br>
            <input type="tel" name="phone_number" placeholder="..."
                class="form-control @error('phone_number') is-invalid @enderror">

            <!-- errore relativo all'input -->
            @error('phone_number')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <div>Categoria</div>
            <br>
            @foreach ($categories as $category)
                <input type="checkbox" name="categories[]" id="" value="{{ $category->id }}"
                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}> <label
                    for="category">{{ $category->name }}</label>
                <br>
            @endforeach


            <!-- errore relativo all'input -->
            @error('category')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="cover">Copertina ristorante</label>
            <br>
            <input type="file" name="cover">

            <!-- errore relativo all'input -->
            @error('cover')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="logo">Logo ristorante</label>
            <br>
            <input type="file" name="logo">

            <!-- errore relativo all'input -->
            @error('logo')
                <p class="error">{{ $message }}</p>
            @enderror

        </div>
        <div class="input-box">

            <label for="description">Descrizione</label>
            <br>
            <textarea name="description" id="" cols="30" rows="10" placeholder="..."
                class="form-control @error('description') is-invalid @enderror"></textarea>

            <!-- errore relativo all'input -->
            @error('description')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror

        </div>

        <!-- ...content... -->

        <input type="submit" value="Invia">
    </form>

    <div class="buttons">

        <a href="{{ route('user.restaurant.index') }}">Annulla</a>

    </div>
@endsection

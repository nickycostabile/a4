@extends('layouts.master')

@section('title')
    Create a Book
@endsection

@section('content')
	<h1>Create a Book</h1>

	<form method='POST' action='/library/create'>
        {{ csrf_field() }}

        <label for='title'>Title *</label>
        <input type='text' name='title' id='title' value='{{ old('title', 'Go Set a Watchman') }}'>

        <label for='published_date'>Published Date *</label>
        <input type='text' name='published_date' id='published_date' value='{{ old('published_date', '2015') }}'>

        <label for='isbn'>ISBN *</label>
        <input type='text' name='isbn' id='isbn' value='{{ old('isbn', '62409859') }}'>

        <label for='cover_art'>Cover Art *</label>
        <input type='text' name='cover_art' id='cover_art' value='{{ old('cover_art', 'https://images.gr-assets.com/books/1451442088l/24817626.jpg') }}'>

        <label for='writer_id'>Writer *</label>
            <select id='writer_id' name='writer_id'>
                <option value='0'>Choose Writer</option>
                @foreach($writersForDropdown as $writer_id => $writerName)
                    <option value='{{ $writer_id }}'>
                        {{ $writerName }}
                    </option>
                @endforeach
            </select>

		<br><br>
        
        <input type='submit' value='Create a Book'>



    </form>

    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


@endsection
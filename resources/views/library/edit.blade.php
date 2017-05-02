@extends('layouts.master')

@section('title')
    Edit {{ $book->title }}
@endsection

@section('content')
	<h1>Edit {{ $book->title }}</h1>

	<form method='POST' action='/library/edit'>
        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $book->id }}'>

        <label for='title'>Title *</label>
        <input type='text' name='title' id='title' value='{{ old('title', $book->title)}}'>

        <label for='published_date'>Published Date *</label>
        <input type='text' name='published_date' id='published_date' value='{{ old('published_date', $book->published_date)}}'>

        <label for='isbn'>ISBN *</label>
        <input type='text' name='isbn' id='isbn' value='{{ old('isbn', $book->isbn)}}'>

        <label for='cover_art'>Cover Art *</label>
        <input type='text' name='cover_art' id='cover_art' value='{{ old('cover_art', $book->cover_art)}}'>

        <label for='writer_id'>Writer*:</label>
            <select id='writer_id' name='writer_id'>
                <option value='0'>Choose Writer</option>
                @foreach($writersForDropdown as $writer_id => $writerName)
                    <option value='{{ $writer_id }}'>
                        {{ $writerName }}
                    </option>
                @endforeach
            </select>

		<br><br>
        
        <input type='submit' value='Save Changes'>



    </form>

    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
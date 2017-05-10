@extends('layouts.master')

@section('title')
    View {{ $book->title }}
@endsection

@section('content')
	<h1>{{ $book->title }}</h1>

	<img class='cover_art' src='{{ $book->cover_art }}' alt='Cover for {{ $book->title }}'>

	<div id="book-data">
		<p>Title: {{ $book->title}}</p>
		<p>Writer: {{ $book->writer->first_name}} {{ $book->writer->last_name }}</p>
		<p>Writer's Website: <a href="{{ $book->writer->website }}">{{ $book->writer->website }}</a></p>
		<p>Published: {{ $book->published_date}}</p>
		<p>ISBN: {{ $book->isbn}}</p>
		<p>Shelves: 

			@if($shelvesForThisBook != null)
				{{ $shelvesForThisBook }}
			@else 
				None established.
			@endif
		</p>

		<p>Added on: {{ $book->created_at }}</p>
		<p>Last updated: {{ $book->updated_at }}</p>
	</div>
	<p id="view-action-links">
            <a href='/library/edit/{{ $book_id }}'>Edit</a>
            &nbsp;
            <a href='/library/delete/{{ $book_id }}'>Delete</a>
    </p>

@endsection
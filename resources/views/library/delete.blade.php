@extends('layouts.master')

@section('title')
    Delete {{ $book->title }}
@endsection

@section('content')
	<h1>Please Confirm the Deletion of: {{ $book->title }}</h1>

	<form method='POST' action='/library/delete'>
        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $book->id }}'?>

        <p>Are you sure you want to delete <em>{{ $book->title }}</em>?</p>

        <input type='submit' value='Yes, delete this book.'>
    </form>

    <br><br>

	<img class='cover_art' src='{{ $book->cover_art }}' alt='Cover for {{ $book->title }}'>

	<div id="book-delete-data">
		<p>Title: {{ $book->title}}</p>
		<p>Writer: {{ $book->writer->first_name}} {{ $book->writer->last_name }}</p>
		<p>Writer's Website: <a href="{{ $book->writer->website }}">{{ $book->writer->website }}</a></p>
		<p>Published: {{ $book->published_date}}</p>
		<p>ISBN: {{ $book->isbn}}</p>

		<p>Added on: {{ $book->created_at }}</p>
		<p>Last updated: {{ $book->updated_at }}</p>
	</div>



@endsection












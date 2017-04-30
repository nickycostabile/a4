@extends('layouts.master')

@section('title')
    View {{ $book->title }}
@endsection

@section('content')
	<h1>{{ $book->title }}</h1>

	<img class='cover_art' src='{{ $book->cover_art }}' alt='Cover for {{ $book->title }}'>

	<p>Title: {{ $book->title}}</p>
	<p>Writer: {{ $book->writer}}</p>
	<p>Published: {{ $book->published_date}}</p>
	<p>ISBN: {{ $book->isbn}}</p>

	<p>Added on: {{ $book->created_at }}</p>
	<p>Last updated: {{ $book->updated_at }}</p>


	

@endsection
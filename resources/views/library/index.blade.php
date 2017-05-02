@extends('layouts.master')

@section('title')
    Library of Books
@endsection

@section('content')
	<h1>Library of Books</h1>

    <div class='book'>

        @foreach($books as $book)

        <div class="indexBook">
        <img class="cover_art" src='{{ $book->cover_art }}'>
        	<div class="indexContent">
                <h3>{{ $book->title }} | {{ $book->writer->first_name }} {{ $book->writer->last_name }}</h3>
            	<p class="details">
            	Published: {{ $book->published_date }}
            	&nbsp;
            	ISBN: {{ $book->isbn }}</p>
                <p class="action-links">
                    <a href='/library/{{ $book->id }}'>View</a>
                     &nbsp;
                    <a href='/library/edit/{{ $book->id }}'>Edit</a>
                     &nbsp;
                    <a href='/library/delete/{{ $book->id }}'>Delete</a>
                </p>
            </div>
        	
        </div>

        @endforeach
    </div>

@endsection



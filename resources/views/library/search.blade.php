@extends('layouts.master')

@section('title')
    Query for a Book
@endsection

@section('content')
	<h1>Query for a Book</h1>

	<form method='GET' action='/search'>

        <label for='searchTerm'>Search by title:</label>
        <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm or '' }}'>

        <input type='submit'>

    </form>

    @if($searchTerm != null)
        <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else
            <div class='bookResult'>
                @foreach($searchResults as $title => $book)

                    <img class='cover_art'src=' {{$book['cover_art']}} '>
                    <h3>{{$book['title']}} | {{ $book->writer->first_name }} {{ $book->writer->last_name }} </h3>
                    <p>Published Date: {{$book['published_date']}}</p>
                    <p>ISBN: {{$book['isbn']}}</p>

                    <p class="action-links">
                        <a href='/library/{{ $book_id }}'>View</a>
                         &nbsp;
                        <a href='/library/edit/{{ $book_id }}'>Edit</a>
                         &nbsp;
                        <a href='/library/delete/{{ $book_id }}'>Delete</a>
                    </p>

                @endforeach
            </div>
        @endif
    @endif

@endsection
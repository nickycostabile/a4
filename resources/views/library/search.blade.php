@extends('layouts.master')

@section('title')
    Query for a Book
@endsection

@section('content')
	<h1>Query for a Book</h1>

	<form method='GET' action='/search'>
		<label for='searchTerm'>Title:</label>
		 <input type='text' name='searchTerm' id='searchTerm' value='{{ $searchTerm or '' }}'>

		 <input type='submit' value='Query'>
	</form>

	{{-- If the form was submitted, display the results: --}}
    @if($searchTerm != null)
        <h2>Results for query: <em>{{ $searchTerm }}</em></h2>

        @if(count($searchResults) == 0)
            No matches found.
        @else

            @foreach($searchResults as $title => $book)
                <div class='book'>
                    <h3>{{ $title }}</h3>
                    <img src='{{ $book['cover']}}'>
                </div>
            @endforeach

        @endif
    @endif

@endsection
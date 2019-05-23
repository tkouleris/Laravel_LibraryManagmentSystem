@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row" style="padding-top:10px;">
        <!-- Books List -->
        <div class="col-md-3">
            <div class="list-group" >
                <h3>Available Books</h3>
                @foreach($books as $book)
                    <button type="button" class="list-group-item list-group-item-action">{{ $book->title }}</button>
                @endforeach
            </div>
        </div>
        <!-- Borrowers List -->
        <div class="col-md-3">
            <h3>Borrowers</h3>
            <div class="list-group" >
                @foreach($borrowers as $borrower)
                    <button type="button" class="list-group-item list-group-item-action">{{ $borrower->lastname.' '.$borrower->firstname }}</button>
                @endforeach
                <div class="btn-group" role="group" aria-label="Basic example" style="padding-top:5px;">
                    <button type="button" class="btn btn-success">Add </button>
                    <button type="button" class="btn btn-secondary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- Authors List -->
        <div class="col-md-3">
            <div class="list-group" >
                <h3>Authors</h3>
                @foreach( $authors as $author )
                    <button type="button" class="list-group-item list-group-item-action">{{ $author->lastname.' '.$author->firstname }}</button>
                @endforeach
                <div class="btn-group" role="group" aria-label="Basic example" style="padding-top:5px;">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#author_form">Add </button>
                    <button type="button" class="btn btn-secondary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

    </div>

</div>
@include('forms.author')
@endsection


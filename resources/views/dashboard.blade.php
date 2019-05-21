@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row" style="padding-top:10px;">

        <div class="col-md-3">
            <div class="list-group" >
                <h3>Available Books</h3>
                @foreach($books as $book)
                    <button type="button" class="list-group-item list-group-item-action">{{ $book->title }}</button>
                @endforeach
            </div>
        </div>

        <div class="col-md-3">
            <div class="list-group" >
                <h3>Borrowers</h3>
                @foreach($borrowers as $borrower)
                    <button type="button" class="list-group-item list-group-item-action">{{ $borrower->lastname.' '.$borrower->firstname }}</button>
                @endforeach
            </div>
        </div>

        <div class="col-md-3">
            <div class="list-group" >
                <h3>Available Books</h3>
                @foreach($books as $book)
                    <button type="button" class="list-group-item list-group-item-action">{{ $book->title }}</button>
                @endforeach
            </div>
        </div>

    </div>

</div>

@endsection

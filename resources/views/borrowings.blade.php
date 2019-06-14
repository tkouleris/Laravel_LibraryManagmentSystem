@extends('layouts.app')


@section('content')

<h1>Borrowings List</h1>
<table>
@foreach ($borrowing_records as $borrowing_record)
<tr>
    <td>{{ $borrowing_record->borrow_date }}</td>

    @foreach ($borrowing_record->booksBorrowed as $book)
        <td>
            {{ $book->title }}
        </td>
        <td>
        @foreach ($book->authors as $author)
            {{ $author->firstname }} {{ $author->lastname }}
        @endforeach
        </td>
    @endforeach

    <td>
    @foreach ($borrowing_record->borrowerBorrowed as $borrower)
        {{ $borrower->firstname }} {{ $borrower->lastname }}
    @endforeach
    </td>
</tr>
@endforeach
</table>
@endsection


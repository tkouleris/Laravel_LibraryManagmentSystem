@extends('layouts.app')


@section('content')

<h1>Borrowings List</h1>
<table>
@foreach ($borrowing_records as $borrowing_record)
<tr>
    {{-- {{ $borrowing_record->books_borrowed }} --}}
    {{-- {{ $borrowing_record }} --}}
    {{-- {{ $borrowing_record->borrow_date }} --}}
    <td>{{ $borrowing_record->borrow_date }}</td>
    <td>
    @foreach ($borrowing_record->booksBorrowed as $book)
        {{ $book->title }}
    @endforeach
    </td>
    <td>
    @foreach ($borrowing_record->borrowerBorrowed as $borrower)
        {{ $borrower->firstname }} {{ $borrower->lastname }}
    @endforeach
    </td>
</tr>
@endforeach
</table>
@endsection


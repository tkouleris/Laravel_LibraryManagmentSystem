@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row" style="padding-top:10px;">
        <h2>Borrowings</h2>



        <table class="table">
            <thead>
                <tr>
                    <th >Borrow Date</th>
                    <th >Borrower</th>
                    <th >Book Title</th>
                    <th >Book Author No1</th>
                    <th >Book Author No2</th>
                    <th >Book Author No3</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($borrowing_records as $borrowing_record)
                    <tr>
                        <td>{{ $borrowing_record->borrow_date }}</td>

                        <td>
                            @foreach ($borrowing_record->borrowerBorrowed as $borrower)
                                {{ $borrower->firstname }} {{ $borrower->lastname }}
                            @endforeach
                        </td>

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



                    </tr>
                @endforeach

            </tbody>
        </table>








    </div>
</div>

@endsection


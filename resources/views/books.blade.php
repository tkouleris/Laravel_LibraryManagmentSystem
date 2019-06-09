@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row" style="padding-top:10px;">
        <h2>List of available books</h2>

        <table class="table">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Title</th>
                    <th >ISBN10</th>
                    <th >ISBN13</th>
                    <th >Year</th>
                    <th >Author No1</th>
                    <th >Author No2</th>
                    <th >Author No3</th>
                </tr>
            </thead>
            <tbody>

                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->isbn10 }}</td>
                        <td>{{ $book->isbn13 }}</td>
                        <td>{{ $book->year }}</td>
                        @if(count($book->authors))
                            @foreach($book->authors as $author)
                                <td>{{ $author->lastname.' '.$author->firstname}}</td>
                            @endforeach
                        @endif

                        @if(count($book->authors) == 0)
                            <td><td><td></td><td></td>
                        @endif

                        @if(count($book->authors) == 1)
                            <td><td><td></td>
                        @endif

                        @if(count($book->authors) == 2)
                            <td><td>
                        @endif

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
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
                        <td>
                            <button type="button" name="btn_edit_book" class="btn btn-success" id="{{ $book->id }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" name="btn_del_book" class="btn btn-danger" id=" {{ $book->id }} " >Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $("button[name=btn_edit_book]").click(function(){
        bookid = $(this).attr("id");

        jQuery.ajax({
            url: "/book/"+bookid,
            method: 'get',
            data: {
                id: bookid
            },
            success: function(result)
            {
                var authors = result.authors;

                $('#book_form').modal('show');
                $("input[name=title]").val(result.title)
                $("input[name=isbn10]").val(result.isbn10)
                $("input[name=isbn13]").val(result.isbn13)
                $("input[name=year]").val(result.year)
                $("input[name=form_bookid]").val(result.id)
                var i = 0;
                authors.forEach(function(author) {
                    $('select#author'+i+' option[id='+author.id+']')[0].setAttribute('selected','selected');
                    i++;
                });
            },
            error: function (data)
            {
                // TODO: error message
            }
        });
    });

    $("button[name=btn_del_book]").click(function(){
        bookid = $(this).attr("id");

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "/book/"+bookid,
            method: 'delete',
            data: {
                id: bookid
            },
            success: function(result)
            {
                location.reload();
            },
            error: function (data)
            {
                // TODO: error message
            }

        });
    });
});
</script>

@include('forms.book')
@endsection
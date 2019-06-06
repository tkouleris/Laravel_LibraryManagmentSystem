@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row" style="padding-top:10px;">
        <!-- Books List -->
        <div class="col-md-3">
            <div class="list-group" >
                <h3>Available Books</h3>
                @foreach($books as $book)
                    <button type="button" data-bookid="{{ $book->id }}" name="book_row" class="list-group-item list-group-item-action">{{ $book->title }}</button>
                @endforeach
                <div class="btn-group" role="group" aria-label="Basic example" style="padding-top:5px;">
                    <button type="button" class="btn btn-success" id="btn_new_book" data-toggle="modal" data-target="#book_form">Add </button>
                    <button type="button" class="btn btn-secondary"  id="btn_edit_book">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <!-- Borrowers List -->
        <div class="col-md-3">
            <h3>Borrowers</h3>
            <div class="list-group" >
                @foreach($borrowers as $borrower)
                    <button type="button" data-borrowerid="{{ $borrower->id }}" name="borrower_row" class="list-group-item list-group-item-action">{{ $borrower->lastname.' '.$borrower->firstname }}</button>
                @endforeach
                <div class="btn-group" role="group" aria-label="Basic example" style="padding-top:5px;">
                    <button type="button" class="btn btn-success" id="btn_new_borrower" data-toggle="modal" data-target="#borrower_form">Add </button>
                    <button type="button" class="btn btn-secondary" id="btn_edit_borrower">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

        <!-- Authors List -->
        <div class="col-md-3">
            <div class="list-group" >
                <h3>Authors</h3>
                @foreach( $authors as $author )
                    <button type="button" name="author_row" data-authorid="{{ $author->id }}" class="list-group-item list-group-item-action">{{ $author->lastname.' '.$author->firstname }}</button>
                @endforeach
                <div class="btn-group" role="group" aria-label="Basic example" style="padding-top:5px;">
                    <button type="button" class="btn btn-success" id="btn_new_author" data-toggle="modal" data-target="#author_form">Add </button>
                    <button type="button" class="btn btn-secondary"  id="btn_edit_author">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>

    </div>

</div>
<script>
$(document).ready(function() {

    $("#btn_new_author").click(function(){

        $("input[name=firstname]").val('')
        $("input[name=lastname]").val('')
        $("input[name=dob]").val('')
        $("textarea[name=bio]").text('')
        $("input[name=form_authorid]").val(0)

    });

    $("button[name=author_row]").click(function(){
        authorid = $(this).attr("data-authorid");

        $("#btn_edit_author").click(function(){

            jQuery.ajax({
            url: "/author/"+authorid,
            method: 'get',
            data: {
                id: authorid
            },
            success: function(result)
            {
                $('#author_form').modal('show');
                $("input[name=firstname]").val(result.firstname)
                $("input[name=lastname]").val(result.lastname)
                $("input[name=dob]").val(result.dob)
                $("textarea[name=bio]").text(result.bio)
                $("input[name=form_authorid]").val(result.id)
            },
            error: function (data)
            {
                // TODO: error message
            }
            });
        });

    });

    // Books Button Handlers
    $("button[name=book_row]").click(function(){
        bookid = $(this).attr("data-bookid");

        $("#btn_edit_book").click(function(){

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

    });


    // Borrower Button Handlers
    $("button[name=borrower_row]").click(function(){
        borrowerid = $(this).attr("data-borrowerid");

        $("#btn_edit_borrower").click(function(){

            jQuery.ajax({
            url: "/borrower/"+borrowerid,
            method: 'get',
            data: {
                id: borrowerid
            },
            success: function(result)
            {
                $('#borrower_form').modal('show');
                $("input[name=borrower_firstname]").val(result.firstname)
                $("input[name=borrower_lastname]").val(result.lastname)
                $("input[name=borrower_dob]").val(result.dob)
                $("input[name=borrower_address]").val(result.address)
                $("input[name=borrower_phone]").val(result.phone)
            },
            error: function (data)
            {
                // TODO: error message
            }
            });
        });

    });

});
</script>

@include('forms.book')
@include('forms.borrower')
@include('forms.author')
@endsection


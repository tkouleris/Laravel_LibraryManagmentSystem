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
    var authorid = 0;

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



});
</script>

@include('forms.author')
@endsection


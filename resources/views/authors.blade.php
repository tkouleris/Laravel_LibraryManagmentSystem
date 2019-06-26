@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row" style="padding-top:10px;">
        <h2>List of authors</h2>

        <table class="table">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Last Name</th>
                    <th >First Name</th>
                    <th >Date of Birth</th>
                    <th >Bio</th>
                </tr>
            </thead>
            <tbody>

                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->lastname }}</td>
                        <td>{{ $author->firstname }}</td>
                        <td>{{ $author->dob }}</td>
                        <td>{{ str_limit($author->bio,20) }}</td>
                        <td>
                            <button type="button" name="btn_edit_author" class="btn btn-success" id="{{ $author->id }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" name="btn_del_author" class="btn btn-danger" id=" {{ $author->id }} " >Delete</button>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" style="text-align: center;">
                        {{ $authors->links() }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $("button[name=btn_edit_author]").click(function(){
        authorid = $(this).attr("id");

        jQuery.ajax({
            url: "/author/"+authorid,
            method: 'get',
            data: {
                id: authorid
            },
            success: function(result)
            {
                var authors = result.authors;

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

    $("button[name=btn_del_author]").click(function(){
        authorid = $(this).attr("id");

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "/author/"+authorid,
            method: 'delete',
            data: {
                id: authorid
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

@include('forms.author')
@endsection
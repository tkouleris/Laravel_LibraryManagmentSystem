@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row" style="padding-top:10px;">
        <h2>List of borrowers</h2>

        <table class="table">
            <thead>
                <tr>
                    <th >ID</th>
                    <th >Last Name</th>
                    <th >First Name</th>
                    <th >Date of Birth</th>
                    <th >Address</th>
                    <th >Phone</th>
                </tr>
            </thead>
            <tbody>

                @foreach($borrowers as $borrower)
                    <tr>
                        <td>{{ $borrower->id }}</td>
                        <td>{{ $borrower->lastname }}</td>
                        <td>{{ $borrower->firstname }}</td>
                        <td>{{ $borrower->dob }}</td>
                        <td>{{ $borrower->address }}</td>
                        <td>{{ $borrower->phone }}</td>
                        <td>
                            <button type="button" name="btn_edit_borrower" class="btn btn-success" id="{{ $borrower->id }}">Edit</button>
                        </td>
                        <td>
                            <button type="button" name="btn_del_borrower" class="btn btn-danger" id=" {{ $borrower->id }} " >Delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $("button[name=btn_edit_borrower]").click(function(){
        borrowerid = $(this).attr("id");

        jQuery.ajax({
            url: "/borrower/"+borrowerid,
            method: 'get',
            data: {
                id: borrowerid
            },
            success: function(result)
            {
                $('#borrower_form').modal('show');
                $("input[name=form_borrowerid]").val(result.id)
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

    $("button[name=btn_del_borrower]").click(function(){
        borrowerid = $(this).attr("id");

        $.ajaxSetup({
            headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery.ajax({
            url: "/borrower/"+borrowerid,
            method: 'delete',
            data: {
                id: borrowerid
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

@include('forms.borrower')
@endsection
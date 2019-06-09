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
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
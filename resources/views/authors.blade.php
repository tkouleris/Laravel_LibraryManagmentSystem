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
                        <td>{{ $author->bio }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
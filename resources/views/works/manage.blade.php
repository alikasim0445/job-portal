@extends('layouts.app')



@section('content')
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td>{{ $work->title }}</td>
            </tr>
            <tr>
                <td>{{ $work->description }}</td>
            </tr>
            <tr>

                <td>{{ $work->company }}</td>
            </tr>
        </tbody>
    </table>
    </table>
@endsection

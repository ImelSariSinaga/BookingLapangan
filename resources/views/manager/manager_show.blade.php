@extends('layout.admin')

@section('title', 'Pengelola Details')

@section('contents')
    <div class="container">
        <h1>Pengelola List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Last Login</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($managers as $manager)
                    <tr>
                        <td>{{ $manager->id_pengguna }}</td>
                        <td>{{ $manager->username_pengguna }}</td>
                        <td>{{ $manager->email_pengguna }}</td>
                        <td>{{ $manager->last_login }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-primary">Back</a>
    </div>
@endsection

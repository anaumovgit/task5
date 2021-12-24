@extends('template.template')
@section('title') @parent @endsection

@section('content')
    <div class="container">
        <h1>Home page</h1>
        @if (!empty($users))
        <div class="btn-group mt-5" role="group" aria-label="Basic checkbox toggle button group">
            <button class="btn btn-outline-primary" form="form" formaction="{{route('block')}}" type="submit">Block</button>
            <button class="btn btn-outline-primary" form="form" formaction="{{route('unblock')}}" type="submit">Unblock</button>
            <button class="btn btn-outline-primary" form="form" formaction="{{route('delete')}}" type="submit">Delete</button>
        </div>

        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">registered at</th>
                <th scope="col">last auth at</th>
                <th scope="col">status</th>
            </tr>
            </thead>

            <tbody>


                    <form action="" id="form" method="post">
                        @csrf
                        @php
                            $i = 1
                        @endphp
                        @foreach($users as $user)
                            <tr>
                                <td><input name="ids[]" value="{{ $user->id }}" class="form-check-input"
                                           type="checkbox" id="{{ $user->id }}"></td>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password_show }}</td>
                                <td>{{ $user->registered_at }}</td>
                                <td>{{ $user->auth_at }}</td>
                                <td>{{ $user->status }}</td>
                            </tr>
                        @endforeach
                    </form>

            </tbody>
        </table>
        @endif
    </div>
    <script src="js/checkbox.js"></script>
@endsection

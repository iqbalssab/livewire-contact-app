@extends('layouts.main')

@section('container')
    <h1>{{ $contact->name }}'s Contact Detail</h1>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    Name : {{ $contact->name }}
                </li>
                <li>
                    Phone Number : {{ $contact->phone }}
                </li>
            </ul>
        </div>
      </div>
@endsection
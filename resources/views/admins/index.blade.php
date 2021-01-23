@extends('layouts.main')

@section('title','Admin Index')

@section('content')

<a href="{{route('logout')}}" class="btn btn-primary">Logout</a>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">phone</th>
      <th scope="col">birthdate</th>
      <th scope="col">expenses</th>
      <th scope="col">incomes</th>
      <th scope="col">Registration Date</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user)
  <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->phone}}</td>
      <td>{{$user->birth_date}}</td>
      <td>{{$user->total_incomes}}</td>
      <td>{{$user->total_expenses}}</td>
      <td>{{$user->created_at}}</td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection

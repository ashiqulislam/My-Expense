@extends('layouts.admin')
@section('body')
<h1 class="h3 mb-4 text-gray-800">My {{$title}} Page</h1>
@include('layouts.messages')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><a href="{{route('my_expense.create')}}" class="btn btn-primary">Create New {{$title}}</a></h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form method="POST" action="{{route('my_expense.store')}}">
                    @csrf
                    @include('admin.expense.form')
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>
</div>

@endsection
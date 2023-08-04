@extends('layouts.admin')
@section('body')
<h1 class="h3 mb-4 text-gray-800">My {{$title}} Page</h1>
@include('layouts.messages')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary float-left mb-3"><a href="{{route('my_expense.create')}}" class="btn btn-primary">Create New {{$title}}</a></h6>
        <div class="float-right">
            <a href="{{route('my_expense.index')}}?days=7" class="btn btn-primary">Last 7 Days {{$title}}</a>
            <a href="{{route('my_expense.index')}}?days=30" class="btn btn-primary">Last 30 Days {{$title}}</a>
        </div>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="2">Total</th>
                        <th colspan="2">{{$total}}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $item)                        
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->transection_date}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                <a href="{{route('my_expense.edit', $item->id)}}"><i class="fas fa-edit"></i></a>
                                <form method="POST" action="{{route('my_expense.destroy', $item->id)}}" style="display: inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i style="color: red" class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
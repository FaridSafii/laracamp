@extends('layout.app')
@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-12" style="margin-top: 20px">
            <div class="card-header">
                My Status Camps
            </div>
            <div class="card-body" >
                @include('component.alert')
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Camp</th>
                            <th>Price</th>
                            <th>Register Data</th>
                            <th>Paid Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($checkouts as $checkout)
                            <tr>
                                <td>{{ $checkout->User->name }}</td>
                                <td>{{ $checkout->Camp->title }}</td>
                                <td>@currency($checkout->Camp->price)</td>
                                <td>{{ $checkout->created_at->format('M d Y') }}</td>
                                <td>
                                    @if ($checkout->is_paid)
                                        <span class="badge bg-success">Paid</span>
                                    @else
                                        <span class="badge bg-warning">Waiting</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$checkout->is_paid)
                                    <form action="{{ route('admin.checkout.update',$checkout->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-primary btn-sm">Set to Paid </button>
                                    </form>  
                                    @endif
                                   
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="3"> No camps regitered</td> 
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
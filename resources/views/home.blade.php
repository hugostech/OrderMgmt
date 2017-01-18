@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <a class="btn btn-primary" href="importExOrder">Import Ex Order</a> </div>

                <div class="panel-body">


                </div>
                @if(isset($orders))
                    <table class="table">
                        <tr>
                            <td>Id</td>
                            <td>Status</td>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                {{--<td>{{$order->customer_id}}</td>--}}
                            </tr>
                        @endforeach
                    </table>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection

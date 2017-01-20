@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" ng-app="managementApp">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <a class="btn btn-primary" href="importExOrder">Import Ex Order</a> </div>

                <div class="panel-body" ng-controller="categoryMgmt">
                    <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        {!! Form::text('categoryName',null,['class'=>'form-control','ng-model'=>'categoryFilter','ng-keyup'=>'categoryLoad()']) !!}
                        <div class="list-group" ng-show="categoryFilter" ng-repeat="x in categorys">

                            <a href="?categoryId=@{{ x.id }}" class="list-group-item">@{{ x.name }}</a>
                        </div>
                    </div>

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

    <script>
        var homeApp = angular.module('managementApp',[]);
        homeApp.controller('categoryMgmt',function($scope){
            $scope.categoryFilter = '';
            $scope.categorys = '';
            $scope.categoryLoad = function(){
                var key = $scope.categoryFilter;

            };
        });
    </script>
@endsection

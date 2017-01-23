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
                        {!! Form::text('categoryName',null,['class'=>'form-control','ng-model'=>'categoryFilter']) !!}
                        <div class="list-group" ng-show="categoryFilter" >

                            <a ng-repeat="item in categorys" href="#" class="list-group-item">@{{ item.name}}</a>

                        </div>
                        {{--<ul>--}}
                            {{--<li ng-repeat="x in categorys">@{{x.name}}</li>--}}
                        {{--</ul>--}}
                    </div>
                    <button type="button" ng-click="categoryLoad()">asd</button>

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
        homeApp.controller('categoryMgmt',function($scope,$http){
            $scope.categoryFilter = '';
            $scope.categorys = [];
            $scope.categoryLoad = function(){
                var key = $scope.categoryFilter;

                $http({
                    method : 'get',
                    url : '{{url('/api/categorys')}}/'+key,
                    headers : {
                        'Api-Key': '{{encrypt(env('API_KEY'))}}',
                        'X-CSRF-TOKEN':'{{csrf_token()}}'
                    }
                }).then(function mySuccess(response){
                    $scope.categorys = JSON.parse(response.data);
                    console.log($scope.categorys[0].name);
//                    alert($scope.categorys[0]);

                });
            };
        });
    </script>
@endsection

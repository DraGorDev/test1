@extends('welcome')
@section('form-content')

<div ng-app="myApp" ng-controller="mainController">
<div class="container">
<div class="row">

<div class="col-sm-6">
    <!-- FORM ============ -->

    <form name="userForm" ng-submit="submitForm()" novalidate>

        <!-- NAME -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.name.$invalid && !userForm.name.$pristine }">
            <label>Name</label>
            <input type="text" name="name" class="form-control" ng-model="user.name" required>
            <p ng-show="userForm.name.$invalid && !userForm.name.$pristine" class="help-block">You name is required.</p>
        </div>

        <!-- USERNAME -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.username.$invalid && !userForm.username.$pristine }">
            <label>Username</label>
            <input type="text" name="username" class="form-control" ng-model="user.username" ng-minlength="3" ng-maxlength="8">
            <p ng-show="userForm.username.$error.minlength" class="help-block">Username is too short.</p>
            <p ng-show="userForm.username.$error.maxlength" class="help-block">Username is too long.</p>
        </div>

        <!-- EMAIL -->
        <div class="form-group" ng-class="{ 'has-error' : userForm.email.$invalid && !userForm.email.$pristine }">
            <label>Email</label>
            <input type="email" name="email" class="form-control" ng-model="user.email">
            <p ng-show="userForm.email.$invalid && !userForm.email.$pristine" class="help-block">Enter a valid email.</p>
        </div>

        <button type="submit" class="btn btn-primary" ng-disabled="userForm.$invalid">Submit</button>

    </form>
  </div>
  <div class="col-sm-6">


</div>
</div>
</div>
@endsection

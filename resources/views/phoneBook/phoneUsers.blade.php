@extends('welcome')
@section('phone-book-content')

<div class="container" ng-controller="phoneBookController">

    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Phone Book</a>
          </div>
          <ul class="nav navbar-nav pull-right"></ul>
        </div>
    </nav>

    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#phoneBookNew">New</button>

    <div class="form-group">
        <div class="col-sm-8">
          <div class="form-group row">
            <!-- Search form -->
            <form class="form-inline active-cyan-4">
                <input class="form-control form-control-sm mr-3 w-75" type="text" ng-model="searchKeyword" placeholder="Search user" aria-label="Search">
                <i class="fa fa-search" aria-hidden="true"></i>

            </form>
          </div>
        </div>

    </div>



    <div growl></div>
    <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone Number</th>
        <th>Date</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
        <tr ng-repeat="onePhoneBook in phonebook | filter: searchKeyword">
          <td><% onePhoneBook.id %></td>
          <td><% onePhoneBook.first_name %></td>
          <td><% onePhoneBook.last_name %></td>
          <td><% onePhoneBook.phone_number %></td>
          <td><% onePhoneBook.date_time %></td>
          <td><button type="button" class="btn-sm btn-danger" data-toggle="modal" data-target="#deletePhoneUser" ng-click="selectPhoneUser(onePhoneBook)">Delete</button></td>
      </tr>
    </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="phoneBookNew" data-backdrop="static" role="dialog" data-togle="modal" data-target="#phoneBookNew">
    <div class="modal-dialog">

      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" ng-click="closeForm($addPhoneBook.someForm)" data-dismiss="modal">&times;</button>
                <br>
                <h4 class="modal-title pull-left">New Chassis</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" name="$addPhoneBook.someForm" role="form">

                    <div class="form-group"
                    ng-class="{'has-success':$addPhoneBook.someForm.first_name.$valid &&
                    !$addPhoneBook.someForm.first_name.$pristine,
                    'has-error':$addPhoneBook.someForm.first_name.$invalid &&
                    !$addPhoneBook.someForm.first_name.$pristine}">
                        <label class="control-label col-sm-2">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title"
                            placeholder="First Name" ng-model="phonebook.first_name"
                            required ng-minlength="3" ng-model="$addPhoneBook.first_name"
                            name="first_name">
                            <div ng-class="{'has-success':$addPhoneBook.someForm.first_name.$valid &&
                            !$addPhoneBook.someForm.first_name.$pristine,
                            'has-error':$addPhoneBook.someForm.first_name.$invalid &&
                            !$addPhoneBook.someForm.first_name.$pristine}">
                            <label class="control-label col-sm" ng-cloack ><% firstName[0] %></div>


                        </div>
                    </div>

                    <div class="form-group"
                    ng-class="{'has-success':$addPhoneBook.someForm.last_name.$valid &&
                    !$addPhoneBook.someForm.last_name.$pristine,
                    'has-error':$addPhoneBook.someForm.last_name.$invalid &&
                    !$addPhoneBook.someForm.last_name.$pristine}">
                        <label class="control-label col-sm-2">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title"
                            placeholder="Last Name" ng-model="phonebook.last_name"
                            required ng-minlength="3" ng-model="$addPhoneBook.last_name"
                            name="last_name">
                            <div ng-class="{'has-success':$addPhoneBook.someForm.last_name.$valid &&
                            !$addPhoneBook.someForm.last_name.$pristine,
                            'has-error':$addPhoneBook.someForm.last_name.$invalid &&
                            !$addPhoneBook.someForm.last_name.$pristine}">
                            <label class="control-label col-sm" ng-cloack ><% lastName[0] %></div>


                        </div>
                    </div>

                    <div class="form-group"
                    ng-class="{'has-success':$addPhoneBook.someForm.phone_number.$valid &&
                    !$addPhoneBook.someForm.phone_number.$pristine,
                    'has-error':$addPhoneBook.someForm.phone_number.$invalid &&
                    !$addPhoneBook.someForm.phone_number.$pristine}">
                        <label class="control-label col-sm-2">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title"
                            placeholder="Phone Number" ng-model="phonebook.phone_number"
                            required ng-minlength="3" ng-model="$addPhoneBook.phone_number"
                            name="phone_number">
                            <div ng-class="{'has-success':$addPhoneBook.someForm.phone_number.$valid &&
                            !$addPhoneBook.someForm.phone_number.$pristine,
                            'has-error':$addPhoneBook.someForm.phone_number.$invalid &&
                            !$addPhoneBook.someForm.phone_number.$pristine}">
                            <label class="control-label col-sm" ng-cloack ><% phoneNumber[0] %></div>


                        </div>
                    </div>

                    <div class="form-group"
                    ng-class="{'has-success':$addPhoneBook.someForm.date_time.$valid &&
                    !$addPhoneBook.someForm.date_time.$pristine,
                    'has-error':$addPhoneBook.someForm.date_time.$invalid &&
                    !$addPhoneBook.someForm.date_time.$pristine}">
                        <label class="control-label col-sm-2">Date</label>
                        <div class="col-sm-10">
                            <input type="date" disabled value="<% date_time %>" class="form-control" id="title" name="date_time">
                            <div ng-class="{'has-success':$addPhoneBook.someForm.date_time.$valid &&
                            !$addPhoneBook.someForm.date_time.$pristine,
                            'has-error':$addPhoneBook.someForm.date_time.$invalid &&
                            !$addPhoneBook.someForm.date_time.$pristine}">
                        </div>
                    </div>

                  </div>
                  <% today %>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" ng-click="savePhoneBookUser($addPhoneBook.someForm)">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default"  ng-click="closeForm($addPhoneBook.someForm)" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
  </div>


  <!-- Modal Delete Phone User -->
  <div class="modal fade" id="deletePhoneUser" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <br>
          <h4 class="modal-title pull-left">Are you Sure?</h4>
        </div>
        <div class="modal-body">
            <strong>
                You want delete <% clickedPhoneUser.first_name %> ?
            </strong>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="deletePhoneUser(clickedPhoneUser)">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
      </div>

    </div>
  </div>


</div>

@endsection

var myApp = angular.module('myApp', ['angular-growl', 'ngAnimate'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

 myApp.config(['growlProvider', function (growlProvider) {
   growlProvider.globalTimeToLive({success: 1000, error: 2000, warning: 3000, info: 4000});
 }]);

myApp.controller('phoneBookController', function($scope, $http, $filter, growl) {

	$scope.phonebook = [];
	$scope.newPhoneBook = {};
	$scope.clickedPhoneUser = {};

  $scope.date = $filter('date')(new Date(),'yyyy-MM-dd');

	$scope.init = function() {
	  $http.get('/api/phonebook').
	  success(function(data) {
      $scope.phonebook = data;
			//console.log($scope.phonebook);
	  });
	};
  // Call function - Show all PhoneBook Users
  $scope.init();

	// Success Message
	function successMessage() {
		growl.success('Success', {title: 'Saved'}, 100);
	}

	// Delete Message
	function deleteMessage() {
		growl.warning('Success', {title: 'Deleted'}, 100);
	}

	// Close Form
	$scope.closeForm = function(formName) {
		console.log('close form');
		$scope.$addPhoneBook.someForm.$setPristine();
		$scope.$addPhoneBook.someForm.$setUntouched();

		$scope.phonebook.first_name   = '';
		$scope.phonebook.last_name    = '';
		$scope.phonebook.phone_number = '';

		$scope.firstName = '';
		$scope.lastName = '';
		$scope.phoneNumber = '';
	}

	// Add new PhoneBook User
	$scope.savePhoneBookUser = function(data, formName){

		$http.post('/api/phonebook', {
			first_name:   $scope.phonebook.first_name,
			last_name:    $scope.phonebook.last_name,
			phone_number: $scope.phonebook.phone_number,
			date_time:         this.date
		}).success(function(data, status, headers, config){
			console.log(data.status + ' my console.log ' + data.errors);
			if (data.errors) {

				$scope.firstName = data.errors['first_name'];
				$scope.lastName = data.errors['last_name'];
				$scope.phoneNumber = data.errors['phone_number'];
			} else if(data.status === true) {

				$scope.firstName = '';
				$scope.lastName = '';
				$scope.phoneNumber = '';
				$scope.$addPhoneBook.someForm.$setPristine();
				$scope.$addPhoneBook.someForm.$setUntouched();

				$scope.init();
				$("#phoneBookNew").modal('hide');
				successMessage();

			}

		});
	};

	// Select Phone User
    $scope.selectPhoneUser = function(phoneUser){
        console.log(phoneUser);
        $scope.clickedPhoneUser = phoneUser;
    };

	// Delete Phone User
    $scope.deletePhoneUser = function(phoneUser) {
			console.log(phoneUser.id);
      $http.delete('/api/phonebook/' + phoneUser.id)
          .success(function(data) {
              $scope.phonebook.splice(phoneUser, 1);
							if (data.status === true) {
								$scope.init();
								deleteMessage();
							}
          });
    }

});

app.controller("myCityController", function($scope, cityService){

	getCitiesCont();
	$scope.itemsPerPageVal = 10;
	$scope.statusval = '';

	function getCitiesCont() {
		cityService.listCities()
		.then(function (response) {
			$scope.cities = response.data;
		}, function (error) {
			$scope.status = 'Unable to load customer data: ' + error.message;
		});
	}

 $scope.insertCityCont = function() {
     var flag = 1;
     
     if(!$scope.new_city_name)
     {
      flag = 0;
      window.alert('The city name is empty!');
     }
     
     if(flag)
     {
     cityService.addCity($scope.new_city_name, $scope.new_city_desc, $scope.new_city_lat, $scope.new_city_long)
     .then(function(response){ 
       $scope.statusval = 'success_newcity';
       $scope.cities.push(response.data);
     });
   }
   };

$scope.insertCityBefortCont = function()
   {
    $scope.new_city_name = '';
    $scope.new_city_desc = '';
    $scope.new_city_lat = '';
    $scope.new_city_long = '';
    $scope.statusval = '';
  }



  $scope.deleteCityCont = function(city){
      var result = confirm("Are you sure delete this record?");
      if (result) {
       cityService.removeCity(city)
       .then(function(response){ 
        var index=$scope.cities.indexOf(city)
        $scope.cities.splice(index,1);
      });
     };
   };  


   $scope.saveCityCont = function(row_index) {
     cityService.saveCity($scope.editcity)
     .then(function(response){ 
      $scope.statusval = 'success_editcity';
       $scope.cities[row_index] = angular.copy($scope.editcity);
     });
   };


   $scope.editCityCont = function(city, index)
   {
    $scope.editcity = angular.copy(city);
    $scope.row_index = index;
    $scope.statusval = '';
  }

	$scope.sort = function(sortkey){
		$scope.sortkey = sortkey;
		$scope.reverse = !$scope.reverse;

	}

});
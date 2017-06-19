app.controller("myFactorController", function($scope, factorService){

  getFactorsCont();
  $scope.itemsPerPageVal = 10;
  $scope.statusval = '';

  function getFactorsCont() {
    factorService.listfactor()
    .then(function (response) {
      $scope.factors = response.data;
    }, function (error) {
      $scope.status = 'Unable to load customer data: ' + error.message;
    });
  };

 $scope.insertFactorCont = function() {
  
      var flag = 1;
    
     if(!$scope.new_factor_name)
      {
       flag = 0;
       window.alert('The factor name is empty!');
      }
     
      if(flag)
      {
      factorService.addfactor($scope.new_factor_name, $scope.new_factor_desc)
     .then(function(response){ 
        $scope.statusval = 'success_newfactor';
        $scope.factors.push(response.data);
      });
    }
   };

$scope.insertFactorBefortCont = function()
   {
  
    $scope.new_factor_name = '';
    $scope.new_factor_desc = '';
    $scope.statusval = '';
  };

  $scope.deleteFactorCont = function(factor){
      var result = confirm("Are you sure delete this record?");
      if (result) {
       factorService.removefactor(factor)
       .then(function(response){ 
        var index=$scope.factors.indexOf(factor)
        $scope.factors.splice(index,1);
      });
     };
   };  


   $scope.saveFactorCont = function(row_index) {
     factorService.savefactor($scope.editfactor)
     .then(function(response){ 
      $scope.statusval = 'success_editfactor';
       $scope.factors[row_index] = angular.copy($scope.editfactor);
     });
   };


   $scope.editFactorCont = function(factor, index)
   {
    $scope.editfactor = angular.copy(factor);
    $scope.row_index = index;
    $scope.statusval = '';
  };

  $scope.sort = function(sortkey){
    $scope.sortkey = sortkey;
    $scope.reverse = !$scope.reverse;

  };

});
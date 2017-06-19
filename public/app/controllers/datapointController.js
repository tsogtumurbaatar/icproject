app.controller("myDatapointController", function($scope, factorService, segmentService, indicatorService, datapointService, cityService){

  getDatapointsCont();
  $scope.itemsPerPageVal = 10;
  $scope.statusval = '';

  function getDatapointsCont() {
    datapointService.listdatapoint()
    .then(function (response) {
      $scope.datapoints = response.data;
    }, function (error) {
      $scope.status = 'Unable to load customer data: ' + error.message;
    });
  };

  $scope.insertDatapointCont = function() {

    var flag = 1;
    
    if(!$scope.new_data_point)
    {
     flag = 0;
     window.alert('The datapoint name is empty!');
   }

   if(!$scope.selectedFactor)
   {
     flag = 0;
     window.alert('The factor is empty!');
   }

   if(!$scope.selectedSegment)
   {
     flag = 0;
     window.alert('The segment is empty!');
   }

    if(!$scope.selectedIndicator)
   {
     flag = 0;
     window.alert('The indicator is empty!');
   }

   if(!$scope.selectedCity)
   {
     flag = 0;
     window.alert('The city is empty!');
   }


   if(flag)
   {
    datapointService.adddatapoint($scope.new_data_point, 
                                  $scope.selectedCity.city_id, 
                                  $scope.selectedFactor.factor_id,
                                  $scope.selectedSegment.segment_id,
                                  $scope.selectedIndicator.indicator_id
      )
    .then(function(response){ 
      $scope.statusval = 'success_newdatapoint';
      $scope.datapoints.push(response.data);
    });
  }
};

$scope.insertDatapointBefortCont = function()
{
  factorService.listfactor()
  .then(function (response) {
    $scope.factorlist = response.data; });

  cityService.listCities()
  .then(function (response) {
    $scope.citylist = response.data; });

  $scope.new_datapoint_name = '';
  $scope.new_datapoint_desc = '';
  $scope.statusval = '';
  $scope.segmentlist = {};
  $scope.indicatorlist = {};
};

$scope.insertDatapointAfterCont = function()
{
  if($scope.selectedFactor.factor_id != '')
  {
    segmentService.listsegmentbyid($scope.selectedFactor.factor_id)
    .then(function (response) {
      $scope.segmentlist = response.data; });
  }
};

$scope.insertDatapointAfter2Cont = function()
{
  if($scope.selectedSegment.segment_id != '')
  {
    indicatorService.listindicatorbyid($scope.selectedSegment.segment_id)
    .then(function (response) {
      $scope.indicatorlist = response.data; });
  }
};




$scope.editDatapointAfterCont = function()
{
  if($scope.editFactor.factor_id != '')
  {
    segmentService.listsegmentbyid($scope.editFactor.factor_id)
    .then(function (response) {
      $scope.segmentlist = response.data; });
  }
};

$scope.editDatapointAfter2Cont = function()
{
  if($scope.editSegment.segment_id != '')
  {
    indicatorService.listindicatorbyid($scope.editSegment.segment_id)
    .then(function (response) {
      $scope.indicatorlist = response.data; });
  }
};



$scope.deleteDatapointCont = function(datapoint){
  var result = confirm("Are you sure delete this record?");
  if (result) {
   datapointService.removedatapoint(datapoint)
   .then(function(response){ 
    var index=$scope.datapoints.indexOf(datapoint)
    $scope.datapoints.splice(index,1);
  });
 };
};  


$scope.saveDatapointCont = function(row_index) {
 datapointService.savedatapoint($scope.editdatapoint
                                // $scope.editFactor.factor_id,
                                // $scope.editSegment.segment_id,
                                // $scope.editIndicator.segment_id,
                                // $scope.editCity.city_id
                                )
 .then(function(response){ 
  $scope.statusval = 'success_editdatapoint';
  //$scope.datapoints[row_index] = angular.copy(response.data);
  // window.alert(row_index);
  $scope.datapoints[row_index].data_point = $scope.editdatapoint.data_point;
});
};


$scope.editDatapointCont = function(datapoint, index)
{
 // factorService.listfactor()
 // .then(function (response) {
 //  $scope.factorlist = response.data; });

// cityService.listCities()
//  .then(function (response) {
//   $scope.citylist = response.data; });


 $scope.editdatapoint = angular.copy(datapoint);
// window.alert(index);
 $scope.row_index = index;
 $scope.statusval = '';
 // $scope.segmentlist = {};
};

$scope.sort = function(sortkey){
  $scope.sortkey = sortkey;
  $scope.reverse = !$scope.reverse;

};

});
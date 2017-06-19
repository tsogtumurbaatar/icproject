app.controller("myIndicatorController", function($scope, factorService, segmentService, indicatorService){

  getIndicatorsCont();
  $scope.itemsPerPageVal = 10;
  $scope.statusval = '';

  function getIndicatorsCont() {
    indicatorService.listindicator()
    .then(function (response) {
      $scope.indicators = response.data;
    }, function (error) {
      $scope.status = 'Unable to load customer data: ' + error.message;
    });
  };

  $scope.insertIndicatorCont = function() {
    var flag = 1;
    
    if(!$scope.new_indicator_name)
    {
     flag = 0;
     window.alert('The indicator name is empty!');
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


   if(flag)
   {
    indicatorService.addindicator($scope.new_indicator_name, 
      $scope.new_indicator_desc, 
      $scope.selectedFactor.factor_id,
      $scope.selectedSegment.segment_id
      )
    .then(function(response){ 
      $scope.statusval = 'success_newindicator';
      $scope.indicators.push(response.data);
    });
  }
};

$scope.insertDictionCont = function() {   
  indicatorService.adddiction($scope.new_indicator_id, 
    $scope.range1_min,
    $scope.range1_max,
    $scope.range2_min,
    $scope.range2_max,
    $scope.range3_min,
    $scope.range3_max,
    $scope.range4_min,
    $scope.range4_max,
    $scope.range5_min,
    $scope.range5_max      
    )
  .then(function(response){ 
    $scope.statusval = 'success_newdiction';
  });
  
};

$scope.insertIndicatorBefortCont = function()
{
  factorService.listfactor()
  .then(function (response) {
    $scope.factorlist = response.data; });

  $scope.new_indicator_name = '';
  $scope.new_indicator_desc = '';
  $scope.statusval = '';
  $scope.segmentlist = {};
};

$scope.insertIndicatorAfterCont = function()
{
  if($scope.selectedFactor.factor_id != '')
  {
    segmentService.listsegmentbyid($scope.selectedFactor.factor_id)
    .then(function (response) {
      $scope.segmentlist = response.data; });
  }
};

$scope.editIndicatorAfterCont = function()
{
  if($scope.editFactor.factor_id != '')
  {
    segmentService.listsegmentbyid($scope.editFactor.factor_id)
    .then(function (response) {
      $scope.segmentlist = response.data; });
  }
};



$scope.deleteIndicatorCont = function(indicator){
  var result = confirm("Are you sure delete this record?");
  if (result) {
   indicatorService.removeindicator(indicator)
   .then(function(response){ 
    var index=$scope.indicators.indexOf(indicator)
    $scope.indicators.splice(index,1);
  });
 };
};  


$scope.saveIndicatorCont = function(row_index) {
 indicatorService.saveindicator($scope.editindicator, 
  $scope.editFactor.factor_id,
  $scope.editSegment.segment_id)
 .then(function(response){ 
  $scope.statusval = 'success_editindicator';
  $scope.indicators[row_index] = angular.copy(response.data);
  // $scope.indicators[row_index] = angular.copy($scope.editindicator);
});
};


$scope.editIndicatorCont = function(indicator, index)
{
 factorService.listfactor()
 .then(function (response) {
  $scope.factorlist = response.data; });

 $scope.editindicator = angular.copy(indicator);

 $scope.row_index = index;
 $scope.statusval = '';
 $scope.segmentlist = {};
};

$scope.dataIndicatorCont = function(indicator)
{
 $scope.indicator_name = indicator.indicator_name;
 $scope.new_indicator_id = indicator.indicator_id;
 
 indicatorService.findDictionByID(indicator.indicator_id)
 .then(function (response) {
  $scope.diction_data = response.data; 
 
  if(Object.keys($scope.diction_data).length != 0)
  {
  $scope.range1_min = $scope.diction_data.range1_min;
  $scope.range1_max = $scope.diction_data.range1_max;
  $scope.range2_min = $scope.diction_data.range2_min;
  $scope.range2_max = $scope.diction_data.range2_max;
  $scope.range3_min = $scope.diction_data.range3_min;
  $scope.range3_max = $scope.diction_data.range3_max;
  $scope.range4_min = $scope.diction_data.range4_min;
  $scope.range4_max = $scope.diction_data.range4_max;
  $scope.range5_min = $scope.diction_data.range5_min;
  $scope.range5_max = $scope.diction_data.range5_max;
  }
  else
  {
  $scope.range1_min = 0;
  $scope.range1_max = 0;
  $scope.range2_min = 0;
  $scope.range2_max = 0;
  $scope.range3_min = 0;
  $scope.range3_max = 0;
  $scope.range4_min = 0;
  $scope.range4_max = 0;
  $scope.range5_min = 0;
  $scope.range5_max = 0;
  }
});

 $scope.statusval = '';
};



$scope.sort = function(sortkey){
  $scope.sortkey = sortkey;
  $scope.reverse = !$scope.reverse;

};

});
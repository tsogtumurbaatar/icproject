app.controller("myCreateChartController", function($scope, factorService, segmentService, indicatorService, $timeout){

  getFactorsCont();
  

  function getFactorsCont() {
    factorService.listfactor()
    .then(function (response) {
      $scope.factorlist = response.data;
    }, function (error) {
      $scope.status = 'Unable to load customer data: ' + error.message;
    });
  };
  

$scope.getSegmentsCont = function()
{
  if($scope.selectedFactor.factor_id != '')
  {
    segmentService.listsegmentbyid($scope.selectedFactor.factor_id)
    .then(function (response) {
      $scope.segmentlist = response.data; });
  }

$scope.indicatorlist = {};
$scope.selectedResource = '';
};

$scope.getIndicatorsCont = function()
{
  

  if($scope.selectedSegment.segment_id != '')
  {
    indicatorService.listindicatorbyid($scope.selectedSegment.segment_id)
    .then(function (response) {
    $scope.indicatorlist = response.data; });
    
    setTimeout(function() {
          $scope.$apply(function() {
          $scope.segmentvalue = $scope.selectedSegment.segment_id;
          }, 1000);
        });
  }

};


});
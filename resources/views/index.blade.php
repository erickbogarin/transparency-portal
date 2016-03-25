<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Upload de arquivos</title>
	<style type="text/css">
	.thumb {
	    width: 24px;
	    height: 24px;
	    float: none;
	    position: relative;
	    top: 7px;
	}
	</style>
</head>
<body ng-app="fileUpload" ng-controller="MyCtrl">
  <form name="myForm">
    <fieldset>
      <legend>Upload on form submit</legend>
      <br>Arquivo:
      <input type="file" ngf-select ng-model="file" name="file"    
             accept="pdf/*"  ngf-pattern="'.pdf'"  required
             ngf-model-invalid="errorFile">
      <br><i ng-show="myForm.file.$error.pattern">O arquivo deve ser no formato  <strong>PDF</strong>.</i><br>
      <i ng-show="myForm.file.$error.maxSize">O tamanho do arquivo atual é 
          {{errorFile.size / 1000000|number:1}}MB, o limite é até 2MB.</i>
      <br>
	  <span class="progress" ng-show="file.progress">
        <div style="width:{{file.progress}}%" 
            ng-bind="file.progress + '%'"></div>
      </span>	
      <button ng-disabled="!myForm.$valid" 
              ng-click="upload(file)">Submit</button>
      <span class="err" ng-show="errorMsg">{{errorMsg}}</span>
    </fieldset>
    <br>
  </form>

<!-- Angular JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.1/angular.min.js"></script>
<script src="js/lib/ng-file-upload-shim.js"></script>
<script src="js/lib/ng-file-upload.min.js"></script>

<script type="text/javascript">
	
	var app = angular.module('fileUpload', ['ngFileUpload']);

	app.controller('MyCtrl', ['$scope', 'Upload', function ($scope, Upload) {
	    $scope.upload = function(file) {
	    file.upload = Upload.upload({
	      url: '/public/upload',
	      method: 'POST',
	      data: {file: file, name: 'Erick    luan', tpId: 163}
	    }).then(function (resp) {
            console.log('Success ' + resp.config.data.file.name + ' uploaded. Response: ' + resp.data, resp.status);
        }, function (resp) {
        	$scope.errorMsg = resp.status + ': ' + resp.data;
            console.log('Error status: ' + resp.status);
        }, function (evt) {
        	var progressMsg;
            file.progress = parseInt(100.0 * evt.loaded / evt.total);
            if(file.progress == 100) progressMsg = 'Enviado: '; else progressMsg = 'Enviando arquivo para o servidor: ';
            file.progress = progressMsg +  file.progress;
            console.log('progress: ' + file.progress + '% ' + evt.config.data.file.name);
        });

	    
	    }
	}]);
</script>
</body>
</html>
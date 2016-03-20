angular.module('myServices', [])
	.factory('dataFactory', function($http) {
		var myService = {
			httpRequest: function(url,method,params,dataPost,upload) {
				var passParameters = {};
				passParameters.url = url;
	
				if (typeof method == 'undefined'){
					passParameters.method = 'GET';
				}else{
					passParameters.method = method;
				}

				if (typeof params != 'undefined'){
					passParameters.params = params;
				}

				if (typeof dataPost != 'undefined'){
					passParameters.data = dataPost;
				}

				if (typeof upload != 'undefined'){
					passParameters.upload = upload;
				}

				var promise = $http(passParameters).then(function (response) {
					if(typeof response.data == 'string' && response.data != 1){
						if(response.data.substr('loginMark')){
							location.reload();
							return;
						}
						$.gritter.add({
							title: 'Application',
							text: response.data
						});
						return false;
					}
					if(response.data.jsMessage){
						$.gritter.add({
							title: response.data.jsTitle,
							text: response.data.jsMessage
						});
					}
					return response.data;
				},function(){

					$.gritter.add({
						title: 'Application',
						text: 'An error occured while processing your request.'
					});
				});
				return promise;
			}
		};
		return myService;
	})
	.factory('fileUpload', function ($http) {
	    var fileUpload = { 
	    	uploadFileToUrl: function(file, uploadUrl) {
	        var fd = new FormData();
	        fd.append('file', file);
	        $http.post(uploadUrl, fd, {
	            transformRequest: angular.identity,
	            headers: {'Content-Type': undefined}
	        }).success(function(){
		    }).error(function(){
		    });}
		};
		return fileUpload;
	});


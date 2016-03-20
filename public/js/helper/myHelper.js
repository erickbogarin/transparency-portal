function apiModifyTable(originalData,id,response){
	angular.forEach(originalData, function (item,key) {
		if(item.id == id){
			originalData[key] = response;
		}
	});
	return originalData;
}

function convertDataPattern(data) {
	var dataFormatted = data;
	dataFormatted = dataFormatted.getFullYear() + '-' + (dataFormatted.getMonth() + 1) + '-' + dataFormatted.getDate();
	return dataFormatted;
}

function convertToLocaleDate(date) {
	return new Date(date).toLocaleDateString().toString().substring(4, 10);
}
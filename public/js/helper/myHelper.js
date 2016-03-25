function apiModifyTable(originalData,id,response){
	angular.forEach(originalData, function (item,key) {
		if(item.id == id){
			originalData[key] = response;
		}
	});
	return originalData;
}

function formatDataPattern(date) {
	return date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();
}

function convertToLocaleDate(date) {
	return new Date(date).toLocaleDateString().toString().substring(4, 10);
}

function prepareFormEditDatePattern(date) {
	return new Date(date.replace(/-/, '/'));
}

function clearStringFileName(fileName) {
	return fileName.replace(/\s+/g, '-')
}
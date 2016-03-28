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

function randomString(x){
    var s = "";
    while(s.length<x&&x>0){
        var r = Math.random();
        s+= (r<0.1?Math.floor(r*100):String.fromCharCode(Math.floor(r*26) + (r>0.5?97:65)));
    }
    return s;
}

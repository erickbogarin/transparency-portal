
angular.module('ptm', ['directives', 'ui.router','satellizer', 'ngResource', 'angularUtils.directives.dirPagination',
    'ngFileUpload', 'myServices']).config(require('./main.js'));

require('./services');
require('./directives');
require('./controllers');
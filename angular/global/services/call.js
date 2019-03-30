// httpCall factory
angular
    .module('ig')
    .factory("httpCall", httpCall);

httpCall.$inject = ['$http'];

function httpCall($http) {
    return {
        post: post,
        get: get,
        postDefault: postDefault
    };

    function post(url, data) {
        $http.defaults.headers.post['Content-Type'] =
            'application/x-www-form-urlencoded;charset=utf-8';
        $http.defaults.headers.post['Access-Control-Allow-Origin'] = "*";
        $http.defaults.transformRequest = function(data) {
            if (data != undefined) return $.param(data);
        };
        return $http.post(url, data);
    }

    function get(url) {
       return $http.get(url);
    }

    function postDefault(url) {
        return post(url, { 'httpCall': true });
    }
}

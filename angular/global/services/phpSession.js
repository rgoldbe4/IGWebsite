// httpCall factory
angular
    .module('ig')
    .factory("phpSession", phpSession);

phpSession.$inject = ['httpCall'];

function phpSession(httpCall) {
    return {
        getData: getData,
        logout: logout
    };

    function getData() {
        return httpCall.get("/api/global/session.php");
    }

    function logout() {
        return httpCall.post("/api/mc/handle_logout.php", {});
    }

}

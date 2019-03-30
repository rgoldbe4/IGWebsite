angular
    .module("ig", [])
    .controller("AdminIndexController", AdminIndexController);

AdminIndexController.$inject = ['httpCall', '$timeout', 'phpSession'];

function AdminIndexController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.logout = logout;

    /* Variables */

    init();

    function init() {
        phpSession.getData().then(
            function(response) {
                vm.sessionData = response.data;
                if (!vm.sessionData || !vm.sessionData.power || vm.sessionData.power <= 0) {
                    window.location.href="login.php";
                }
            }
        );
    }

    function logout() {
        phpSession.logout().then(
            function (response) {
                if (response.data.result)
                    window.location.href="login.php";
            }
        );
    }


}

angular
    .module("ig", [])
    .controller("AdminLoginController", AdminLoginController);

AdminLoginController.$inject = ['httpCall', '$timeout', 'phpSession'];

function AdminLoginController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.login = login;


    /* Variables */
    vm.error = "";
    vm.sessionData = [];
    vm.staffList = [];

    init();

    function init() {
        phpSession.getData().then(
            function(response) {
                vm.sessionData = response.data;
                if (!(!vm.sessionData || !vm.sessionData.power || vm.sessionData.power <= 0)) {
                    console.log(vm.sessionData.power);
                    window.location.href = "index.php";
                }
            }
        );
    }

    function login() {
        if (!vm.username || !vm.password || vm.username.length == 0 || vm.password.length == 0) {
            vm.error = "Please fill out all fields.";
        } else {
            httpCall.post("/api/mc/admin/post_login.php",
                          {username: vm.username, password: vm.password}).then(
                function (response) {
                    if (response.data.result) {
                        window.location.href="index.php";
                    } else {
                        vm.error = "Your account was not recognized.";
                    }
                }
            );
        }
    }


}

angular
    .module("ig", [])
    .controller("RegisterController", RegisterController);

RegisterController.$inject = ['httpCall', '$timeout'];

function RegisterController(httpCall, $timeout) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.register = register;

    /* Variables */
    vm.error = "";

    init();

    function init() {
    }


    function register() {
        if (vm.username && vm.username.length > 0 && vm.password && vm.password.length > 0) {
            httpCall.post("/api/mc/handle_register.php", { username: vm.username, password: vm.password }).then(function (response) {
                response = response.data;
                console.log(response);
                if (response.result) {
                    //Login to shop with userID, playerID, and username.
                    httpCall.post("/api/mc/login_to_session.php", { ID: response.data.ID, username: response.data.username, playerID: response.data.playerID }).then(function (response) {
                        if (response.data.result) window.location.href = "shopv2.php";
                    });
                } else {
                    vm.error = response.message;
                }
            });
        } else {
            vm.error = "All fields are required to continue.";
        }
    }

}

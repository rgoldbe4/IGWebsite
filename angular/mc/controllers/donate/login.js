angular
    .module("ig", [])
    .controller("LoginController", LoginController);

LoginController.$inject = ['httpCall', '$timeout'];

function LoginController(httpCall, $timeout) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.login = login;

    /* Variables */
    vm.error = "";


    function login() {
        if (vm.username && vm.username.length > 0 && vm.password && vm.password.length > 0) {
            httpCall.post("/api/mc/handle_login.php", { username: vm.username, password: vm.password }).then(function (response) {
                var data = response.data.data;
                var result = response.data.result;
                console.log(response);
                if (data) {
                    //Login to shop with userID, playerID, and username.
                    httpCall.post("/api/mc/login_to_session.php", { ID: data.ID, username: data.username, playerID: data.playerID }).then(
                        function (response) {
                            if (result) window.location.href = "shop.php";
                        }
                    );
                } else {
                    vm.error = "The information you entered was not found.";
                }
            });
        } else {
            vm.error = "All fields are required to continue.";
        }
    }

}

angular
    .module("ig", [])
    .controller("LinkController", LinkController);

LinkController.$inject = ['httpCall', '$timeout', 'phpSession'];

function LinkController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.login = login;
    vm.register = register;
    vm.generateToken = generateToken;
    vm.toggleShowRegister = toggleShowRegister;

    /* Variables */
    vm.error = "";
    vm.isLoggedIn = false;
    vm.hasCode = false;
    vm.tokenData = [];
    vm.sessionData = [];
    vm.token = "";
    vm.showRegister = false;


    init();

    function login() {
        if (vm.username && vm.username.length > 0 && vm.password && vm.password.length > 0) {
            httpCall.post("/api/mc/handle_login.php", { username: vm.username, password: vm.password }).then(function (response) {
                var data = response.data.data;
                var result = response.data.result;
                if (data) {
                    //Login to shop with userID, playerID, and username.
                    httpCall.post("/api/mc/login_to_session.php", { ID: data.ID, username: data.username, playerID: data.playerID }).then(
                        function (response) {
                            init();
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

    function register() {
        if (vm.username && vm.username.length > 0 && vm.password && vm.password.length > 0) {
            httpCall.post("/api/mc/handle_register.php", { username: vm.username, password: vm.password }).then(function (response) {
                response = response.data;
                console.log(response);
                if (response.result) {
                    //Login to shop with userID, playerID, and username.
                    httpCall.post("/api/mc/login_to_session.php", { ID: response.data.ID, username: response.data.username, playerID: response.data.playerID }).then(function (response) {
                       init();
                    });
                } else {
                    vm.error = response.message;
                }
            });
        } else {
            vm.error = "All fields are required to continue.";
        }
    }

    function init() {
        phpSession.getData().then( function(response) {
            vm.sessionData = response.data;
            if (vm.sessionData.userID) vm.isLoggedIn = true;
            if (vm.isLoggedIn) {
                //Check if they have a code already.
                httpCall.post("/api/mc/has_token.php").then(
                    function (response) {
                        console.log(response);
                        vm.hasCode = response.data.hasCode;
                        vm.tokenData = response.data.data;
                        if (vm.hasCode) vm.token = vm.tokenData.code;
                    }
                );
            }
        });
    }

    function generateToken() {
        httpCall.post("/api/mc/get_token.php", { userID: vm.sessionData.userID }).then(
            function (response) {
                vm.token = response.data.replace("\"","").replace("\"","");
            }
        );
    }

    function toggleShowRegister() {
        vm.showRegister = !vm.showRegister;
    }

}

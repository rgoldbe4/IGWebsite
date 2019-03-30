angular
    .module("ig", [])
    .controller("AdminUserController", AdminUserController);

AdminUserController.$inject = ['httpCall', '$timeout', 'phpSession'];

function AdminUserController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.logout = logout;
    vm.toggleAdd = toggleAdd;


    /* Variables */
    vm.staffList = [];
    vm.showAddUser = false;

    init();

    function init() {
        phpSession.getData().then(
            function(response) {
                vm.sessionData = response.data;
                if (!vm.sessionData || !vm.sessionData.power || vm.sessionData.power <= 0) {
                    window.location.href="login.php";
                }
                httpCall.post("/api/mc/admin/staff_list.php", {}).then(
                    function (response) {
                        console.log(response);
                        vm.staffList = response.data;
                    }
                );
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

    function toggleAdd() {
        vm.showAddUser = !vm.showAddUser;
    }


}

angular
    .module("ig", [])
    .controller("GangController", GangController);

GangController.$inject = ['httpCall', '$timeout', 'phpSession'];

function GangController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.getPlayer = getPlayer;
    vm.getRank = getRank;
    vm.logout = logout;


    /* Variables */
    vm.gangs = [];
    vm.players = [];
    vm.ranks = [];
    vm.sessionData = [];
    vm.pageLoaded = false;


    init();

    function init() {
        httpCall.post("/api/mc/admin/gang_data.php", {}).then(
            function (response) {
                vm.gangs = response.data.gangData;
                httpCall.post("/api/mc/player_list.php", {}).then(
                    function (response) {
                        vm.players = response.data.players;
                        httpCall.post("/api/mc/admin/gang_ranks.php", {}).then(
                            function (response) {
                                vm.ranks = response.data;
                                phpSession.getData().then(
                                    function (response) {
                                        vm.sessionData = response.data;
                                        if (!vm.sessionData || !vm.sessionData.power || vm.sessionData.power <= 0) {
                                            window.location.href="login.php";
                                        }
                                        vm.pageLoaded = true;
                                    }
                                );
                            }
                        );
                    }
                );
            }
        );
    }

    function getPlayer(id) {
        var player = null;
        vm.players.forEach(
            function (item) {
                if (item.ID === id) player = item;
            }
        );

        return player;
    }

    function getRank(id) {
        var rank = null;
        vm.ranks.forEach(
            function (item) {
                if (item.ID === id) rank = item;
            }
        );
        return rank;
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

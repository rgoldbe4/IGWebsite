angular
    .module("ig", [])
    .controller("AdminLookupController", AdminLookupController);

AdminLookupController.$inject = ['httpCall', '$timeout', 'phpSession'];

function AdminLookupController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.logout = logout;
    vm.toggleAdd = toggleAdd;
    vm.selectPlayer = selectPlayer;
    vm.getPlayerData = getPlayerData;
    vm.getPlayerById = getPlayerById;

    /* Variables */
    vm.playerList = [];
    vm.showAddBan = false;
    vm.showEditBan = false;
    vm.showEditSolitary = false;
    vm.editedBan = [];
    vm.editedSolitary = [];

    init();

    function init() {
        phpSession.getData().then(
            function(response) {
                vm.sessionData = response.data;
                if (!vm.sessionData || !vm.sessionData.power || vm.sessionData.power <= 0) {
                    window.location.href="login.php";
                }
                httpCall.post("/api/mc/player_list.php", {}).then(
                    function (response) {
                        vm.playerList = response.data.players;
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
        vm.showAddBan = !vm.showAddBan;
    }

    function selectPlayer(player) {
        vm.username = "";
        vm.selectedPlayer = player;
        vm.selectedTab = 'general'; //Make the general tab default.
        vm.getPlayerData();
    }

    function getPlayerData() {
        httpCall.post("/api/mc/admin/get_player_data.php", { playerId: vm.selectedPlayer.ID }).then(
            function (response) {
                vm.playerData = response.data;
            }
        );
    }

    function getPlayerById(id) {
        var pl = vm.playerList[0];
        vm.playerList.forEach(
            function(player) {
                if (player.ID == id) pl = player;
            }
        );

        return pl;
    }

    function editBan(ban) {
        vm.editedBan = ban;
        vm.showEditBan = true;
    }

    function editSolitary(solitary) {
        vm.editedSolitary = solitary;
        vm.showEditSolitary = true;
    }

}

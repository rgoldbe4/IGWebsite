angular
    .module("ig", [])
    .controller("AnnouncementController", AnnouncementController);

AnnouncementController.$inject = ['httpCall', '$timeout', 'phpSession'];

function AnnouncementController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.save = save;
    vm.add = add;
    vm.toggleAdd = toggleAdd;
    vm.remove = remove;
    vm.addColor = addColor;
    vm.logout = logout;

    /* Variables */
    vm.announcements = [];
    vm.sessionData = [];
    vm.announcement = { text: "", ID: -1, staff: 0 };
    vm.showAddAnnouncement = false;

    init();

    function init() {
        httpCall.post("/api/mc/admin/get_announcements.php", {}).then(
            function (response) {
                vm.announcements = response.data;
                phpSession.getData().then (
                    function (response) {
                        vm.sessionData = response.data;
                        if (!vm.sessionData || !vm.sessionData.power || vm.sessionData.power <= 0) {
                            window.location.href="login.php";
                        }
                    }
                );
            }
        );
    }

    function save() {
        httpCall.post("/api/mc/admin/post_announcements.php", {announcements: vm.announcements}).then(
            function (response) {
                console.log(response);
                vm.announcements = response.data;
            }
        );
    }

    function add() {
        if (vm.announcement.text && vm.announcement.text.length > 10) {
            if (vm.announcement.staff) vm.announcement.staff = 1;
            vm.announcements.push(vm.announcement);
            vm.announcement = { text: "", ID: -1, staff: 0 };
            vm.toggleAdd();
            vm.error = "";
        } else {
            vm.error = "You must enter in an announcement with at least 10 characters.";
        }
    }

    function remove(announcement) {
        var index = vm.announcements.indexOf(announcement);
        vm.announcements.splice(index, 1);
        httpCall.post("/api/mc/admin/delete_announcement.php", {announcement: announcement}).then (
            function (response) {
                console.log(response);
            }
        );
    }

    function toggleAdd() {
        vm.showAddAnnouncement = !vm.showAddAnnouncement;
    }

    function addColor(label) {
        vm.announcement.text += "&" + label;
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

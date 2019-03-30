angular
    .module("ig", [])
    .controller("ShopController", ShopController);

ShopController.$inject = ['httpCall', '$timeout', 'phpSession'];

function ShopController(httpCall, $timeout, phpSession) {

    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.selectShop = selectShop;
    vm.selectTab = selectTab;
    vm.addToCart = addToCart;
    vm.removeFromCart = removeFromCart;
    vm.toggleCart = toggleCart;
    vm.isItemVisible = isItemVisible;
    vm.buyByMoney = buyByMoney;
    vm.buyByPoints = buyByPoints;

    /* Variables */
    vm.shopData = [];
    vm.selectedShop = [];
    vm.selectedTab = [];
    vm.cart = [];
    vm.currencies = [];
    vm.pageLoaded = false;
    vm.viewCart = false;

    init();

    function init() {

        httpCall.get("/api/mc/onload_shop.php").then(function (response) {
            vm.shopData = response.data;
            vm.selectedShop = vm.shopData[0];
            vm.selectedTab = vm.selectedShop.tabs[0];

            httpCall.get("/api/mc/shop_currency.php").then(function (response) {
                vm.currencies = response.data;
                vm.pageLoaded = true;
            });
        });
    }

    /* Tab and Shop Selection */
    function selectShop(shop) {
        vm.selectedShop = shop;
    }

    function selectTab(tab) {
        vm.selectedTab = tab;
    }

    /* Cart System */
    function addToCart(item) {
        vm.cart.push(item);
    }

    function removeFromCart(item) {
        var itemLocatedAt = vm.cart.indexOf(item);
        vm.cart.splice(itemLocatedAt, 1);
    }

    function toggleCart() {
        if (vm.viewCart)
            vm.viewCart = false;
        else
            vm.viewCart = true;
    }

    function isItemVisible(item) {
        //Logic:
        if (vm.cart.includes(item)) {
            if (vm.viewCart) {
                return true;
            }
        } else {
            if (!vm.viewCart) {
                return true;
            }
        }
        return false;
    }


    function buyByMoney(item) {
        return item.currencyTypeID === "2";
    }

    function buyByPoints(item) {
        return item.currencyTypeID === "1";
    }


}

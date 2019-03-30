angular
    .module("ig", [])
    .controller("ShopController", ShopController);

ShopController.$inject = ['httpCall', '$timeout', 'phpSession'];

function ShopController(httpCall, $timeout, phpSession) {
/* jshint validthis: true */
    var vm = this;
    window.vm = vm;

    /* Functions */
    vm.selectShop = selectShop;
    vm.selectTab = selectTab;
    vm.addToCart = addToCart;
    vm.removeFromCart = removeFromCart;
    vm.getPrice = getPrice;
    vm.isVisible = isVisible;
    vm.hasSale = hasSale;
    vm.getSalePercentage = getSalePercentage;
    vm.getSaleAmount = getSaleAmount;
    vm.getCartTotal = getCartTotal;
    vm.canPurchaseWithDefiancePoints = canPurchaseWithDefiancePoints;
    vm.canBuyWithMoney = canBuyWithMoney;

    /* Variables */
    vm.sessionData = [];
    vm.hasSession = false;
    vm.hasPlayerID = false;
    vm.pageLoaded = false;

    vm.shopData = [];
    vm.cart = [];
    vm.selectedTab = [];
    vm.selectedShop = [];

    init();

    function init() {
        phpSession.getData().then(function (response) {
            vm.sessionData = response.data;
            vm.hasSession = vm.sessionData.username;
            vm.hasPlayerID = vm.sessionData.playerID && vm.sessionData.playerID > 0;

            httpCall.get("/api/mc/onload_shop.php").then(function (response) {
                vm.shopData = response.data;
                vm.selectedShop = vm.shopData[0];
                vm.selectedTab = vm.selectedShop.tabs[0];
                vm.pageLoaded = true;
            });
        });
    }


    function selectShop(shop) {
        vm.selectedShop = shop;
    }

    function selectTab(tab) {
        vm.selectedTab = tab;
    }

    function addToCart(item) {
        toastr.clear();
        vm.cart.push(item);
        toastr.success("\"" + item.label + "\" was added to your cart!", 'Item Added');
    }

    function removeFromCart(item) {
        toastr.clear();
        var itemLocatedAt = vm.cart.indexOf(item);
        vm.cart.splice(itemLocatedAt, 1);
        toastr.error("\"" + item.label + "\" was remove from your cart!", 'Item Removed');
    }

    function getPrice(item) {
        var price = parseFloat(item.price);
        //Determine if there's a sale.
        if (hasSale(item)) {
            price = (price) - (price * getSaleAmount(item));
        }
        return "$" + price.toFixed(2);
    }

    function isVisible(item) {
        return item.visible === "1";
    }

    function hasSale(item) {
        return item.sale !== "0";
    }

    function getSalePercentage(item) {
        if (hasSale(item)) {
            var salePercent = getSaleAmount(item) * 100;
            return salePercent;
        }
        return "";
    }

    function getSaleAmount(item) {
        if (hasSale(item)) {
            var saleAmt = parseFloat(item.sale);
            return saleAmt;
        } else {
            return 0;
        }
    }

    function getCartTotal() {
        var total = 0.0;
        vm.cart.forEach(function(item, i) {
            total += getConvertedPrice(item);
        });

        return total.toFixed(2);
    }

    function canBuyWithMoney() {
        return (getCartTotal() > 0);
    }

    function getConvertedPrice(item) {
        var price = parseFloat(item.price);
        //Determine if there's a sale.
        if (hasSale(item)) {
            price = (price) - (price * getSaleAmount(item));
        }
        return price;
    }

    function canPurchaseWithDefiancePoints() {
        //Conditions: User must have a valid session AND playerID must be found AND must be buying ONLY items with defiance points.
        if (!vm.hasSession) return false;
        if (!vm.sessionData.playerID) return false;
        if (vm.cart.length == 0) return false;
        var canBuy = true;

        vm.cart.forEach(function (item) {
            //Get defiance points
            var defPoints = parseInt(item.defiancepoints);
            if (defPoints == -1) canBuy = false;
        });

        return canBuy;
    }

}

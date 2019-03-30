<?php
session_start();
set_include_path("/home/buffsove/public_html/");
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Donate</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <style>
        .margin-top-10 {
            margin-top: 10px;
        }
        .active-shop-tab {
            background-color: lightgray;
        }
        .shop-tab:hover {
            background-color: lightgray;
        }
        .top-0 {
            top: 0;
        }
        .badge {
            min-width: 50px;
        }
        .sale  {
            color: darkslateblue;
        }
        /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
        .modal {
            position:   fixed;
            z-index:    1000;
            top:        0;
            left:       0;
            height:     100%;
            width:      100%;
            background: rgba( 255, 255, 255, .8 )
                        url('/resources/ajax-loader.gif')
                        50% 50%
                        no-repeat;
            display: block;
            overflow: hidden;
        }
    </style>
    <body data-ng-app="ig">
        <script src="/angular/mc/controllers/donate/shop.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="ShopController as vm" class="container h-100">
            <div class="w-100 h-100" data-ng-if="vm.pageLoaded">
                <div class="row text-center h-100 w-100">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                          <a class="navbar-brand" href="#">Ignition Gaming</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse" id="navbarColor01">
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item"  data-ng-repeat="shop in vm.shopData" data-ng-class="{'active':(vm.selectedShop.ID==shop.ID)}">
                                <a class="nav-link" href="#" data-ng-click="vm.selectShop(shop);">{{ shop.label }}</a>
                              </li>
                            </ul>
                            <span class="navbar-text">
                                <a class="btn btn-info b" href="checkout_defiancepoints.php" data-ng-if="vm.canPurchaseWithDefiancePoints()">
                                    <img src="/resources/open-iconic/svg/cart.svg" class="icon-large" /> Checkout with Defiance Points
                                </a>
                                <a class="btn btn-success b" href="checkout.php" data-ng-if="vm.canBuyWithMoney()">
                                    <img src="/resources/open-iconic/svg/cart.svg" class="icon-large" />
                                        Checkout (
                                        <span class="">${{ vm.getCartTotal(); }}</span>
                                        )
                                </a>


                                <a data-ng-if="vm.hasSession" href="logout.php" class="btn btn-warning b">
                                    <img src="/resources/open-iconic/svg/circle-x.svg" class="icon-large" /> Logout
                                </a>
                                <a data-ng-if="!vm.hasSession" href="login.php" class="btn btn-success b">
                                    <img src="/resources/open-iconic/svg/circle-check.svg" class="icon-large" /> Login
                                </a>
                            </span>
                          </div>
                        </nav>

                        <div class="row margin-top-10">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-center h3">Select a Tab</div>
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center cursor-hand shop-tab" data-ng-class="{'active-shop-tab':vm.selectedTab.ID==tab.ID}"data-ng-click="vm.selectTab(tab);" data-ng-repeat="tab in vm.selectedShop.tabs">
                                            {{ tab.label }}
                                                <span class="badge badge-primary">{{ tab.items.length }} Items</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row margin-top-10">
                                    <div class="col">
                                        <div class="text-center h3">Your Cart ({{ vm.cart.length }})</div>
                                        <table class="table table-striped">
                                            <tr data-ng-if="vm.cart.length == 0" class="table-danger">
                                                <td>You have no items in your cart.</td>
                                            </tr>
                                            <tr data-ng-repeat="item in vm.cart" data-ng-if="vm.cart.length > 0">
                                                <td>
                                                    <img src="/resources/open-iconic/svg/circle-x.svg" class="icon-small cursor-hand" align="middle" data-ng-click="vm.removeFromCart(item);" />
                                                </td>
                                                <td class="text-center">
                                                    <i data-ng-bind="item.label"></i>
                                                </td>
                                                <td class="text-right">
                                                    <span class="badge badge-success" data-ng-bind="vm.getPrice(item);"></span>
                                                    <span class="badge badge-info" data-ng-bind="item.defiancepoints" data-ng-if="item.defiancepoints !== '-1'"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row" data-ng-repeat="item in vm.selectedTab.items" data-ng-show="vm.isVisible(item);">
                                    <div class="col text-left">
                                        <div class="card border-secondary mb-3">
                                            <div class="card-header b h3">
                                                <img data-ng-src="/resources/open-iconic/svg/{{item.icon}}.svg" class="default-icon" />
                                                <span data-ng-bind="item.label"></span>

                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title b">
                                                    <span class="money" data-ng-bind="vm.getPrice(item);"></span>
                                                    <span data-ng-if="vm.hasSale(item);"> - <span class="sale" data-ng-bind="vm.getSalePercentage(item) + '% Off!'"></span><br />
                                                    <div class="badge badge-info" data-ng-if="item.defiancepoints !== '-1'">{{item.defiancepoints}} Defiance Points</div>
                                                </h4>
                                                <p class="card-text i" >{{ item.description }}</p>
                                                <button type="button" data-ng-click="vm.addToCart(item);" data-ng-if="!vm.cart.includes(item);" class="btn btn-outline-primary float-right">Add To Cart</button>
                                                <button type="button" data-ng-click="vm.removeFromCart(item);" data-ng-if="vm.cart.includes(item);" class="btn btn-outline-danger float-right">Remove From Cart</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal" data-ng-if="!vm.pageLoaded"></div>
        </div>
    </body>
    <script>
    </script>
</html>

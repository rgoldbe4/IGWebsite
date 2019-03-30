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
        body {
            background-color: rgba(0,0,0,0.7);
        }
        .container {
            background-color: white;
        }
        .item-container {
            background-color: lightgray;
            border-radius: .25em;
            padding: 1em;
            height: 25%;
        }
        .color-purple {
            color: mediumpurple;
        }
    </style>
    <body data-ng-app="ig">
        <script src="/angular/mc/controllers/donate/shopv2.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="ShopController as vm" class="container h-100 align-items-center border-left border-right">

            <div class="row text-center h-100 w-100 no-margin">

                    <div class="col">

                        <div class="row padding-top padding-bottom">
                            <div class="col-md-5">
                                <span class="display-4">Ignition Gaming</span>
                            </div>
                            <div class="col-md-7 text-right">
                                <div class="btn btn-success" data-ng-click="vm.checkout();">
                                    Checkout
                                </div>
                            </div>
                        </div>

                        <div class="row padding-top padding-bottom">

                            <div class="col ">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item" data-ng-repeat="tab in vm.selectedShop.tabs">
                                        <a class="nav-link "
                                           data-ng-class="{'active': vm.selectedTab.ID == tab.ID}" href="#"
                                           data-ng-click="vm.selectTab(tab);"
                                        >
                                            {{ tab.label.toUpperCase() }}
                                        </a>
                                    </li>

                                </ul>



                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-left margin-left">

                                <div class="row padding-top padding-bottom">
                                    <div class="col-md-4 padding" data-ng-repeat="item in vm.selectedTab.items">
                                        <div class="card border-primary mb-3" style="max-width: 20rem; min-height: 200px;">
                                          <div class="card-body">
                                            <h4 class="card-title">{{ item.label }}</h4>
                                            <p class="card-text">

                                                {{ item.description }}


                                            </p>
                                          </div>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-if="!vm.cart.includes(item)"
                                                    data-ng-click="vm.addToCart(item);"
                                            >+Add To Cart</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-if="vm.cart.includes(item)"
                                                    data-ng-click="vm.removeFromCart(item);"
                                            >- Remove From Cart</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
        </div>
    </body>
    <script>
    </script>
</html>

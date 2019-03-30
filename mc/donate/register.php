<?php
session_start();
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Donate</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <style>
        td {
            min-width: 50%;
        }
    </style>
    <body data-ng-app="ig">
        <script src="/angular/mc/controllers/donate/register.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <div data-ng-controller="RegisterController as vm" class="container h-100 align-items-center">
            <div class="w-100 h-100 align-items-center" >

                <div class="row text-center h-100 w-100 align-items-center">
                    <div class="col">
                        <table class="table">
                            <tr>
                                <td colspan="2" class="text-center h1">Register To Ignition Gaming</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center lead text-info"><i><strong>Note:</strong> You will need to link your Minecraft or Steam account at a later time.</i></td>
                            </tr>
                            <tr class="table-danger" data-ng-if="vm.error.length">
                                <td colspan="2" class="text-center">{{ vm.error }}<a href="#" class="btn-sm float-right" data-ng-click="vm.error = undefined">X</a></td>
                            </tr>
                            <tr>
                                <td class="text-right"><label class="form-label">Username: </label></td>
                                <td><input type="text" data-ng-model="vm.username" class="form-control form-control-sm" /></td>
                            </tr>
                            <tr>
                                <td class="text-right">Password: </td>
                                <td><input type="password" data-ng-model="vm.password" class="form-control form-control-sm" /></td>
                            </tr>
                            <!--
                            <tr>
                                <td class="text-right">Search: </td>
                                <td><input type="text" data-ng-model="vm.search" id="search" class="form-control form-control-sm" placeholder="Search..."/></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <span class="text-danger" data-ng-if="!vm.search || vm.search.length < 3">You must enter <strong>three (3)</strong> characters in the search bar.</span>
                                    <div class="btn-group" data-ng-if="vm.search && vm.search.length >= 3" data-ng-repeat="player in vm.players | filter: vm.search">
                                        <label class="btn padding" data-ng-class="{ 'btn-outline-primary':vm.playerID != player.ID, 'btn-primary':vm.playerID == player.ID }" data-ng-click="vm.playerID = player.ID">
                                            {{ player.name.toUpperCase() }}
                                        </label>
                                    </div>
                                </td>

                            </tr>
                            -->
                            <tr>
                                <td colspan="2" class="text-center"><button class="btn btn-lg btn-success" type="button" data-ng-click="vm.register()">Create</button></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </body>
    <script>
    </script>
</html>

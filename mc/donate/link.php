<?php
session_start();
set_include_path("/home/buffsove/public_html/");
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Donate</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <body data-ng-app="ig">
        <script src="/angular/mc/controllers/donate/link.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="LinkController as vm" class="container h-100 align-items-center">
            <div class="w-100 h-100 align-items-center" >

                <div class="row text-center h-100 w-100 align-items-center">
                    <table class="table" data-ng-if="!vm.isLoggedIn && !vm.showRegister">
                        <tr>
                            <td colspan="2" class="text-center h1">Login To Ignition Gaming</td>
                        </tr>
                        <tr class="table-danger" data-ng-if="vm.error.length">
                            <td colspan="2" class="text-center">{{ vm.error }}<a href="#" class="btn-sm float-right" data-ng-click="vm.error = undefined">X</a></td>
                        </tr>
                        <tr>
                            <td class="text-right">Username: </td>
                            <td><input type="text" data-ng-model="vm.username" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">Password: </td>
                            <td><input type="password" data-ng-model="vm.password" class="form-control" /></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2">
                                <button class="btn btn-lg" type="button" data-ng-click="vm.login()">Login</button>

                                <button class="btn btn-lg btn-secondary" type="button" data-ng-click="vm.toggleShowRegister()">Create New Account</button>
                            </td>
                        </tr>
                    </table>

                    <table class="table" data-ng-if="vm.showRegister && !vm.isLoggedIn">
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
                        <tr>
                            <td  class="text-center" colspan="2">
                                <button class="btn btn-lg btn-success" type="button" data-ng-click="vm.register()">Create</button>

                                <button class="btn btn-lg" type="button" data-ng-click="vm.toggleShowRegister()">Go Back</button>
                            </td>
                        </tr>
                    </table>

                    <table class="table" data-ng-if="vm.isLoggedIn">
                        <tr>
                            <td colspan="2" class="text-center h2">Ignition Gaming - Connect Your Minecraft Account</td>
                        </tr>
                        <tr data-ng-if="vm.token.length == 0 && !vm.hasCode">
                            <td colspan="2" class="lead">
                                In order to link your account, you will need a code to type in. Please click "Generate Token" to generate a code for you to type in.
                            </td>
                        </tr>
                        <tr data-ng-if="vm.token.length == 0 && !vm.hasCode">
                            <td colspan="2" class="text-center"><a href="#" class="btn btn-primary" data-ng-click="vm.generateToken()">Generate Token</a></td>
                        </tr>
                        <tr data-ng-if="vm.token.length > 0">
                            <td colspan="2" class="lead text-center">
                                Please join our Ignition Gaming Minecraft server and type in the command below:<br /><br />
                                <code style="background-color:lightgray; padding: 10px;" class="border-radius">/link {{ vm.token }}</code><br /><br />
                                Done? <a href="shopv2.php">Start shopping</a>!
                            </td>
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </body>
    <script>
    </script>
</html>

<?php
session_start();
set_include_path("/home/buffsove/public_html/");
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Admin</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <body data-ng-app="ig">
        <script src="/angular/mc/controllers/admin/login.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="AdminLoginController as vm" class="container h-100 align-items-center">
            <div class="w-100 h-100 align-items-center" >

                <div class="row text-center h-100 w-100 align-items-center">

                    <table class="table">
                        <tr>
                            <td colspan="2" class="text-center h1">IGAdmin - Login</td>
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
                            <td colspan="2" class="text-center"><button class="btn btn-lg" type="button" data-ng-click="vm.login()">Login</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script>
    </script>
</html>

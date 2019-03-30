<?php
session_start();
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Admin</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <body class="background-gray" data-ng-app="ig">
        <script src="/angular/mc/controllers/admin/gang.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="GangController as vm" class="container background-white h-100 align-items-center">
            <div class="w-100 h-100 " >
                <div class="row h-100 w-100 no-margin">
                    <div class="col w-100 no-margin">

                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                          <a class="navbar-brand" href="#">IGAdmin</a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>

                          <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link"
                                   data-ng-if="vm.sessionData.power >= 3"
                                   href="announcements.php">Announcements</a>
                              </li>
                              <li class="nav-item active">
                                <a class="nav-link" data-ng-if="vm.sessionData.power >= 5" href="gang.php">Gangs</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-ng-if="vm.sessionData.power >= 7" href="users.php">Users</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-ng-if="vm.sessionData.power >= 7" href="lookup.php">Lookup</a>
                              </li>
                            </ul>
                            <form class="form-inline my-2 my-lg-0">
                                <button class="btn btn-secondary my-2 my-sm-0"
                                        type="button"
                                        data-ng-click="vm.logout();">Logout</button>
                            </form>
                          </div>
                        </nav>
                        <div class="row-spacer"></div>
                        <div class="row text-center" data-ng-if="vm.gangs">
                            <div class="col">
                                <h2>Gang Manager</h2>
                                <div class="alert alert-danger">
                                    This feature is disabled. Please try again later.
                                </div>
                            </div>
                        </div>
                        <div class="row padding-top">
                            <div class="col">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name</th>
                                        <th>Founder</th>
                                        <th>Bank Amount ($)</th>
                                        <th></th>
                                    </tr>
                                    <tr data-ng-repeat="gang in vm.gangs">
                                        <td>{{ gang.name }}</td>
                                        <td>{{ gang.founderID }}</td>
                                        <td>{{ gang.money }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning disabled">Options</button>
                                        </td>
                                    </tr>
                                </table>
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

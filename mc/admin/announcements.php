<?php
session_start();
set_include_path("/home/buffsove/public_html/");
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Admin</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <body class="background-gray" data-ng-app="ig">
        <script src="/angular/mc/controllers/admin/announcement.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="AnnouncementController as vm" class="container h-100 align-items-center background-white">
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
                              <li class="nav-item active">
                                <a class="nav-link"
                                   data-ng-if="vm.sessionData.power >= 3"
                                   href="announcements.php">Announcements</a>
                              </li>
                              <li class="nav-item">
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
                        <div class="row">
                            <div class="col text-center">
                                <div class="float-right">
                                    <button data-ng-if="!vm.showAddAnnouncement"
                                            class="btn btn-success"
                                            data-ng-click="vm.toggleAdd()">
                                        Add Announcement
                                    </button>
                                    <button data-ng-if="vm.showAddAnnouncement"
                                            class="btn btn-info"
                                            data-ng-click="vm.toggleAdd()">
                                        View Announcements
                                    </button>
                                </div>
                                <h2>Announcements</h2>
                            </div>
                        </div>
                        <div class="row" data-ng-if="!vm.showAddAnnouncement">
                            <div class="col text-center">
                                <br />
                                <table class="table table-striped">
                                    <tr>
                                        <th>ID</th>
                                        <th>Staff Only?</th>
                                        <th>Message</th>
                                        <th></th>
                                    </tr>
                                    <tr data-ng-repeat="announcement in vm.announcements">
                                        <td>{{ announcement.ID }}</td>
                                        <td>{{ announcement.staff == 1 ? "Yes" : "No" }}</td>
                                        <td>{{ announcement.text }}</td>
                                        <td style="width: 50px;"><button type="button" class="btn btn-danger" data-ng-click="vm.remove(announcement);">Remove</button></td>
                                    </tr>
                                </table>
                                <div class="text-center">
                                    <button type="button" data-ng-click="vm.save()" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="row" data-ng-if="vm.showAddAnnouncement">
                            <div class="col">
                                <div class="alert alert-danger" data-ng-if="vm.error">
                                    {{vm.error}}
                                </div>
                                <form>
                                    <div class="form-group">
                                        <span class="lead">Colors:</span><br />
                                        <div class="btn-group padding-bottom" role="group">
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('4');">Dark Red</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('c');">Red</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('6');">Gold</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('e');">Yellow</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('2');">Dark Green</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('a');">Green</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('3');">Dark Cyan</button>
                                        </div>
                                        <br />
                                        <span class="lead">More Colors:</span>
                                        <br />
                                        <div class="btn-group padding-bottom" role="group">
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('b');">Cyan</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('1');">Dark Blue</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('9');">Blue</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('5');">Dark Purple</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('d');">Purple</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('f');">White</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('7');">Light Gray</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('8');">Dark Gray</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('0');">Black</button>
                                        </div>
                                        <br />
                                        <span class="lead">Extras:</span>
                                        <br />
                                        <div class="btn-group padding-bottom" role="group">
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('r');">Reset</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('l');">Bold</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('n');">Underline</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('o');">Italics</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('k');">Magic</button>
                                            <button type="button" class="btn btn-primary"
                                                    data-ng-click="vm.addColor('m');">Strike</button>
                                        </div>
                                        <br />
                                        <span class="lead">Announcement Message:</span>
                                        <br />
                                        <textarea class="form-control" cols="10" rows="10" data-ng-model="vm.announcement.text">

                                        </textarea>
                                    </div>
                                    <div class="form-check padding-bottom">
                                        <input type="checkbox" class="form-check-input" data-ng-model="vm.announcement.staff" value="1"  id="staffOnly">
                                        <label class="form-check-label" for="staffOnly">Staff Only?</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" data-ng-click="vm.add()" class="btn btn-outline-success">Add</button>
                                    </div>
                                </form>
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

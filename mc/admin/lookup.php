<?php
session_start();
?>
<html>
    <head>
        <title>Ignition Gaming - Minecraft - Admin</title>
        <?php include_once("default_sources.php"); ?>
    </head>
    <body class="background-gray" data-ng-app="ig">
        <script src="/angular/mc/controllers/admin/lookup.js"></script>
        <script src="/angular/global/services/call.js"></script>
        <script src="/angular/global/services/phpSession.js"></script>
        <div data-ng-controller="AdminLookupController as vm" class="container background-white h-100 align-items-center">
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
                              <li class="nav-item">
                                <a class="nav-link" data-ng-if="vm.sessionData.power >= 5" href="gang.php">Gangs</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" data-ng-if="vm.sessionData.power >= 7" href="users.php">Users</a>
                              </li>
                              <li class="nav-item active">
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
                        <div class="row text-center">
                            <div class="col">
                                <h2>Player Lookup</h2>
                            </div>
                        </div>
                        <div class="row-spacer"></div>
                        <form class="form-inline">
                            <div class="form-group col-md-2 text-right mb-2 no-side-padding">
                                <label for="username-label">Search By Username:</label>
                            </div>
                            <div class="form-group col-md-10 mb-2 no-side-padding">
                                 <input type="text" class="form-control col-md-12" id="username" placeholder="Username" data-ng-model="vm.username">
                            </div>
                        </form>
                        <div class="row padding-top" data-ng-if="vm.username && vm.username.length > 3 ">
                            <div class="col-md-2" data-ng-if="searchresult.length > 0">Found Username(s):</div>
                            <div class="col text-left" data-ng-repeat="player in vm.playerList | filter: vm.username as searchresult">
                                <button type="button" class="btn btn-info btn-sm" data-ng-click="vm.selectPlayer(player)">
                                    {{ player.name }}
                                </button>
                            </div>
                            <div class="col-md-12" data-ng-if="vm.username && vm.username.length > 3 && searchresult.length == 0">
                                <div class="alert alert-danger">"{{ vm.username }}" was not found in our system.</div>
                            </div>
                        </div>
                        <div class="row-spacer"></div>
                        <div class="row" data-ng-if="vm.selectedPlayer">
                            <div class="col text-center">
                                <h3>{{ vm.selectedPlayer.name }}</h3>
                            </div>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer">
                            <div class="col">
                                <ul class="nav nav-tabs">
                                  <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'general'">General</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'bans'">Bans</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'kicks'">Kicks</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'solitary'">Solitary</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'staffbans'">Bans (Staff)</a>
                                  </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'staffkicks'">Kicks (Staff)</a>
                                  </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#"
                                       data-ng-click="vm.selectedTab = 'staffsolitary'">Solitary (Staff)</a>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'general' && vm.playerData">
                            <div class="col">

                                <table class="w-100">
                                    <tr>
                                        <td>Kill(s):</td>
                                        <td>
                                            <input type="text" class="form-control" data-ng-model="vm.playerData.stats.kills" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Death(s):</td>
                                        <td>
                                            <input type="text" class="form-control" data-ng-model="vm.playerData.stats.deaths" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Defiance Point(s):</td>
                                        <td>
                                            <input type="text" class="form-control" data-ng-model="vm.playerData.stats.donatorpoints" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Joined Date:</td>
                                        <td>
                                            <input type="text" class="disabled form-control"
                                                   disabled data-ng-model="vm.playerData.stats.joined"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Last Login:</td>
                                        <td>
                                            <input type="text" disabled class="form-control disabled" data-ng-model="vm.playerData.stats.lastlogin" />
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'bans' && vm.playerData">
                            <div class="alert alert-info col" data-ng-if="vm.playerData.bans.length == 0">
                                This player has no history of being banned.
                            </div>
                            <table class="table table-striped" data-ng-if="vm.playerData.bans.length > 0">
                                <tr>
                                    <th class="text-center">Banned By</th>
                                    <th class="text-center">Ban Start</th>
                                    <th class="text-center">Ban End</th>
                                    <th class="text-center">Is Permanent?</th>
                                    <th class="text-center">Reason</th>
                                    <th></th>
                                </tr>
                                <tr data-ng-repeat="ban in vm.playerData.bans">
                                    <td>{{ vm.getPlayerById(ban.staffID).name }}</td>
                                    <td>{{ ban.banStart }}</td>
                                    <td>{{ (!ban.banEnd ? "N/A" : ban.banEnd) }}</td>
                                    <td>{{ ban.permanent == 1 ? "Yes" : "No" }}</td>
                                    <td>{{ ban.Reason }}</td>
                                    <td><button data-ng-click="vm.pardon(ban);" class="btn btn-sm btn-info">Pardon</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'kicks' && vm.playerData">
                            <div class="alert alert-info col" data-ng-if="vm.playerData.kicks.length == 0">
                                This player has no history of being kicked.
                            </div>
                            <table class="table table-striped" data-ng-if="vm.playerData.kicks.length > 0">
                                <tr>
                                    <th class="text-center">Kicked By</th>
                                    <th class="text-center">Occurred</th>
                                    <th class="text-center">Reason</th>
                                </tr>
                                <tr data-ng-repeat="kick in vm.playerData.kicks">
                                    <td>{{ vm.getPlayerById(kick.staffID).name }}</td>
                                    <td>{{ kick.occurred }}</td>
                                    <td>{{ kick.Reason }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'solitary' && vm.playerData">
                            <div class="alert alert-info col" data-ng-if="vm.playerData.solitary.length == 0">
                                This player has no history of being in solitary.
                            </div>
                            <table class="table table-striped" data-ng-if="vm.playerData.solitary.length > 0">
                                <tr>
                                    <th class="text-center">Punished By</th>
                                    <th class="text-center">Started</th>
                                    <th class="text-center">Ended</th>
                                    <th class="text-center">Reason</th>
                                </tr>
                                <tr data-ng-repeat="solitary in vm.playerData.solitary">
                                    <td>{{ vm.getPlayerById(solitary.staffID).name }}</td>
                                    <td>{{ solitary.start }}</td>
                                    <td>{{ solitary.end }}</td>
                                    <td>{{ solitary.reason | limitTo: 30 }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'staffbans' && vm.playerData">
                            <div class="alert alert-info col" data-ng-if="vm.playerData.staffbans.length == 0">
                                This player has no history of banning other players.
                            </div>
                            <table class="table table-striped" data-ng-if="vm.playerData.staffbans.length > 0">
                                <tr>
                                    <th class="text-center">Player Banned</th>
                                    <th class="text-center">Ban Start</th>
                                    <th class="text-center">Ban End</th>
                                    <th class="text-center">Is Permanent?</th>
                                    <th class="text-center">Reason</th>
                                    <th></th>
                                </tr>
                                <tr data-ng-repeat="ban in vm.playerData.staffbans">
                                    <td>{{ vm.getPlayerById(ban.playerID).name }}</td>
                                    <td>{{ ban.banStart }}</td>
                                    <td>{{ (!ban.banEnd ? "N/A" : ban.banEnd) }}</td>
                                    <td>{{ ban.permanent == 1 ? "Yes" : "No" }}</td>
                                    <td>{{ ban.Reason }}</td>
                                    <td><button data-ng-click="vm.pardon(ban);" class="btn btn-sm btn-info">Pardon</button></td>
                                </tr>
                            </table>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'staffkicks' && vm.playerData">
                            <div class="alert alert-info col" data-ng-if="vm.playerData.staffkicks.length == 0">
                                This player has no history of kicking other players.
                            </div>
                            <table class="table table-striped" data-ng-if="vm.playerData.staffkicks.length > 0">
                                <tr>
                                    <th class="text-center">Player Kicked</th>
                                    <th class="text-center">Occurred</th>
                                    <th class="text-center">Reason</th>
                                </tr>
                                <tr data-ng-repeat="kick in vm.playerData.staffkicks">
                                    <td>{{ vm.getPlayerById(kick.playerID).name }}</td>
                                    <td>{{ kick.occurred }}</td>
                                    <td>{{ kick.Reason }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="row padding-top" data-ng-if="vm.selectedPlayer && vm.selectedTab == 'staffsolitary' && vm.playerData">
                            <div class="alert alert-info col" data-ng-if="vm.playerData.staffsolitary.length == 0">
                                This player has no history of putting other players in solitary.
                            </div>
                            <table class="table table-striped" data-ng-if="vm.playerData.staffsolitary.length > 0">
                                <tr>
                                    <th class="text-center">Player Punished</th>
                                    <th class="text-center">Started</th>
                                    <th class="text-center">Ended</th>
                                    <th class="text-center">Reason</th>
                                </tr>
                                <tr data-ng-repeat="solitary in vm.playerData.staffsolitary">
                                    <td>{{ vm.getPlayerById(solitary.playerID).name }}</td>
                                    <td>{{ solitary.start }}</td>
                                    <td>{{ solitary.end }}</td>
                                    <td>{{ solitary.Reason | limitTo: 30 }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
    </script>
</html>

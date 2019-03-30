<?php

/*
 * -- Package Loader --
 * Essentially, all features of these websites will be linked together using "packages". This will control all packages in each of the types.
 */

abstract class PackageLoader {

    static function INIT() {
        //Just call all of the packages so we never have to use this shit system again.
        PackageLoader::Defaults(); //Default stuff.
        //Install Composor Stuff Too!

    }
    static function Defaults() {
         //Automatically add utility-based classes, interfaces, and factories.
        include("enums/global/global_database.php"); //Global variables should always be accessible :)
        include("enums/global/global_steam.php");

        /* Version 1 of Database Object Conversion */
        /* As of 4/18/18, Version 1 has been deprecated completely from the Web project.
        include("/entities/Database/sqlrunner.php");
        include("/entities/Database/dataobject.php"); //DataObject comparison with database.
        include("/Enums/Database/querytype.php");
        include("/entities/Database/dataobjectaction.php"); //Easy running of database stuff.
        */

        /* Version 2 of Database Object Conversion */
        include("utility/database/convertobject.php"); //Wow... Removed 4 files and condensed into one, and it's more stable. YAY!!!
        include("utility/database/runsql.php"); //Backup in case convertobject fails.

        //Load composer stuff
        //include("vendor/autoload.php");

    }

    static function IgnitionGaming() {

        //Table: USERS
        include_once("/entities/ignitiongaming/users/user.php"); //User object.
        include_once("/factories/ignitiongaming/users/userfactory.php"); //User factory.
        include_once("/entities/ignitiongaming/users/usersteam.php"); //UserSteam object.
        include_once("/factories/ignitiongaming/users/usersteamfactory.php"); //UserSteam factory.
        include_once("/entities/ignitiongaming/users/userrank.php"); //User object.
        include_once("/factories/ignitiongaming/users/userrankfactory.php"); //User factory.

         //Table: SERVERS.
        include_once("/entities/ignitiongaming/servers/server.php"); //Server object.
        include_once("/factories/ignitiongaming/servers/serverfactory.php"); //Server factory.
        include_once("/entities/ignitiongaming/servers/serveroption.php"); //ServerOption object
        include_once("/factories/ignitiongaming/servers/serveroptionfactory.php"); //ServerOption factory.

        include_once("/entities/ignitiongaming/admin/admintab.php"); //AdminTab object.
        include_once("/factories/ignitiongaming/admin/admintabfactory.php"); //AdminTab factory.
        include_once("/entities/ignitiongaming/admin/adminsetting.php"); //AdminTab object.
        include_once("/factories/ignitiongaming/admin/adminsettingfactory.php"); //AdminTab factory.

    }

    static function Minecraft() {

        //Table: User
        include_once("entities/mc/user.php");
        //Table: Player
        include_once("entities/mc/player.php");

    }

    static function Basketball() {

        //Table: Player
        include_once("/entities/basketball/player/player.php"); //Player object.
        include_once("/factories/basketball/player/playerfactory.php"); //Player factory.

        //Table: PlayerType
        include_once("/entities/basketball/player/playertype.php"); //Player object.
        include_once("/factories/basketball/player/playertypefactory.php"); //Player factory.

        //Table: Team
        include_once("/entities/basketball/team/team.php"); //Team object.
        include_once("/factories/basketball/team/teamfactory.php"); //Team factory.

        //Table: PlayerTeam
        include_once("/entities/basketball/player/playerteam.php"); //Team object.
        include_once("/factories/basketball/player/playerteamfactory.php"); //Team factory.

        //Table: Division
        include_once("/entities/basketball/division/division.php"); //Division object.
        include_once("/factories/basketball/division/divisionfactory.php"); //Division factory.

    }
}

//Auto include defaults!
PackageLoader::INIT();
?>

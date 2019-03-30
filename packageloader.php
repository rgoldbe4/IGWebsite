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
        include("utility/database/runsql.php"); //Backup in case convertobject fails.
    }

    static function Minecraft() {

        //Table: User
        include_once("entities/mc/user.php");
        //Table: Player
        include_once("entities/mc/player.php");

    }

}

//Auto include defaults!
PackageLoader::INIT();
?>

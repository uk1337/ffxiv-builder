<?php
    //The Router
    switch(($GLOBALS['router_site']))
    {
        case 'ffxiv';
            $GLOBALS['head_title'] = 'School Project - FFXIV';
            $GLOBALS['site_filename'] = 'ffxiv';
            break;
        case 'loadouts';
            $GLOBALS['head_title'] = 'School Project - FFXIV - Loadouts';
            $GLOBALS['site_filename'] = 'loadouts';
            break;
        case 'admin';
            $GLOBALS['head_title'] = 'School Project - FFXIV - Admin';
            $GLOBALS['site_filename'] = 'admin';
            break;
        default;
            $GLOBALS['head_title'] = 'School Project - FFXIV - 404';
            $GLOBALS['site_filename'] = '404';
            break;
    }
?>
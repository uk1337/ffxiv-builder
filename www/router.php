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
        case 'creator';
            $GLOBALS['head_title'] = 'School Project - FFXIV - Creator';
            $GLOBALS['site_filename'] = 'creator';
            break;
        case 'builder';
            $GLOBALS['head_title'] = 'School Project - FFXIV - Builder';
            $GLOBALS['site_filename'] = 'builder';
            break;
        case 'admin';
            $GLOBALS['head_title'] = 'School Project - FFXIV - Admin';
            $GLOBALS['site_filename'] = 'admin';
            break;
        case 'itemdb';
            $GLOBALS['head_title'] = 'School Project - FFXIV - ItemDB';
            $GLOBALS['site_filename'] = 'itemdb';
            break;
        case 'classdb';
            $GLOBALS['head_title'] = 'School Project - FFXIV - ClassDB';
            $GLOBALS['site_filename'] = 'classdb';
            break;
        case 'relationdb';
            $GLOBALS['head_title'] = 'School Project - FFXIV - RelationenDB';
            $GLOBALS['site_filename'] = 'relationdb';
            break;
        default;
            $GLOBALS['head_title'] = 'School Project - FFXIV - 404';
            $GLOBALS['site_filename'] = '404';
            break;
    }
?>
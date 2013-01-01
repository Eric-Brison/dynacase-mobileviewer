<?php

$app_desc = array(
    "name" => "MOBILEVIEWER",
    //Name
    "short_name" => N_("mobileviewer name"),
    //Short name
    "description" => N_("mobileviewer description"),
    //long description
    "access_free" => "N",
    //Access free ? (Y,N)
    "icon" => "mobileviewer.png",
    //Icon
    "displayable" => "Y",
    //Should be displayed on an app list (Y,N)
    "with_frame" => "Y",
    //Use multiframe ? (Y,N)
    "childof" => "" // instance of other application
);

/*
//Example for construct application acl 
$app_acl = array(
    array(
        "name" => "MOBILEVIEWER_ACLONE",
        "description" => N_("Access to ticket sales")
    )
);

// Example for describe action
$action_desc = array(
    array(
        "name" => "MOBILEVIEWER_TICKETSALES",
        "short_name" => N_("sum of sales"),
        "acl" => "MOBILEVIEWER_ACLONE"
    ),
    array(
        "name" => "MOBILEVIEWER_TEXTTICKETSALES",
        "short_name" => N_("text sum of sales"),
        "script" => "zoo_ticketsales.php",
        "function" => "zoo_ticketsales",
        "acl" => "MOBILEVIEWER_ACLONE"
    )
)
*/

?>

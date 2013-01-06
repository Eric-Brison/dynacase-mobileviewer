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

//Example for construct application acl 
$app_acl = array(
    array(
        "name" => "MOBILEVIEWER_ACCESS",
        "description" => N_("Access to mobile apps")
    )
);

// Example for describe action
$action_desc = array(
    array(
        "name" => "MOBILEVIEWER_MAIN",
        "short_name" => N_("main interface"),
        "acl" => "MOBILEVIEWER_ACCESS",
        "layout" => "mobileviewer_main.html",

        "root" => "Y"
    ), array(
        "name" => "DOCVIEW",
        "short_name" => N_("doc view"),
        "acl" => "MOBILEVIEWER_ACCESS",
        "layout" => "docview.xml"

    ), array(
        "name" => "DOCLIST",
        "short_name" => N_("doc list"),
        "acl" => "MOBILEVIEWER_ACCESS"

    )
)


?>

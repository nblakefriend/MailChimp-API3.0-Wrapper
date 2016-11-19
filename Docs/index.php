<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require "Docs.php";
require "../vendor/autoload.php";
$mc = new MailChimp\MailChimp;
$display = "";
$reflection = new ReflectionClass($mc->campaigns());
$className = $reflection->getName();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>MailChimp API 3.0 Wrapper Documentation</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-info">
                    <?php echo Docs::displayClassName( $className ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo Docs::listClassMethods($reflection, $reflection->getMethods( ReflectionMethod::IS_PUBLIC) ); ?>
                </div>
            </div>
        </div>

<?php

//         $methods = $reflection->getMethods();
//
//         $display.="<table" .
//                 " style=\"table-layout:fixed;\" " .
//                 "cellpadding=\"5\" cellspacing=\"2\"" .
//                 " bgcolor=\"#D2D2D2\" border=\"1\"" .
//                 " bordercolor=\"#FFFFFF\">\n\t<tr><td" .
//                 " colspan=\"5\" align=\"center\"><font" .
//                 " face=\"arial\" size=\"6\"" .
//                 " color=\"purple\"> MailChimp 3.0 Wrapper" .
//                 " </font></td></tr>\n";
//
//         $display.="\t<tr><td align=\"center\"" .
//                 " colspan=\"0\"><font face=\"arial\"" .
//                 " size=\"4\" color=\"purple\">";
//         $display.=$reflection->getName();
//         $display.="</font></td><td " .
//                 "align=\"center\" colspan=\"4\">" .
//                 "<font face=\"arial\" size=\"2\"" .
//                 " color=\"black\">\n<i>";
//         $display.=$reflection->getDocComment();
//
//         $display.="\t<tr><td align=\"center\"" .
//                 " colspan=\"0\"><font face=\"arial\"" .
//                 " size=\"2\" color=\"purple\">Methods:" .
//                 "</td><td align=\"center\" colspan=\"0\">" .
//                 "<font face=\"arial\" size=\"2\"" .
//                 " color=\"black\"><b>Name</b></td>" .
//                 "<td align=\"center\" colspan=\"0\">" .
//                 "<font face=\"arial\" size=\"2\"" .
//                 " color=\"black\"><b>Modifiers</b>" .
//                 "</td><td align=\"center\" colspan=\"0\">" .
//                 "<font face=\"arial\" size=\"2\"" .
//                 " color=\"black\"><b>Parameters</b>" .
//                 "</td><td align=\"center\" colspan=\"0\">" .
//                 "<font face=\"arial\" size=\"2\"" .
//                 " color=\"black\"><b>Description</b>" .
//                 "</td></tr>\n";
//
//         foreach ($methods as $in) {
//             $display.="\t<tr><td></td><td>";
//             $display.=$in->getName();
//
//             if ($in->isConstructor()) {
//                 $display.=" [c]";
//             }
//
//             $display.="</td><td>";
//             if ($in->isPublic()) {
//                 $display.="[public]";
//             }
//             if ($in->isPrivate()) {
//                 $display.="[private]";
//             }
//             if ($in->isProtected()) {
//                 $display.="[protected]";
//             }
//             if ($in->isAbstract()) {
//                 $display.="[abstract]";
//             }
//             if ($in->isFinal()) {
//                 $display.="[final]";
//             }
//             if ($in->isStatic()) {
//                 $display.="[static]";
//             }
//             $display.="</td>";
//
//             $parameters = $in->getParameters();
//             if ($parameters != null) {
//                 $display.="<td align=\"center\">";
//                 $nr_parameters = count($parameters);
//                 foreach ($parameters as $out) {
//                     $display.="$";
//                     $display.=$out->getName();
//                     if ($out->isPassedByReference()) {
//                         $display.="  [&]  ";
//                     }
//                     if ($out->allowsNull()) {
//                         $display.="  [+]  ";
//                     }
//                 }
//                 $display.="</td>";
//             } else {
//                 $display.="<td></td>";
//             }
//
//             $display.="<td align=\"left\">";
//             $display.=$in->getDocComment();
//             $display.="\n\t</td></tr>\n";
//         }
//
//         echo $display;
//
?>
</body>
</html>

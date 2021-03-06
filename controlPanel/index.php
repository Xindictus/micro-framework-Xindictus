<?php

use Indictus\Config\AutoConfigure as AC;
use Indictus\General as Gen;

require_once(__DIR__ . "/../xindictus.lib/xindictus.config/AutoLoader/AutoLoader.php");

$appConf = new AC\AppConfigure;

if ($appConf->getGlobalParam('debug') !== 'enabled' && $appConf->getGlobalParam('debug') !== 'setup') {
    header("Location: ../");
    exit();
}

Gen\CacheBlocker::cacheBlock();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

    <meta name="description" content="The control panel of Xindictus PHP framework listing the basic configuration done by the user with some alerts about connectivity to database and other services.">
    <meta name="author" content="Konstantinos Vytiniotis">

    <link rel="icon" href="../../favicon.ico">
    <title>Xindictus CP</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="bootstrap/css/cpanel.css" type="text/css">
</head>
<body class="noSelect">

<div class="container">
    <div class="row">

        <!--HEADLINES-->
        <div class="row text-center">
            <a href="index.php" class="not-active">

                <h2 class="amazdoom">
                    XindictusLiB
                    <!--                <img src="img/724.gif" style="padding-left: 20px; position: absolute;">-->
                    <img class="xin-logo" src="img/132.gif">
                </h2>
            </a>

            <h3 id="frameVersion" class="version"></h3>

            <h4 class="selfie">
                Control Panel and Configuration
            </h4>

            <hr>

            <button id="refreshInfo" class="btn btn-default" disabled>
                <span class="glyphicon glyphicon-refresh"></span> Refresh
            </button>

        </div>

        <div id="version" class="row text-center table-desc">
            <img id="versionLoader" src="img/724.gif">
        </div>

        <div id="examples" class="row text-center table-desc examples">
            Framework Examples
            <a href="frameworkExample.php">
                <span class="glyphicon glyphicon-share-alt" title="Examples"></span>
            </a>
        </div>

        <div class="row col-md-6 col-sm-12 text-center" style="padding-bottom: 20px">
            <h3 class="table-desc">
                Database <span class="glyphicon glyphicon-cog"></span>
            </h3>
            <table id="tableDB" class="table table-bordered table-condensed table-responsive tableFont">

                <thead style="background-color: #d9edf7">
                <tr>
                    <td width="80%">
                        <b>
                            Parameter
                        </b>
                    </td>
                    <td width="20%">
                        <b>
                            Status
                        </b>
                    </td>
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
            <img id="dbInfoLoader" src="img/346.gif">
        </div>


        <div class="row col-md-6 col-sm-12 text-center">
            <h3 class="table-desc">
                Session <span class="glyphicon glyphicon-user"></span>
            </h3>
            <table id="tableSes" class="table table-bordered table-condensed table-responsive tableFont">

                <thead style="background-color: #d9edf7">
                <tr>
                    <td width="80%">
                        <b>
                            Parameter
                        </b>
                    </td>
                    <td width="20%">
                        <b>
                            Status
                        </b>
                    </td>
                </tr>
                </thead>

                <tbody>

                </tbody>
            </table>
            <img id="sessionInfoLoader" src="img/346.gif">
        </div>

        <div class="clearfix"></div>
        <hr>

        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                <h3 id="alertHead" class="table-desc">
                    Alert Panel <span class="glyphicon glyphicon-alert"></span>
                </h3>
            </div>
            <div id="alertPanel" class="panel-body text-center">
                <img id="alertLoader" src="img/379.gif">
            </div>
        </div>

        <div style="padding-bottom: 50px">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <h3 id="actionHead" class="table-desc">
                        Action Panel <span class="glyphicon glyphicon-tasks"></span>
                    </h3>
                </div>
                <div id="actionInfo" class="panel-body text-center">
                    <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Directory Files (cache folder)</button>

                </div>
                <div id="actionPanel" class="panel-body text-center">
                    <img id="actionLoader" src="img/379.gif">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Directory Files</h4>
                    </div>
                    <div id="modalB" class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

</body>

<script type="text/javascript" src="bootstrap/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/request-headers.js"></script>
<script type="text/javascript" src="bootstrap/js/cpanel.js"></script>

</html>
<?php
/******************************************************************************
 * Copyright (c) 2016 Konstantinos Vytiniotis, All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 *
 * File: getConnectionStatus.php
 * User: Konstantinos Vytiniotis
 * Email: konst.vyti@hotmail.com
 * Date: 20/4/2016
 * Time: 04:30
 *
 ******************************************************************************/

use Indictus\Config\AutoConfigure;

require_once(__DIR__ . "/../../xindictus.lib/xindictus.config/AutoLoader/AutoLoader.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $db = new AutoConfigure\DBConfigure;
    $db = $db->getParam();

    echo json_encode($db);
}
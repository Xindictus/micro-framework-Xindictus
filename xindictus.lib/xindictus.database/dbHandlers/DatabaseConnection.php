<?php
/******************************************************************************
 * Copyright (c) 2015 Konstantinos Vytiniotis, All rights reserved.
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
 * File: index.php
 * User: Konstantinos Vytiniotis
 * Email: konst.vyti@hotmail.com
 * Date: 7/12/2015
 * Time: 05:49
 *
 ******************************************************************************/
namespace Indictus\Database\dbHandlers;

use Indictus\Exception\ErHandlers as Errno;

/**
 * Require AutoLoader
 */
require_once __DIR__ . "/../../autoload.php";

/**
 * Class DatabaseConnection
 * @package Indictus\Database\Handlers
 *
 * This class is used to create connection to a given database.
 */
class DatabaseConnection
{
    /**
     * @param $dbAssociate : the database alias
     * @return CustomPDO: returns a new CustomPDO - which extends PDO - instance
     */
    public static function startConnection($dbAssociate)
    {
        return new CustomPDO($dbAssociate);
    }

    /**
     * @param CustomPDO $connection : Takes a connection as an argument and renders it null,
     * thus closing the chosen connection.
     * @return int : Return 0 on success, -1 on failure.
     */
    public static function closeConnection(CustomPDO $connection)
    {
        /**
         * Check whether $connection is already null.
         */
        if ($connection == null)
            return 0;

        /**
         * Using custom error handler for error logs.
         */
        try {

            /**
             * Close connection
             */
            $connection = null;

        } catch (\PDOException $closeException) {

            /**
             * Log connection error
             */
            $errorString = 'User: ' . $_SERVER['REMOTE_ADDR'] . ' - ' .
                date("F j, Y, g:i a") . PHP_EOL .
                'FAILED TO CLOSE CONNECTION TO DATABASE' . PHP_EOL .
                $closeException->getMessage();

            $category = "DatabaseConnection";

            $errorHandler = new Errno\LogErrorHandler($errorString, $category);
            $errorHandler->createLogs();

            return -1;
        }

        return 0;

    }
}
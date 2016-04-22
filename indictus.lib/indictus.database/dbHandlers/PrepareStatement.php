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
 * Date: 20/4/2016
 * Time: 22:33
 *
 ******************************************************************************/
namespace Indictus\Database\dbHandlers;

/**
 * Class PrepareStatement
 * @package Indictus\Database\dbHandlers
 */
class PrepareStatement
{
    /**
     * @var array|null
     * $columnFields: this array contains the column names of a database table.
     */
    private $columnNames = array();

    /**
     * @var array|null
     * $columnValues: this array contains the values responding to the $columnNames.
     */
    private $columnValues = array();

    /**
     * @var array
     * %preparedNamedParameters: this array contains the edited $columnNames
     * in order to be used for the PDO prepared statement.
     */
    private $preparedNamedParameters = array();

    /**
     * PreparedQuery constructor.
     * @param array|null $columnNames
     * @param array|null $columnValues
     */
    public function __construct(array $columnNames = null, array $columnValues = null)
    {
        $this->columnNames = $columnNames;
        $this->columnValues = $columnValues;
    }

    /**
     * @return string: returns in a string the column fields,
     * separated by commas.
     */
    public function getColumnFields()
    {
        $columnNames = "";

        /*
         * If columnValues[0] == null, means that we have a table with AUTO_INCREMENT ID,
         * so we remove the first table column.
         */
        if($this->columnValues[0] == null) {
            array_shift($this->columnNames);
            array_shift($this->columnValues);
        }

        foreach ($this->columnNames as $value)
            $columnNames .= "$value,";

        /*
         * Return without trailing comma
         */
        return rtrim($columnNames, ',');
    }

    /**
     * @return string: returns in a string the named parameters,
     * separated by commas.
     */
    public function getPreparedNamedParameters()
    {
        $preparedNamedParameters = "";
        foreach ($this->columnNames as $value) {
            $preparedNamedParameters .= ":$value,";
            array_push($this->preparedNamedParameters, ":$value");
        }

        /*
         * Return without trailing comma
         */
        return rtrim($preparedNamedParameters, ',');
    }

    /**
     * @return array: returns an associative array with keys the $preparedNamedParameters
     * and values the $columnValues.
     */
    public function getBindings()
    {
        return array_combine($this->preparedNamedParameters, $this->columnValues);
    }
}
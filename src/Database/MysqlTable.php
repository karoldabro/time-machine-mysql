<?php

namespace Kdabrow\TimeMachineMysql\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Kdabrow\TimeMachine\Contracts\DatabaseTableInterface;
use Kdabrow\TimeMachine\Database\Column;
use Kdabrow\TimeMachine\Exceptions\TimeMachineException;
use Kdabrow\TimeMachine\TimeTraveller;

class MysqlTable implements DatabaseTableInterface
{
    /**
     * @return array<string, Column> Key is column name, value is Column object
     * @throws TimeMachineException
     */
    public function selectUpdatableFields(TimeTraveller $timeTraveller): array
    {
        $fields = DB::select("DESCRIBE " . $timeTraveller->getModel()->getTable());

        if (empty($fields)) {
            throw new TimeMachineException("Not found any fields in table: " . $timeTraveller->getModel()->getTable());
        }

        $allowedTypes = Config::get('time-machine-mysql.types');

        $columnNames = [];

        foreach ($fields as $field) {
            if (in_array($field->Type, $allowedTypes) === false) {
                continue;
            }

            $columnNames[$field->Field] = (new Column($field->Field))->setType($field->Type);
        }

        return $columnNames;
    }
}
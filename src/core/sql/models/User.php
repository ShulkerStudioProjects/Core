<?php

namespace core\sql\models;

use refaltor\efficiencySql\Model;

/**
 * @property int $id
 * @property string $xuid
 * @property string $pseudo
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    protected static function tableName(): string
    {
        return "users";
    }
}


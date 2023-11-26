<?php

use Bitrix\Main\Entity;
use Bitrix\Main\UI\PageNavigation;


class BalanceEntityTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'USER_BALANCE';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true,
            )),
            new Entity\IntegerField('USER_ID'),
            new Entity\ReferenceField(
                'USER',
                \Bitrix\Main\UserTable::class,
                array('=this.USER_ID' => 'ref.ID')
            ),
            new Entity\StringField('BALANCE'),
            new Entity\DatetimeField('TIMESTAMP'),
        );
    }
    
    public static function addBalance($userId, $balance)
    {
        $result = static::add(array(
            'USER_ID' => $userId,
            'BALANCE' => $balance,
            'TIMESTAMP' => new \Bitrix\Main\Type\DateTime(),
        ));

        if ($result->isSuccess()) {
            return $result->getId();
        }
    }
}

?>
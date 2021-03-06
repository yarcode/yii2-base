<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace yarcode\base\traits;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * Class ListDataTrait
 * @package yarcode\base\traits
 *
 * @mixin ActiveRecord
 */
trait ListDataTrait
{
    /**
     * @param string|\Closure $valueField
     * @param string|\Closure $keyField
     * @param null|array|\Closure $condition
     * @param null|array|string $orderBy
     * @return array
     */
    public static function listData($valueField, $keyField = 'id', $condition = null, $orderBy = null)
    {
        $query = static::find();
        if (!empty($condition)) {
            $query->andWhere($condition);
        }
        if (!empty($orderBy)) {
            $query->orderBy($orderBy);
        }
        return ArrayHelper::map($query->all(), $keyField, $valueField);
    }
}
<?php
namespace Uniplaces\STest\Filter;

use Uniplaces\STest\Filter;

/**
* $parse = new \Filter\Parse($schema);
* $conditions = $parse->parse($search);
* $conditions->match($doc);
*/
class Parse implements Filter\Token\ParseInterface
{

    const NAMESPACE_TOKEN = '\Uniplaces\STest\Filter\Token\\';
    const NAMESPACE_CONDITION = '\Uniplaces\STest\Filter\Condition\\';

    const DEFAULT_OPERATOR = '\Uniplaces\STest\Filter\Token\AndOperator';
    const DEFAULT_CONDITION = '\Uniplaces\STest\Filter\Token\Condition';
    
    /**
     * @var schema map query fields to class
     */
    protected $schema = array();

    public function __construct($schema = null)
    {
        if (!is_null($schema)) {
            $this->schema = $schema;
        }
    }

    public function parse($search = array())
    {
        $defaultOperator = self::DEFAULT_OPERATOR;
        $defaultOperatorObject = new $defaultOperator();

        foreach ($search as $fieldName => $fieldValue) {

            if (!isset($this->schema[$fieldName])) {
                continue;
            }

            $conditionKlass = self::NAMESPACE_CONDITION.ucfirst($this->schema[$fieldName]);

            $condition = new $conditionKlass($fieldName, $fieldValue);

            if ($condition instanceof \Uniplaces\STest\Filter\Token\ParseTokenInterface) {
                $search = $condition->parse($search);
            }

            $defaultOperatorObject->pushCondition($condition);

        }

        return $defaultOperatorObject;
    }
}

<?php
namespace Uniplaces\STest\Filter\Token;

/**
 * implementation that allow inversion depency
 */
class Condition implements TokenConditionInterface
{
    protected $fieldName = null;
    protected $fieldValue = null;

    public function __construct($fieldName = null, $fieldValue = null)
    {
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldValue;
    }

    public function match($doc = null)
    {
        $getter = 'get'.ucfirst($this->fieldName);
        $value = '';
        if (is_object($doc) && property_exists($doc, $getter)) {
            $value = $doc->$getter();
        } elseif (is_array($doc) && isset($doc[$this->fieldName])) {
            $value = $doc[$this->fieldName];
        } else {
            throw new \Exception("Condition not found in document");
        }

        return ($value === $this->fieldValue);
    }

    public function hash()
    {
        return md5($this->fieldName . json_encode($this->fieldValue));
    }
}

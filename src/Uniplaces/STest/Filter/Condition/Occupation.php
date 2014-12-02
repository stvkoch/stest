<?php
namespace Uniplaces\STest\Filter\Condition;

use \Uniplaces\STest\Filter\Token;
use Uniplaces\STest\Requirement;

class Occupation extends Token\Condition implements Token\TokenConditionInterface
{

    public function match($doc = null)
    {
        $tenantTypes = $doc->getRequirements()->getTenantTypes();
        return (!$tenantTypes instanceof Requirement\TenantTypes || in_array($this->fieldValue, $tenantTypes->toArray()));
    }

    public function hash()
    {
        return parent::hash();
    }
}

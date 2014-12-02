<?php
namespace Uniplaces\STest\Filter\Condition;

use \Uniplaces\STest\Filter\Token;
use Uniplaces\STest\Requirement;

class StartDate extends Token\Condition implements Token\TokenConditionInterface, Token\ParseTokenInterface
{

    public function parse($search = array())
    {
        $this->fieldName = 'stay';
        $this->fieldValue = array();
        if (isset($search['start_date'])) {
            $this->fieldValue['start_date'] = $search['start_date'];
            unset($search['start_date']);
        }
        if (isset($search['end_date'])) {
            $this->fieldValue['end_date'] = $search['end_date'];
            unset($search['end_date']);
        }
        return $search;
    }

    public function match($doc = null)
    {

        //we can turn this more powerful!!!
        $stayTime = $doc->getRequirements()->getStayTime();
        
        if (isset($this->fieldValue['start_date']) && $stayTime instanceof Requirement\StayTime) {
            /** @var DateTime $startDate */
            $startDate = $this->fieldValue['start_date'];
            /** @var DateTime $endDate */
            $endDate = $this->fieldValue['end_date'];

            $interval = $endDate->diff($startDate);
            $days = (int)$interval->format('%a');

            return (
                $days >= $stayTime->getMin() && $days <= $stayTime->getMax()
            );
        }
        return true;
    }

    public function hash()
    {
        return parent::hash();
    }
}

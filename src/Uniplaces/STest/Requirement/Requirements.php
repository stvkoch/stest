<?php

namespace Uniplaces\STest\Requirement;

/**
 * Requirements
 */
class Requirements
{
    /**
     * @var StayTime|null
     */
    protected $stayTime;

    /**
     * @var TenantTypes|null
     */
    protected $tenantTypes;

    /**
     * @param StayTime|null    $stayTime
     * @param TenantTypes|null $tenantTypes
     */
    public function __construct(StayTime $stayTime = null, TenantTypes $tenantTypes = null)
    {
        $this->stayTime = $stayTime;
        $this->tenantTypes = $tenantTypes;
    }

    /**
     * @return null|StayTime
     */
    public function getStayTime()
    {
        return $this->stayTime;
    }

    /**
     * @return null|TenantTypes
     */
    public function getTenantTypes()
    {
        return $this->tenantTypes;
    }
}

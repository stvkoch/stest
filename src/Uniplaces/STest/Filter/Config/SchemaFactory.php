<?php
namespace Uniplaces\STest\Filter\Config;

/**
* 
*/
abstract class SchemaFactory
{
    static protected $schema = array(
        'simple' => array(
            'city'=>'city',
            'start_date'=>'startDate',
            'occupation'=>'occupation',
            'city'=>'city'
        ),
        'advanced' => array(
            'address'=>'address',
            'price'=>'price'
        )
    );

    public static function create($schemaType=null)
    {
        return ($schemaType==='simple') ? self::$schema['simple'] : (self::$schema['advanced'] + self::$schema['simple']);
    }

    
}
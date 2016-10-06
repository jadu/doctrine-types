<?php
namespace Jadu\DoctrineTypes;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class UnicodeStringType extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if ($platform->getName() == 'mysql') {
            return 'VARCHAR(' . (!is_null($fieldDeclaration['length']) ? intval($fieldDeclaration['length']) : '255') . ') COMMENT \'(DC2Type:unicodestring)\'';
        }
        else {
            return 'NVARCHAR(' . (!is_null($fieldDeclaration['length']) ? intval($fieldDeclaration['length']) : '255') . ') COMMENT \'(DC2Type:unicodestring)\'';
        }
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    public function getName()
    {
        return 'unicodestring';
    }
}

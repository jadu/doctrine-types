<?php

namespace Jadu\DoctrineTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class UnicodeTextType extends Type
{
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if ($platform->getName() === 'mysql') {
            return 'TEXT COMMENT \'(DC2Type:unicodetext)\'';
        }
        else {
            return 'NVARCHAR(MAX)';
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
        return 'unicodetext';
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return $platform->getName() != 'mysql';
    }
}
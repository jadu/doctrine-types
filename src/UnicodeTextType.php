<?php

namespace Jadu\DoctrineTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class UnicodeTextType extends Type
{
    /**
     * Returns the SQL declaration for the given field.
     *
     * @param array           $fieldDeclaration
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        if ($platform->getName() === 'mysql') {
            return 'TEXT COMMENT \'(DC2Type:unicodetext)\'';
        }
        else {
            return 'NVARCHAR(MAX)';
        }
    }

    /**
     * Converts a value from the database representation to the PHP representation.
     *
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed
     */

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    /**
     * Converts a value from the PHP representation to the database representation.
     *
     * @param mixed            $value
     * @param AbstractPlatform $platform
     *
     * @return mixed
     */

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value;
    }

    /**
     * Gets the name of this type.
     *
     * @return string
     */

    public function getName()
    {
        return 'unicodetext';
    }

    /**
     * Checks if this type requires a SQL comment hint.
     *
     * @param AbstractPlatform $platform
     *
     * @return bool
     */

    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return $platform->getName() != 'mysql';
    }
}

<?php
/**
 * Copyright (c) 2018 EXTREME IDEA LLC https://www.extreme-idea.com
 * This software is the proprietary information of EXTREME IDEA LLC.
 *
 * All Rights Reserved.
 * Modification, redistribution and use in source and binary forms, with or without modification
 * are not permitted without prior written approval by the copyright holder.
 *
 */

namespace Elikh;

use PHPUnit\Framework\TestCase;

class DeveloperCodeValidator implements CodeValidatorInterface
{

    public function isValid(string $filePath, string $rule)
    {
        return preg_match($rule, file_get_contents($filePath)) ? true : false;
    }

    public function getFiles(string $directoryPath): array
    {
        return array_diff(glob($directoryPath . DIRECTORY_SEPARATOR . '*'), ['..', '.']);
    }

    public function getMessage(string $filePath, string $ruleName): string
    {
        return "File $filePath does not match rule '$ruleName'";
    }
}

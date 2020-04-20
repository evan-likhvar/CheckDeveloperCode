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


interface CodeValidatorInterface
{
    public function isValid(string $filePath, string $testClass);

    public function getFiles(string $directoryPath): array;

    public function getMessage(string $filePath, string $ruleName): string;
}

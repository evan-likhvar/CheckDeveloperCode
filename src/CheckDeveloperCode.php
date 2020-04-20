<?php


namespace Elikh;

use PHPUnit\Framework\TestCase;


class CheckDeveloperCode extends TestCase
{
    //private $rules = []; //['single'=>'/^[a-z][a-z0-9_]+[^s]$/','nextName'=>'nextRule']
    /** @var CodeValidatorInterface */
    private $validator;
    private $errors = [];

    public function validate(string $directoryPath, array $rules, CodeValidatorInterface $validator): string
    {
        $this->validator = $validator;

        $testFiles = $this->getFiles($directoryPath);

        foreach ($testFiles as $filePath) {
            foreach ($rules as $ruleName => $rule) {
                if (!$this->isValid($filePath, $rule)) {
                    $this->errors[] = $this->getMessage($filePath, $ruleName);
                }
            }
        }

        return implode(PHP_EOL, $this->errors);
    }

    private function getFiles($directoryPath): array
    {
        return $this->validator->getFiles($directoryPath);
    }

    private function getMessage(string $filePath, string $ruleName): string
    {
        return $this->validator->getMessage($filePath, $ruleName);
    }

    private function isValid(string $filePath, string $rule): bool
    {
        return $this->validator->isValid($filePath, $rule);
    }
}
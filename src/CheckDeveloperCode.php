<?php


namespace Elikh;

use PHPUnit\Framework\TestCase;


class CheckDeveloperCode extends TestCase
{
    //private $rules = []; //['single'=>'/^[a-z][a-z0-9_]+[^s]$/','nextName'=>'nextRule']
    private $validator;
    private $errors = [];

    public function validate(string $dir, array $rules, TestTypeValidatorInterface $validator): string
    {
        $this->validator = $validator;

        $testFiles = $this->getTestFiles($dir);

        foreach ($testFiles as $filePath) {
            foreach ($rules as $ruleName => $rule) {
                if (!$this->isValid($filePath, $rule)) {
                    $this->errors[] = $this->getMessage($filePath, $ruleName);
                }
            }
        }

        return implode(PHP_EOL, $this->errors);
    }

    private function getTestFiles($dir): array
    {
        return $this->validator->getTestFiles($dir);
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
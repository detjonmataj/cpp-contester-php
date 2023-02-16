<?php declare(strict_types=1);

require_once 'core/DbModel.php';

class TestCase extends DbModel
{
    public int $test_case_id;
    public int $question_id;
    public string $input = '';
    public string $output = '';

    private const TABLE_NAME = 'test_cases';

    public function rules(): array
    {
        return [
            'input' => [self::RULE_REQUIRED],
            'output' => [self::RULE_REQUIRED],
            'question_id' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'input' => 'Input',
            'output' => 'Output',
            'question_id' => 'Question',
        ];
    }

    public function tableName(): string
    {
        return self::TABLE_NAME;
    }

    /**
     * @return string[]
     * return all the DB properties of this class
     * you may create other properties not part of the DB model
     */
    public function attributes(): array
    {
        return ['input', 'output', 'question_id'];
    }

    public static function findOne(array $where, string $tableName = self::TABLE_NAME): ?TestCase
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, string $tableName = self::TABLE_NAME): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }

    public function primaryKey(): string
    {
        return 'test_case_id';
    }
}
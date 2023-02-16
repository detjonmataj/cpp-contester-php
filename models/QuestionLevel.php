<?php declare(strict_types=1);

require_once 'core/DbModel.php';

class QuestionLevel extends DbModel
{
    public int $question_level_id;
    public string $name = '';

    private const TABLE_NAME = 'question_levels';

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'name' => 'Name',
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
        return ['name'];
    }

    public static function findOne(array $where, string $tableName = self::TABLE_NAME): ?QuestionLevel
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, string $tableName = self::TABLE_NAME): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }

    public function primaryKey(): string
    {
        return 'question_level_id';
    }
}
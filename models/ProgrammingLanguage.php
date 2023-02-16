<?php declare(strict_types=1);

require_once 'core/DbModel.php';

class ProgrammingLanguage extends DbModel
{
    public int $programming_language_id;
    public string $name = '';
    public string $version = '';

    public string $logo = '';
    public string $compiler_path = '';

    private const TABLE_NAME = 'programming_languages';

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'version' => [self::RULE_REQUIRED]
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'name' => 'Programming Language',
            'version' => 'Version',
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
        return ['name', 'version', 'logo', 'compiler_path'];
    }

    public static function findOne(array $where, string $tableName = self::TABLE_NAME): ?ProgrammingLanguage
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, string $tableName = self::TABLE_NAME): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }

    public function primaryKey(): string
    {
        return 'programming_language_id';
    }
}
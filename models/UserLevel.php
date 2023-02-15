<?php declare(strict_types=1);

require_once 'core/DbModel.php';

class UserLevel extends DbModel
{
    public int $user_level_id;
    public string $name;
    public string $description;

    private const TABLE_NAME = 'user_levels';

    public function createRules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
        ];
    }

    public function updateRules(): array
    {
        return [];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'name' => 'Name',
            'description' => 'Description',
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
        return ['name', 'description'];
    }

    public static function findOne(array $where, $tableName = self::TABLE_NAME): ?User
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, $tableName = self::TABLE_NAME): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }


    public function primaryKey(): string
    {
        return 'user_level_id';
    }
}
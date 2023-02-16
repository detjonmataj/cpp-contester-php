<?php

require_once 'core/DbModel.php';

class Question extends DbModel
{
    public int $question_id;
    public string $title;
    public string $description;
    public string $hint = '';
    public int $user_id;
    public string $created_at;
    public int $question_level_id;

    private ?int $volume_id;
    private ?int $question_category_id;

    private const TABLE_NAME = 'questions';

    public function rules(): array
    {
        return [
            'title' => [self::RULE_REQUIRED],
            'user_id' => [self::RULE_REQUIRED],
            'question_level_id' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'title' => 'Title',
            'user_id' => 'Created by',
            'question_level_id' => 'Difficulty',
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
        return ['title', 'description', 'hint', 'user_id', 'question_level_id'];
    }

    public static function findOne(array $where, string $tableName = self::TABLE_NAME): ?Question
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, string $tableName = self::TABLE_NAME): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }

    public function primaryKey(): string
    {
        return 'question_id';
    }
}
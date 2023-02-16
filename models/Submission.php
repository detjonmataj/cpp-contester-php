<?php declare(strict_types=1);

require_once 'core/DbModel.php';

class Submission extends DbModel
{
    public int $submission_id;
    public string $code = '';
    public string $status_name = '';
    public string $error_message = '';
    public int $question_id = -1;
    public int $user_id = -1;
    public int $programming_language_id = -1;

    public string $created_at;

    // TODO: Enable this when the assignment CRUD API is implemented
    private ?int $assignment_id;

    private const TABLE_NAME = 'submissions';

    public function rules(): array
    {
        return [
            'code' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'code' => 'Code',
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
        return ['code', 'status_name', 'error_message', 'question_id', 'user_id', 'programming_language_id'];
    }

    public static function findOne(array $where, string $tableName = self::TABLE_NAME): ?Submission
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, string $tableName = self::TABLE_NAME): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }

    public function primaryKey(): string
    {
        return 'submission_id';
    }
}
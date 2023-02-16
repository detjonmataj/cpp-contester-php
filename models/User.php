<?php declare(strict_types=1);

require_once 'core/DbModel.php';

class User extends DbModel
{
    public int $user_id;
    public string $first_name;
    public string $last_name;
    public string $username;
    public string $password;
    public string $email;
    public string $created_by;
    public int $user_level_id;
    public string $created_at;
    public ?string $birthday = null;

    // Important: To skip mapping columns from findOne and findAll methods, mark the properties as private
    // For columns that are skipped from mapping a default value is not required, but we have to specify the type as ?{data_type}
    private ?int $questions_submitted;
    private ?int $questions_solved;
    private ?int $questions_rejected;

    private const TABLE_NAME = 'users';

    public function save(): string|false
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function update(): bool
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        if (empty($this->password)) {
            unset($attributes[array_search('password', $attributes)]);
        } else {
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        }

        $sql = "update $tableName set " . implode(',', array_map(fn($x) => "$x = :$x", $attributes))
            . " where " . $this->primaryKey() . " = " . $this->{$this->primaryKey()};
        $stmt = self::prepare($sql);
        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }
        return $stmt->execute();
    }

    public function rules(): array
    {
        // At least 1 uppercase letter, 1 number, 1 special character, 8-32 characters
        $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$/";
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED, self::RULE_USERNAME, [self::RULE_UNIQUE, self::class]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_PREG_MATCH, $passwordRegex, "Password very week"]],
            'created_by' => [self::RULE_REQUIRED],
            'user_level_id' => [self::RULE_REQUIRED],
        ];
    }

    /**
     * @return string[]
     * keys should correspond to the attributes and values will be displayed in the HTML document
     */
    public function labels(): array
    {
        return [
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'created_by' => 'Created by',
            'user_level_id' => 'Role',
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
        return ['first_name', 'last_name', 'username', 'email', 'password', 'created_by', 'user_level_id', 'birthday'];
    }

    public static function findOne(array $where, string $tableName = self::TABLE_NAME): ?User
    {
        return parent::findOne($where, $tableName);
    }

    public static function findAll(array $where, array $extraClauses, string $tableName = self::TABLE_NAME ): ?array
    {
        return parent::findAll($where, $extraClauses, $tableName);
    }


    public function primaryKey(): string
    {
        return 'user_id';
    }

    public function getDisplayName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function isAdmin(): bool
    {
        return $this->user_level_id === 1;
    }

    public function isTeacher(): bool
    {
        return $this->user_level_id === 2;
    }
}
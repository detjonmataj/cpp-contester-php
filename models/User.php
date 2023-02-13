<?php

require_once 'core/DbModel.php';

class User extends DbModel
{
    public string $first_name = '';
    public string $last_name = '';
    public string $username = '';
    public string $password = '';
    public string $email = '';
    // Keeping these as hardcoded values for now
    public string $created_by = 'Detjon';

    private const TABLE_NAME = 'users';

    public function save(): true
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        $passwordRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$/";
        return [
            'first_name' => [self::RULE_REQUIRED],
            'last_name' => [self::RULE_REQUIRED],
            'username' => [self::RULE_REQUIRED, self::RULE_USERNAME, [self::RULE_UNIQUE, self::class]],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_PREG_MATCH, $passwordRegex, "Password very week"]],
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
        return ['first_name', 'last_name', 'username', 'email', 'password', 'created_by'];
    }

    public static function findOne(array $where, $tableName = self::TABLE_NAME): ?User
    {
        return parent::findOne($where, $tableName);
    }


    public function primaryKey(): string
    {
        return 'user_id';
    }

    public function getDisplayName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
<?php


class FormField
{
    private BaseModel $model;
    private string $attribute;
    private string $type;
    private string $readonly = '';
    private string $required = '';

    private string $pattern = '';

    private string $classes;

    private array $options;

    private const TYPE_TEXT = 'text';
    private const TYPE_PASSWORD = 'password';
    private const TYPE_NUMBER = 'number';
    private const TYPE_OPTION = 'option';

    private const TYPE_HIDDEN = 'hidden';

    /**
     * @param BaseModel $model
     * @param string $attribute
     */
    public function __construct(BaseModel $model, string $attribute, array $classes = [], array $options = [])
    {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->classes = implode(' ', $classes);
        $this->options = $options;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString(): string
    {
        $label = $this->model->getLabel($this->attribute);
        $type = $this->type;
        $errorCSSClass = $this->model->hasError($this->attribute) ? ' is-invalid' : '';
        $error = $this->model->getFirstError($this->attribute);
        $value = ($type === self::TYPE_PASSWORD) ? '' : $this->model->{$this->attribute};
        $classes = $this->classes;
        $pattern = $this->pattern ? "pattern='$this->pattern'" : '';

        if ($type === self::TYPE_OPTION) {
            $value = $this->model->{$this->attribute};
            $optionsHTML = '';
            foreach ($this->options as $items) {
                foreach ($items as $key => $_value) {
                    $selected = $_value === $value ? 'selected' : '';
                    $optionsHTML .= "<option value='$key' $selected>$_value</option>";
                }
            }
            return <<< EOF
            <div>
                <label for="exampleFormControlInput1" class="form-label">$label</label>
                <br>
                <select name="$this->attribute" class="form-select form-item $errorCSSClass $classes" $this->readonly $this->required>
                    $optionsHTML
                </select>
                <div class="invalid-feedback">
                    $error
                </div>
                <br>
            </div>
            EOF;
        }

        $t = $this->type === self::TYPE_HIDDEN ? ' hidden' : '';

        return <<< EOF
        <div>
            <label for="exampleFormControlInput1" class="form-label"$t>$label</label>
            <br>
            <input type="$this->type" name="$this->attribute" value="$value" class="form-control form-item $errorCSSClass $classes" $this->readonly $pattern>
            <div class="invalid-feedback">
                $error
            </div>
            <br>
        </div>
        EOF;
    }

    public function passwordField(): static
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function numberField(): static
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }

    public function readonlyField(): static
    {
        $this->readonly = 'disabled';
        return $this;
    }

    public function requiredField(): static
    {
        $this->required = 'required';
        return $this;
    }

    public function pattern(string $pattern): static
    {
        $this->pattern = $pattern;
        return $this;
    }

    public function optionField(): static
    {
        $this->type = self::TYPE_OPTION;
        return $this;
    }

    public function hiddenField(): static
    {
        $this->type = self::TYPE_HIDDEN;
        return $this;
    }

}
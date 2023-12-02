<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class CollectionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required|string|min:3|max:100',
            'status_id' => 'sometimes|required|boolean',
            'description' => 'required|string'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'sometimes|required|string|min:3|max:100',
            'status_id' => 'sometimes|required|boolean',
            'description' => 'sometimes|required|string'
        ],
    ];
}

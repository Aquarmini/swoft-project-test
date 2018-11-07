<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Models\Validator;

use think\Validate;
use think\validate\ValidateRule;

class TestValidator extends Validate
{
    /**
     * 当前验证规则
     * @var array
     */
    protected $rule = [
        'id' => 'require',
    ];

    /**
     * 验证提示信息
     * @var array
     */
    protected $message = [
        'id' => 'id 必传'
    ];

    public function __construct(array $rules = [], array $message = [], array $field = [])
    {
        parent::__construct($rules, $message, $field);

        $this->rule('name', function ($value, $rule) {
            if (empty($value) || $value === 'limx') {
                return true;
            }
            return '名称错误';
        });

        $this->rule('email', ValidateRule::isEmail());
    }
}

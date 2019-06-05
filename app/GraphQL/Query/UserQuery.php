<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;

use GraphQL;
use App\User;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'UserQuery',
        'description' => 'uma query de Users'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('user_type'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Id do usuário'
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        if (isset($args['id'])) {
            return User::where('id', $args['id'])->get();
        }

        return User::all();
    }
}

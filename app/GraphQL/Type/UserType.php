<?php

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Graphql;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'Um type de Usuários',
        'model' => User::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::ID()),
                'description' => 'O id do usuário no banco de dados'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'O nome do usuário no banco de dados'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'O email do usuário no banco de dados'
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'A senha do usuário no banco de dados'
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('post_type')),
                'description' => 'Posts por usuários'
            ]
        ];
    }
}

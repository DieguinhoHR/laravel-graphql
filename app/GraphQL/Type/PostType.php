<?php

namespace App\GraphQL\Type;

use App\Posts;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Graphql;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A type',
        'model' => Posts::class
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::ID(),
                'description' => 'Id do post'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Titulo do Post'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Status do Post'
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'user_id do post'
            ]
        ];
    }
}

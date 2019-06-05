<?php

namespace App\GraphQL\Query;

use App\User;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;
use Rebing\GraphQL\Support\Query;
use GraphQL;

class UserPaginateQuery extends Query
{
    protected $attributes = [
        'name' => 'UserPaginateQuery',
        'description' => 'Uma query de paginação'
    ];

    public function type()
    {
        return GraphQL::paginate('user_type');
    }

    public function args()
    {
        return [
            'page' => [
                'type' => type::int(),
                'description' => 'Página definida para consulta'
            ],
            'paginate' => [
                'type' => type::int(),
                'description' => 'Quantidade de registros por consulta'
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $paginate = 10;

        if (isset($args['paginate'])) {
            $paginate = $args['paginate'];
        }

        $page = 1;

        if (isset($args['page'])) {
            $page = $args['page'];
        }
        return User::paginate($paginate, ['*'], 'page', $page);
    }
}

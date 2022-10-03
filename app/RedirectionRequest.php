<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedirectionRequest extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Orders';

    /**
     * The primary key for the table
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
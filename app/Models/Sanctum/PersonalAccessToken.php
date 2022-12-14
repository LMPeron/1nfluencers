<?php

namespace App\Models\Sanctum;
use Laravel\Sanctum\Contracts\HasAbilities;
use Jenssegers\Mongodb\Eloquent\Model;

class PersonalAccessToken extends Model implements HasAbilities
{
    protected $casts = [
        'abilities' => 'json',
        'last_used_at' => 'datetime',
    ];

    protected $fillable = ['name', 'token', 'abilities'];
    protected $hidden = ['token'];

    public function tokenable()
    {
        return $this->morphTo('tokenable');
    }

    public static function findToken($token)
    {
        if (strpos($token, '|') === false) {
            return static::where('token', hash('sha256', $token))->first();
        }
        [$id, $token] = explode('|', $token, 2);

        if ($instance = static::find($id)) {
            return hash_equals($instance->token, hash('sha256', $token))
                ? $instance
                : null;
        }
    }

    public function can($ability)
    {
        return in_array('*', $this->abilities) ||
            array_key_exists($ability, array_flip($this->abilities));
    }

    public function cant($ability)
    {
        return !$this->can($ability);
    }
}

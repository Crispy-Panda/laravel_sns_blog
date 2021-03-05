<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * usersとarticlesのリレーション設定
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * likesとarticlesのリレーション設定
     */
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\User', 'likes')->withTimestamps();
    }

    /**
     * ログインユーザーが記事をいいねしているかの判定
     * 
     * @param model
     * 
     * @return bool
     */
    public function isLikedBy(?User $user): bool
    {
        return $user
            ?(bool)$this->likes->where('id', $user->id)->count() : false;
    }

    /**
     * いいねをカウント
     * 
     * @return int
     */
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }
}

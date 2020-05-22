<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];       // $fillableを指定し、contentとuser_idを一気に保存出来るように
    
    public function user()
    {
        return $this->belongsTo(User::class);       // このMicropostのインスタンスが所属する1つのUser情報を戻す
    }                                               // 多対一の表現
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
}

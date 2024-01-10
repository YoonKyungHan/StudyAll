<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminRegistration extends Model
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name', 'email', 'password', 'is_admin', // 'is_admin' 컬럼 추가
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    // 비밀번호를 암호화하는 메소드
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
    protected $appends = [
        'profile_photo_url',
    ];
}

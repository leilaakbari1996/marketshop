<?php

namespace App\Models;

use App\Mail\otpMail;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function genrateOtp($email){
        $otp = random_int(1111,9999);
        $userquery = self::query()->where('email',$email);
        if($userquery->exists()){
            $user = $userquery->first();
            $user->update([
                'password' => bcrypt($otp)
            ]);
        }else{
            $user = User::query()->create([
                'email' => $email,
                'password' => bcrypt($otp),
                'role_id' => Role::findByTitle('user')->id,
            ]);
        }
        Mail::to($user->email)->send(new otpMail($otp));
        return $user;
    }
    public function likes(){
        return $this->belongsToMany(Product::class,'likes')->withTimestamps();
    }
    public static function likeProduct(Product $product){
        $user = auth()->user();
        $isLikeBefore = $user->likes()->where('product_id',$product->id)->exists();
        if(!$isLikeBefore){
           return $user->likes()->attach($product);
        }
        return $user->likes()->detach($product);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class posts extends Model
{
    protected $fillable = ['created_by','shop_id','purchase_item','purchase_quantity','price','currency','title','description','purchase_img','viewer','start_date','end_date','discount_type'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];

    // Accessor to automatically calculate status
    public function getStatusAttribute($value)
    {
        $now = Carbon::now();

        if ($now->lt($this->start_date)) {
            return 'inactive';
        } elseif ($now->between($this->start_date, $this->end_date)) {
            return 'active';
        } elseif ($this->end_date && $now->gt($this->end_date)) {
            return 'expired';
        }

        // Return the database value if none of the conditions match
        return $value ?: 'draft';
    }
    public function admin(){
        return $this->belongsTo(users::class,'created_by');
    }

    public function discount_percentage(){
        return $this->hasOne(post_detail_percentages::class,'post_id')->withDefault([
        'discount' => "0"
    ]);
    }

    public function discount_free(){
        return $this->hasOne(post_detail_frees::class,'post_id')->withDefault([
        'free_item' => '',
        'free_quantity' => 0,
        'free_img' => 'img-icon.png'
    ]);;
    }

    public function shop(){
        return $this->belongsTo(shops::class,'shop_id');
    }

    // Helper methods for checking status
    public function isActive()
    {
        return $this->status === 'active';
    }

    public function isInactive()
    {
        return $this->status === 'inactive';
    }

    public function isExpired()
    {
        return $this->status === 'expired';
    }
}

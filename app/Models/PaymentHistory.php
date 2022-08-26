<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'due_id',
        'due_title',
        'membership_id',
        'name',
        'amount',
        'transaction_id',
        'ref_id',
        'paid_at',
        'status',
    ];
}

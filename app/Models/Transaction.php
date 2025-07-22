<?php

namespace App\Models;

use App\Enums\TransactionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Symfony\Component\Yaml\Yaml;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'nominal_id',
        'player_id',
        'final_price',
    ];
    protected $casts = [
        'status' => TransactionStatus::class
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nominal()
    {
        return $this->belongsTo(Nominal::class);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($m) {
            if (empty($m->trx_id)) {
                $m->trx_id = self::generateTransactionId();
            }
        });
    }

    public static function generateTransactionId()
    {
        $prefix = 'TRX' . now()->format('Ym');

        $latestTransaction = self::where('trx_id', 'like', $prefix . '%')->latest('id')->first();

        if (!$latestTransaction) {
            $numberId = 1;
        } else {
            $lastNumber = str_replace($prefix, '', $latestTransaction->trx_id);
            $numberId = (int) $lastNumber + 1;
        }

        return $prefix . str_pad($numberId, '4', '0', STR_PAD_LEFT);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    use HasFactory;

    protected $table = 'advertisers';

    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'date_of_birth',
        'company_name',
        'description',
        'store_address'
<<<<<<< HEAD

    ];

=======
    ];

    /**
     * The user that owns the advertiser.
     */
>>>>>>> c7ca8436e5e826b81c800e9a8d727d2a60edd91c
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

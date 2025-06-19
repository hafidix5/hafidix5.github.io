<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class detail_pesanans extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detail_pesanans';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'pesanans_id', 'barangs_id', 'jumlah_dipesan', 'jumlah_diterima'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the Pesanan for this model.
     *
     * @return App\Models\Pesanan
     */
    public function Pesanan()
    {
        return $this->belongsTo('App\Models\pesanans', 'pesanans_id', 'id');
    }

    /**
     * Get the Barang for this model.
     *
     * @return App\Models\Barang
     */
    public function Barang()
    {
        return $this->belongsTo('App\Models\barangs', 'barangs_id', 'id');
    }

    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return $this->asDateTime($value)->format('j/n/Y g:i A');
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return $this->asDateTime($value)->format('j/n/Y g:i A');
    }
}

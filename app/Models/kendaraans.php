<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kendaraans extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kendaraans';

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
    protected $fillable = [
                  'id',
                  'jenis',
                  'pengguna'
              ];

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
     * Get the konsumsiBbm for this model.
     *
     * @return App\Models\KonsumsiBbm
     */
    public function konsumsiBbm()
    {
        return $this->hasOne('App\Models\konsumsi_bbms','kendaraans_id','id');
    }

    /**
     * Get the service for this model.
     *
     * @return App\Models\Service
     */
    public function service()
    {
        return $this->hasOne('App\Models\services','kendaraans_id','id');
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

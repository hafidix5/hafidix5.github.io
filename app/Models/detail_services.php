<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_services extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detail_services';

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
                  'item_services_id',
                  'biaya',
                  'services_id'
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
     * Get the ItemService for this model.
     *
     * @return App\Models\ItemService
     */
    public function ItemService()
    {
        return $this->belongsTo('App\Models\item_services','item_services_id','id');
    }

    /**
     * Get the Service for this model.
     *
     * @return App\Models\Service
     */
    public function Service()
    {
        return $this->belongsTo('App\Models\services','services_id','id');
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

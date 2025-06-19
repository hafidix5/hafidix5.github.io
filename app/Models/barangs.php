<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barangs extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'barangs';

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
                  'nama',
                  'categorys_id',
                  'satuans_id',
                  'stok',
                  'harga'
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
     * Get the Category for this model.
     *
     * @return App\Models\Category
     */
    public function Category()
    {
        return $this->belongsTo('App\Models\categorys','categorys_id','id');
    }

    /**
     * Get the Satuan for this model.
     *
     * @return App\Models\Satuan
     */
    public function Satuan()
    {
        return $this->belongsTo('App\Models\satuans','satuans_id','id');
    }

    /**
     * Get the detailPesanan for this model.
     *
     * @return App\Models\DetailPesanan
     */
    public function detailPesanan()
    {
        return $this->hasOne('App\Models\detail_pesanans','barangs_id','id');
    }

    /**
     * Get the stokopname for this model.
     *
     * @return App\Models\Stokopname
     */
    public function stokopname()
    {
        return $this->hasOne('App\Models\stokopnames','barangs_id','id');
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

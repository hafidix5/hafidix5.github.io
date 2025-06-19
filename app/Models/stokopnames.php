<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stokopnames extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stokopnames';

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
                  'tanggal',
                  'barangs_id',
                  'penerima',
                  'jumlah_masuk',
                  'jumlah_keluar'
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
     * Get the Barang for this model.
     *
     * @return App\Models\Barang
     */
    public function Barang()
    {
        return $this->belongsTo('App\Models\barangs','barangs_id','id');
    }

    /**
     * Set the tanggal.
     *
     * @param  string  $value
     * @return void
     */
   /*  public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = !empty($value) ? \DateTime::createFromFormat('j/n/Y g:i A', $value) : null;
    } */

    /**
     * Get tanggal in array format
     *
     * @param  string  $value
     * @return array
     */
  /*   public function getTanggalAttribute($value)
    {
        return \DateTime::createFromFormat($this->getDateFormat(), $value)->format('j/n/Y g:i A');
    } */

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

<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoconnectt extends Model {

    use HasFactory ;
    protected $table ='info_connect';
    protected $fillable =[''];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

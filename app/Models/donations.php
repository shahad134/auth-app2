<?php 


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donations extends Model {

    use HasFactory ;
    protected $table ='list_donation';
    protected $fillable =[''];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

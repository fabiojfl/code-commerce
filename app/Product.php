<?php namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'name',
        'description',
        'price',
        'featured',
        'recommend',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('CodeCommerce\Category');
    }

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function tags()
    {
        return $this->belongsToMany('CodeCommerce\Tag');
    }

    public function getNameDescriptionAttribute()
    {
        return $this->name." - ".$this->description;
    }


    public function getTagListAttribute()
    {
        $tags = $this->tags()->lists('name');
        return implode(', ',$tags);
    }

    public function setTagAttribute($empty)
    {
        $value =  implode(',', $empty);
        return $this->tags()->attach($value);
    }


}

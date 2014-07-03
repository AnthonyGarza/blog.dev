<?php

class Post extends BaseModel {


	// The db table this model relates to
    protected $table = 'posts';

    // Validation rules for  our model properties
    public static $rules = [
    	'title' => 'required|max:100',
    	'body' => 'required|max:10000'
    ];

}
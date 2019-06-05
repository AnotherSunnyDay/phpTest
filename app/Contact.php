<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Event;

class Contact extends Model
{
    protected $fillable = array('name', 'email', 'message');

    public static function boot() {

        parent::boot();
    
        static::created(function($contact) {
            Event::fire('contact.created', $contact);
        });

    }
}

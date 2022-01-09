<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupAdmin extends Model
{
    use HasFactory;

    
    protected $table = 'groupadmins';

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    /**
     * Get all of the group_posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function group_posts(): HasMany
    {
        return $this->hasMany(GroupPost::class, 'user_id');
    }
 /**
     * Get all of the group_posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function campaigns(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

}
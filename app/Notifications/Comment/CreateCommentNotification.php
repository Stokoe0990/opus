<?php

namespace App\Notifications\Comment;

use Auth;
use App\Models\Comment;
use App\Notifications\BaseNotification;
use Illuminate\Notifications\Messages\SlackMessage;

class CreateCommentNotification extends BaseNotification
{
    protected $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function toSlack()
    {
        //
    }
}

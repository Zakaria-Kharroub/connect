<?php

namespace App\Services;

use App\Repositories\InterFaces\MessagesInterFaces;
use App\Services\serviceInterFaces\ServicesInterFace;

class MessagingService implements ServicesInterFace
{

    protected $messagesRepo;

    public function __construct(MessagesInterFaces $messagesRepo)
    {
        $this->messagesRepo = $messagesRepo;
    }

    public function getMessagesByUser($userId)
    {
        return $this->messagesRepo->recieveMessage($userId);
    }

}

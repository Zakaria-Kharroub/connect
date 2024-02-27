<?php

namespace App\Services;

use App\Services\serviceInterFaces\ServicesInterFace;

class MessagingService implements ServicesInterFace
{

    protected $messagesRepo;

    public function __construct(ServicesInterFace $messagesRepo)
    {
        $this->messagesRepo = $messagesRepo;
    }

    public function getMessagesByUser($userId)
    {
        return $this->messagesRepo->getMessagesByUser($userId);
    }

}

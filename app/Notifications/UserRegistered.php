<?php

namespace App\Notifications;

use App\Entities\User;
use App\Mail\UserRegistered as UserRegisteredMail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification
{
    use Queueable;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param User $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param User $notifiable
     * @return UserRegisteredMail
     */
    public function toMail($notifiable)
    {
        return (new UserRegisteredMail($notifiable))->to($notifiable->email);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param User $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $notifiable->toArray();
    }
}

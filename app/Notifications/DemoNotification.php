<?php

namespace App\Notifications;

use App\Group;
use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Events\BroadcastNotificationCreated;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DemoNotification extends Notification
{
    use Queueable;

    public $group;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast','mail'];
    }


    public function toBroadcast($notification)
    {
        return new BroadcastManager([
            'time' => time(),
            'group'=>$this->group->id
        ]);
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

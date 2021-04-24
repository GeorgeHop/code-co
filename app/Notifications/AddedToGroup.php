<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AddedToGroup extends Notification
{
    use Queueable;

    protected $notifyData;

    public function __construct(array $notifyData)
    {
        $this->notifyData = $notifyData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('code.co.com@gmail.com', 'CodE-co Notification')
            ->greeting('Коде ку :) Вам сообщение')
            ->line('Привет ' . $this->notifyData['user']->name)
            ->line('вы были добавлены в группу по курсу ' . $this->notifyData['course']->name . ' название группы ' . $this->notifyData['group']->name . ' будьте готовы.')
            ->line('дата запуска ' . $this->notifyData['group']->launch_date)
            ->line('до встречи !');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

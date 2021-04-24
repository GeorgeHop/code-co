<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaidNotification extends Notification
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from('code.co.com@gmail.com', 'CodE-co Notification')
            ->greeting('Коде ку :) Вам сообщение')
            ->line('Привет ' . $notifiable->name)
            ->line('вы купили курс ' . $this->notifyData['course']->name . $this->notifyData['offer']->title . ' поздравляем ! Осталось еще немного, в данный момент мы собираем группу !')
            ->line('Как только вас добавят в группу вы получите сообщение !')
            ->line('Детали покупки')
            ->line('Тип курса : ' . $this->notifyData['offer']->title)
            ->line('Стоимость : ' . $this->notifyData['offer']->cost . ' ' . $this->notifyData['offer']->currency)
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

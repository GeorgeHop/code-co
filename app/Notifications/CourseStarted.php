<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CourseStarted extends Notification
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
            ->line('стартует курс ' . $this->notifyData['course']->name . ' ! Поспеши заскочить на борт ' . $this->notifyData['group']->name . ' без тебя не уйдем !')
            ->line('но дедлайны уже горят !')
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

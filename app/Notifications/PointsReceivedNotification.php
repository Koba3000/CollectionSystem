<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PointsReceivedNotification extends Notification
{
    use Queueable;


    protected $points;
    /**
     * Create a new notification instance.
     */
    public function __construct($points)
    {
        $this->points = $points;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Punkty dodane do Twojej zbiórki')
            ->greeting('Cześć ' . $notifiable->name . '!')
            ->line('Otrzymałeś ' . $this->points . ' punktów do swojej zbiórki.')
            ->line('Dziękujemy za korzystanie z naszego portalu!')
            ->action('Sprawdź zbiórkę', url('/collections'))
            ->line('Pozdrawiamy!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

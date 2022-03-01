<?php

declare(strict_types=1);

namespace App\Notifications\Moderation;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use JustSteveKing\LaravelToolkit\Contracts\DataObjectContract;

class NewPostWasCreated extends Notification
{
    use Queueable;

    /**
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): Illuminate\Notifications\Messages\MailMessage
    {
        return (new MailMessage)
            ->line('Howdy moderator!')
            ->line("A new Post was submitted for moderation.");
    }

    /**
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class HelpRequestCommented extends Notification
{
    use Queueable;

    private $help_request;
    private $answer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($help_request, $answer)
    {
        $this->help_request = $help_request;
        $this->answer = $answer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->line('Vous avez recu une nouvelle réponse à ' . $this->help_request->title)
                    ->action('Voir la réponse', route('help.show', $this->help_request->id))
                    ->line('Thank you for using our application!');
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
            'help_request_id' => $this->help_request->id,
            'answer_id' => $this->answer->id
        ];
    }
}

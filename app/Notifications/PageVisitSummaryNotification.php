<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PageVisitSummaryNotification extends Notification
{
    public $date;
    public $pageCount;
    public $referrerCount;

    public function __construct($date, $pageCount, $referrerCount)
    {
        $this->date = $date;
        $this->pageCount = $pageCount;
        $this->referrerCount = $referrerCount;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('✅ Page Visit Summary Completed')
            ->greeting('Hello!')
            ->line("Daily summarization completed for {$this->date}.")
            ->line("Page Stats Entries: {$this->pageCount}")
            ->line("Referrer Stats Entries: {$this->referrerCount}")
            ->line('You’re good to go! 👍');
    }
}

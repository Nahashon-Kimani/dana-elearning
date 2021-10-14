<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCourseCreated extends Notification
{
    use Queueable;

    public $course;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
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
        // Add one day to let the course be prepared fully

        // $date = Carbon::create($this->course->created_at);
        // $date = $date->format('F d, Y');


        return (new MailMessage)
                    ->greeting('Hello,')
                    ->subject('Hey New Course Available: '.$this->course->name)
                    ->line('Registration starts on '. $this->course->created_at)
                    ->line('Build technical and transferable skills needed for a career in high-growth industries. The course material from the Bachelor of Science (BSc) in Computer Science from the University of London ranges from entry-level subjects to specialised topics. If you hold a degree outside of computer science, the degree’s curriculum allows you to update your marketable and competitive skills through commercial applications of computing practices. This flexible degree is designed for busy schedules. Students can study online at their own pace, so you can study online at your own pace.')
                    ->action('Learn More', url(route('website.course')))
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
            //
        ];
    }
}

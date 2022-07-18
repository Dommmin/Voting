<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class CommentNotifications extends Component
{
    const NOTIFICATION_TRESHOLD = 20;
    public $notifications;
    public $notificationCount;
    public $isLoading;

    protected $listeners = ['getNotifications'];

    public function mount()
    {
        $this->notifications = collect([]);
        $this->isLoading = true;
        $this->getNotificationCount();
    }

    public function getNotificationCount()
    {
        $this->notificationCount = auth()->user()->unreadNotifications()->count();

        if ($this->notificationCount > self::NOTIFICATION_TRESHOLD) {
            $this->notificationCount = self::NOTIFICATION_TRESHOLD.'+';
        }
    }

    public function getNotifications()
    {
        $this->notifications = auth()->user()
            ->unreadNotifications()
            ->take(self::NOTIFICATION_TRESHOLD)
            ->get();

        $this->isLoading = false;
    }

    public function markAsRead($notificationId)
    {
        if (auth()->guest()) {
            abort(404);
        }

        $notification = DatabaseNotification::findOrFail($notificationId);
        $notification->markAsRead();

        $this->scrollToComment($notification);
    }

    public function scrollToComment($notification)
    {
        $idea = Idea::find($notification->data['idea_id']);
        if (! $idea) {
            session()->flash('error_message', 'This idea no longer exists!');

            return redirect()->route('idea.index');
        }

        $comment = Comment::find($notification->data['comment_id']);
        if (! $comment) {
            session()->flash('error_message', 'This comment no longer exists!');

            return redirect()->route('idea.index');
        }

        $comments = $idea->comments()->pluck('id');
        $indexOfComment = $comments->search($comment->id);

        $page = (int) ($indexOfComment / $comment->getPerPage()) + 1;

        session()->flash('scrollToComment', $comment->id);

        return redirect()->route('idea.show', [
            'idea' => $notification->data['idea_slug'],
            'page' => $page,
        ]);
    }

    public function markAllAsRead()
    {
        if (auth()->guest()) {
            abort(404);
        }

        auth()->user()->unreadNotifications->markAsRead();
        $this->getNotificationCount();
        $this->getNotifications();
    }

    public function render()
    {
        return view('livewire.comment-notifications');
    }
}

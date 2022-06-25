<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\Job;
use App\Models\Order;
use App\Models\Post;
use App\Models\Report;
use App\Models\Subscriber;
use App\Models\User;
use Livewire\Component;

class AdminInterface extends Component
{
    public function render()
    {
        $jobs=Job::count();
        $active=Job::active()->count();
        $pending=Job::where('status_id',1)->count();
        $messages=Contact::count();
        $unread=Contact::unread()->count();
        $response=Contact::whereNotNull('response')->count();
        $reported=Job::active()->whereHas('reports')->count();
        $reports=Report::count();
        $users=User::count();
        $employers=User::role('Employer')->count();
        $jobseekers=User::role('User')->count();
        $subscribers=Subscriber::count();
        $posts=Post::count();
        $posts_active=Post::where('status',0)->count();
        $order=Order::count();
        $order_pending=Order::where('progress_id',2)->count();
        $order_abandoned=Order::where('progress_id',1)->count();
        return view('livewire.admin-interface',[
            'jobs'=>$jobs,
            'active'=>$active,
            'pending'=>$pending,
            'messages'=>$messages,
            'unread'=>$unread,
            'response'=>$response,
            'reported'=>$reported,
            'reports'=>$reports,
            'users'=>$users,
            'employers'=>$employers,
            'jobseekers'=>$jobseekers,
            'subscribers'=>$subscribers,
            'posts'=>$posts,
            'posts_active'=>$posts_active,
            'order'=>$order,
            'order_pending'=>$order_pending,
            'order_abandoned'=>$order_abandoned,
        ]);
    }
}

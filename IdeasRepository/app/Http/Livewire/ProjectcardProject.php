<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Arr;
use Livewire\Component;

class ProjectcardProject extends Component
{
    public $project;

    public function mount()
    {
        $createdDate = \Carbon\Carbon::parse($this->project['created_at'])->format('l, d F Y H:i');

        $this->project = Arr::prepend($this->project, $this->getDiffereceBtDates(), 'datesDiff');
        $this->project = Arr::prepend($this->project, $this->getProfileImage(), 'userProfileImage');
        $this->project = Arr::prepend($this->project, $createdDate, 'created');
    }

    public function render()
    {
        return view('livewire.projectcard-project', ['project'=> $this->project]);
    }

    /**
     * Gets image form profile photo of user
     * 
     * @return string
     */
    private function getProfileImage()
    {
        $user = User::firstWhere('id', $this->project['user_id']);
        return $user->profile_photo_url;
    }

    /**
     * Shows a message displaying how much time difference the update and now
     * 
     * @return string
     */
    private function getDiffereceBtDates(): String
    {
        $to = \Carbon\Carbon::now();
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $this->project['updated_at']);

        $diff = $to->diffInSeconds($from);
        
        switch ($diff) {
            case ($diff >= 31540000) :
                // Years
                $diff = $to->diffInWeeks($from);
                $diff = $diff.($diff == 1 ? ' Year': ' Years');
                break;
            case ($diff >= 2628000) :
                // Weeks
                $diff = $to->diffInMonths($from);
                $diff = $diff.($diff == 1 ? ' Month': ' Months');
                break;
            case ($diff >= 604800) :
                // Weeks
                $diff = $to->diffInWeeks($from);
                $diff = $diff.($diff == 1 ? ' Week': ' Weeks');
                break;
            case ($diff >= 86400) :
                // Days
                $diff = $to->diffInDays($from);
                $diff = $diff.($diff == 1 ? ' Day': ' Days');
                break;
            case ($diff >= 3600) :
                // Hours
                $diff = $to->diffInHours($from);
                $diff = $diff.($diff == 1 ? ' Hour': ' Hours');
                break;
            case ($diff >= 60) :
                // Minutes
                $diff = $to->diffInMinutes($from);
                $diff = $diff.($diff == 1 ? ' Min': ' Mins');
                break;
            default:
                $diff = $diff.($diff == 1 ? ' second': ' seconds');
                break;
        }

        return $diff;
    }
}

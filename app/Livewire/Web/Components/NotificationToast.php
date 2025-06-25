<?php

namespace App\Livewire\Web\Components;

use Livewire\Component;

class NotificationToast extends Component
{

    public $show = false;
    public $type = 'info';
    public $message = '';

    protected $listeners = ['notification', 'hideNotification'];

    public function notification($data)
    {
        $this->type = $data['type'] ?? 'info';
        $this->message = $data['message'] ?? '';
        $this->show = true;

        $this->dispatch('hide-notification', ['timeout' => 3000]);
    }

    public function hideNotification()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.web.components.notification-toast');
    }
}

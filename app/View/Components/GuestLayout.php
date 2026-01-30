<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * envoyer la vue pour le composant.
     */
    public function render(): View
    {
        return view('layouts.guest');
    }
}

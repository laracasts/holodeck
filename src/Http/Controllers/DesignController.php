<?php

namespace Laracasts\Holodeck\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class DesignController
{
    public function __invoke()
    {
        return Inertia::render('Holodeck/Design', [
            'pagination' => User::paginate(1, pageName: 'standardPagination')->onEachSide(2)->withQueryString(),
            'simplePagination' => User::simplePaginate(2, pageName: 'simplePagination')->withQueryString(),
        ]);
    }
}

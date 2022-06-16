<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Display extends Component
{
    use WithPagination;
    public $sortby = "asc",
        $searchTerm = null,
        $birthdays = null;

    public function exportUser(){
        dd('export');
    }

    public function render()
    {
        DB::enableQueryLog();
        $Users = User::when($this->searchTerm, function ($q) {
            return $q->where('name', 'like', '%' . $this->searchTerm . '%');
        })

            ->whereNotNull('date_of_birth')
            ->where(function ($q) {
                return $q->when($this->birthdays, function ($q) {
                    return $q->whereMonth('date_of_birth', '>', date('m'))
                        ->orWhere(function ($query) {
                            $query->whereDay('date_of_birth', '>=', date('d'))
                                ->whereMonth('date_of_birth', '=', date('m'));
                        });
                });
            })
            ->orderBy('date_of_birth')->paginate(10);

        return view('livewire.user.list', [
            'Users' => $Users,
        ]);
    }
}

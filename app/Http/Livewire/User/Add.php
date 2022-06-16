<?php

namespace App\Http\Livewire\User;

use App\Imports\More_UserImport as ImportsMore_UserImport;
use Livewire\Component;
use App\Models\Area;
use App\Models\User;
use App\Models\UserUser;
use App\Models\More_UserImport; 
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Facades\Excel;
class Add extends Component
{

    public $new_relation = [["title" => ""]];
    public $area_id,
        $message,
        $name, $email, $pasword, $password,
        $phone, $gender, $date_of_birth,
        $user_id,
        $deleterelation,
        $date_of_death;

    public function mount($user_id = null)
    {
        if (intval($user_id) > 0) {
            $this->user_id = $user_id;
            $user = User::find($user_id);
            $this->name = $user->name;
            $this->email = $user->email;
            $this->password = $user->password;
            $this->phone = $user->phone;
            $this->gender = $user->gender;
            $this->date_of_birth = date("Y-m-d", strtotime($user->date_of_birth));
            $this->date_of_death = date("Y-m-d", strtotime($user->date_of_death));
            $this->relationship = $user->relationship;
        }
    }
    public function addrelation()
    {
        $this->new_relation[] = [];
    }

    public function deleterelation($index)
    {
        if (count($this->new_relation) == 1) {
            $this->message = "Cannot delete Relation";
            return false;
        } else {
            unset($this->new_relation[$index]);
        }
    }
        public function uploadExcel(Request $request){
            $request->validate([
                'excel_file' => 'required|mimes:xlsx'
            ]);
            Excel::import(new ImportsMore_UserImport, $request->file('excel_file'));
            return redirect('/')->with('success', 'upload Excell File Sucessfully !');
        }
    public function Send()
    {
        // $this->validate([
        //     "name" => "required",
        //     "email" => "required",
        //     "pasword" => "required",
        //     "phone" => "required",
        //     "date_of_birth" => "required",
        //     "areaid" => "required",

        // ]);
        if ($this->user_id) {
            $user = User::find($this->user_id);
        } else {
            $user = new User();
        }
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->phone = $this->phone;
        $user->gender = $this->gender;
        $user->date_of_birth = $this->date_of_birth;
        $user->date_of_death = $this->date_of_death;
        $user->save();


        if (count($this->new_relation) > 0) {
            foreach ($this->new_relation as $index => $var) {
                $relation = $user->family()->create([
                    'name' => $var['name'],
                    'email' => $var['email'],
                    'password' => '123123',
                    'phone' => $var['phone'],
                    'gender' => $var['gender']
                ]);
                $user->family()->updateExistingPivot($relation, array('relationship' => $var['relationship']), false);
            }

            session()->flash('message', 'Save successfully ............');
        }
    }


    public function resetFilters()
    {
        $this->reset(['name', 'email', 'gender', 'password', 'phone', 'date_of_birth', 'date_of_death']);
    }
    
    public function render()
    {
        $area = Area::all();
        return view('livewire.user.add', ["area" => $area]);
    }
}

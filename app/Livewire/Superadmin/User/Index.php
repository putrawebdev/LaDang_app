<?php

namespace App\Livewire\Superadmin\User;

use App\Models\User;
use App\Models\Post;
use FontLib\Table\Type\post as TypePost;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    // Public Variable
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $paginate = '10';
    public $search = '';
    public $title = 'Data User';
    public $name;
    public $email;
    public $role;
    public $password;
    public $password_confirmation;
    public $user_id;

    // Public Function
    public function render()
    {
        $data = array(
            'user' => User::
                where('name', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->orWhere('role', 'like', $this->search)
                ->orderBy('role', 'asc')
                ->paginate($this->paginate),
        );
        return view('livewire.superadmin.user.index', $data);
    }
    public function create(){
        $this->resetValidation();
        $this->reset();
    }
    public function store(){
        $this-> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        $user->password = Hash::make($this->password);
        $user->save();
        $this->dispatch('disableModalCreate'); 
    }
    public function edit($id){
        $this->resetValidation();
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }
    public function update($id){
        $user = User::findOrFail($id);
        $this-> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required',
            'password' => 'nullable|min:8|confirmed',
        ]);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        if($this->password){
            $user->password = Hash::make($this->password);
        }
        $user->save();
        $this->dispatch('disableModalUpdate');
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user-> delete();
        $this-> dispatch('disableModalDelete');
    }
}

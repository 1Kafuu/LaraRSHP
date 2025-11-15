<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserModal extends Component
{
    public $isOpen = false;
    public $userId;
    public $nama_user;
    public $email;
    public $password;

    public function openModal($mode, $id = null)
    {
        $this->resetForm();

        if ($mode === 'create') {
            $this->isOpen = true;
        }

        if ($mode === 'edit' && $id) {
            $user = User::find($id);
            if ($user) {
                $this->userId = $user->iduser;
                $this->nama_user = $user->nama;
                $this->email = $user->email;
                $this->isOpen = true;
            }
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['userId', 'nama_user', 'email', 'password']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->userId ?? 'NULL') . ',iduser',
            'password' => $this->userId ? 'nullable|min:6' : 'required|min:6',
        ]);

        $data = [
            'nama' => $this->nama_user,
            'email' => $this->email,
        ];

        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }

        User::updateOrCreate(
            ['iduser' => $this->userId],
            $data
        );

        $this->closeModal();
        session()->flash('message', 'User berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.user-modal');
    }
}
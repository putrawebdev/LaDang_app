<?php

namespace App\Livewire\Superadmin\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\WithPagination;

class Index extends Component
{
    // Public Variable
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $paginate = '10';
    public $search = '';
    public $title = 'Data Kategori';
    public $name_kategori;
    public $kategori_id;

    // Public Function
    public function render()
    {
        $data = array(
            'kategori' => Kategori::
                where('name_kategori', 'like', '%'.$this->search.'%')
                ->paginate($this->paginate),
        );
        return view('livewire.superadmin.kategori.index' , $data);
    }
    public function create(){
        $this->resetValidation();
        $this->reset();
    }
    public function store(){
        $this-> validate([
            'name_kategori' => 'required',
        ]);
        $kategori = new Kategori();
        $kategori->name_kategori = $this->name_kategori;
        $kategori->save();
        $this->dispatch('disableModalCreate'); 
    }
    public function edit($id){
        $this->resetValidation();
        $kategori = Kategori::findOrFail($id);
        $this->kategori_id = $id;
        $this->name_kategori = $kategori->name_kategori;
    }
    public function update($id){
        $kategori = Kategori::findOrFail($id);
        $this-> validate([
            'name_kategori' => 'required',
        ]);
        $kategori->name_kategori = $this->name_kategori;
        $kategori->save();
        $this->dispatch('disableModalUpdate');
    }
    public function delete($id){
        $kategori = Kategori::findOrFail($id);
        $this->kategori_id = $id;
        $this->name_kategori = $kategori->name_kategori;
    }

    public function destroy($id){
        $kategori = Kategori::findOrFail($id);
        $kategori-> delete();
        $this-> dispatch('disableModalDelete');
    }
}

<?php

namespace App\Livewire\Superadmin\Barang;

use App\Models\Barang;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    // Public Variable
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $paginate = '10';
    public $search = '';
    public $title = 'Data Barang';
    public $name_barang, $stok_barang, $harga, $barang_id, $kategori_id;

    // Public Function
    public function render()
    {
        $data = array(
            'barang' => Barang::select('barangs.*')
                    ->join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
                    ->orderBy('kategoris.name_kategori', 'asc') // atau 'desc'
                    ->with('kategori') // tetap eager load relasi
                    ->where('name_barang', 'like', '%'.$this->search.'%')
                    ->orWhere('kategori_id', 'like', '%'.$this->search.'%')
                    ->paginate($this->paginate),
            'kategori' => Kategori::all(),
        );
        return view('livewire.superadmin.barang.index', $data);
    }
    public function create(){
        $this->resetValidation();
        $this->reset();
    }
    public function store(){
        $this-> validate([
            'name_barang' => 'nullable',
            'harga' => 'nullable',
            'stok_barang' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);
        $barang = new Barang();
        $barang->name_barang = $this->name_barang;
        $barang->harga = $this->harga;
        $barang->kategori_id = $this->kategori_id;
        $barang->stok_barang = $this->stok_barang;
        $barang->save();
        $this->dispatch('disableModalCreate'); 
    }
    public function edit($id){
        $this->resetValidation();
        $barang = Barang::findOrFail($id);
        $this->barang_id = $id;
        $barang->name_barang = $this->name_barang;
        $barang->harga = $this->harga;
        $barang->kategori_id = $this->kategori_id;
        $barang->stok_barang = $this->stok_barang;
    }
    public function update($id){
        $barang = Barang::findOrFail($id);
        $this->barang_id = $id;
        $this-> validate([
            'name_barang' => 'nullable',
            'harga' => 'nullable',
            'stok_barang' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);
        $barang->name_barang = $this->name_barang;
        $barang->harga = $this->harga;
        $barang->kategori_id = $this->kategori_id;
        $barang->stok_barang = $this->stok_barang;
        $barang->save();
        $this->dispatch('disableModalUpdate');
    }
    public function delete($id){
        $barang = Barang::findOrFail($id);
        $this->barang_id = $id;
        $barang->name_barang = $this->name_barang;
        $barang->harga = $this->harga;
        $barang->kategori_id = $this->kategori_id;
        $barang->stok_barang = $this->stok_barang;
    }

    public function destroy($id){
        $barang = Barang::findOrFail($id);
        $barang-> delete();
        $this-> dispatch('disableModalDelete');
    }
}

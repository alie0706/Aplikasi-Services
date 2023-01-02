<?php
class Barang extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->model('model_konektor');
        $this->load->model('model_jenis_obat');
        $this->load->model('model_merk');
        $this->load->model('model_jenis');
        $this->load->model('model_kategori');
        
        chek_session();
    }


    function index()
    {
        $data['record'] = $this->model_barang->tampil_data();
        $this->template->load('template','barang/lihat_data',$data);
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'id_kategori'=>$kategori,
                                'harga'=>$harga);
            $this->model_barang->post($data);
            redirect('barang');
        }
        else{
            $this->load->model('model_kategori');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template','barang/form_input',$data);
        }
    }
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'id_kategori'=>$kategori,
                                'harga'=>$harga);
            $this->model_barang->edit($data,$id);
            redirect('barang');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->model_barang->get_one($id)->row_array();
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','barang/form_edit',$data);
        }
    }
    
    function cetak_barcode()
    {
      
            $kd=  $this->uri->segment(3);

            $data['record']     =  $this->model_barang->get_one_cek($kd)->result();
            
            //$this->load->view('transaksi_masuk/form_edit',$data);
            $this->load->view('cetak/cetak_barcode_barang',$data);
       
    }

    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_barang->delete($id);
        redirect('barang');
    }

    function cari_barang()
    {
        $cari = trim(strip_tags($_POST['keyword']));
		if($cari == '')
		{

		}else{
			
            $barang =  $this->model_barang->get_barang($cari)->result();
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Stok Barang</th>
				<th>S/N</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($barang as $hasil){?>
			<tr>
				<td><?php echo $hasil->kd_barang;?></td>
				<td><?php echo $hasil->nama_barang;?></td>
				<td><?php echo $hasil->stok;?></td>
				<td><?php echo $hasil->serial_number;?></td>
				<td><?php echo $hasil->keterangan;?></td>
				<td>
				<a href="<?php echo 'jual/'.$hasil->id_barang.'/'.$hasil->kd_barang ?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php	
		}
	
    }


    function cari_barang_update()
    {
        $cari = trim(strip_tags($_POST['keyword']));
		if($cari == '')
		{

		}else{
			
            $barang =  $this->model_barang->get_barang($cari)->result();
	?>
		<table class="table table-stripped" width="100%" id="example2">
			<tr>
				<th>Kode Barang</th>
				<th>Nama Barang</th>
				<th>Stok Barang</th>
				<th>S/N</th>
				<th>Keterangan</th>
				<th>Aksi</th>
			</tr>
		<?php foreach($barang as $hasil){?>
			<tr>
				<td><?php echo $hasil->kd_barang;?></td>
				<td><?php echo $hasil->nama_barang;?></td>
				<td><?php echo $hasil->stok;?></td>
				<td><?php echo $hasil->serial_number;?></td>
				<td><?php echo $hasil->keterangan;?></td>
				<td>
				<a href="<?php echo 'updatejual/'.$hasil->id_barang.'/'.$hasil->kd_barang ?>" 
					class="btn btn-success">
					<i class="fa fa-shopping-cart"></i></a></td>
			</tr>
		<?php }?>
		</table>
<?php	
		}
	
    }
    
    
}
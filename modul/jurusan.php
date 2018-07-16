<?php


include "config/fungsi_indotgl.php";
switch ($_REQUEST['jn']) {
	case 'tambah':
    ?>

    <section class="content-header">
      <h1>
        <i class='fa fa-graduation-cap'></i> Jurusan
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=jurusan"><i class="fa fa-graduation-cap"></i> Jurusan</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <section class="content">

    <div class="box box-success">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-plus-square"></i> Tambah Data Jurusan</h3>
</div>

<form action="?page=jurusan&jn=simpan" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Jurusan</label>
                  <input type="text" name="nama" class="form-control required" id="exampleInputPassword1" placeholder="Masukkan Nama Jurusan" required>
                </div>
                 
             
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</button>
                <button href="index.php?page=jurusan" type="reset" class="btn btn-warning" onclick=self.history.back()><i class="fa fa-close"></i> Kembali</button>
              </div>
            </form>
            </div>
            </div>
    
    <?php
    break;
  case 'simpan':


$nama       = $_REQUEST ['nama'];

//echo "$nim - $nama - $jk - $ttl - $tgl - $alamat - $prodi - $agama";

$simpan = "insert into prodi (nama) values('$nama')";


mysql_query($simpan);

header("location:index.php?page=jurusan");

    break;

    case 'ubah':
    $data_mahasiswa = mysql_query("select * from prodi where id_prodi='$_REQUEST[id_prodi]'");
    $n = mysql_fetch_array($data_mahasiswa) ;
    ?>

<section class="content-header">
      <h1>
        <i class='fa fa-graduation-cap'></i> 
        
      </h1>
     
    </section>
    <section class="content">

<form action="?page=jurusan&jn=simpanubah" method="post">
              <div class="box-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Id Jurusan</label>
              <input type="text" name="id_prodi" class="form-control required"  value="<?php echo $n['id_prodi']; ?>" readonly>

              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Nama Jurusan</label>
                  <input type="text" name="nama" class="form-control required"  value="<?php echo $n['nama']; ?>">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                 <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>

                <button href="index.php?page=fakultas" type="reset" class="btn btn-warning" onclick=self.history.back()><i class="fa fa-close"></i> Kembali</button>
              </div>
            </form>
            </div>
            </div>
    <?php
    break;


      case 'hapus':
    
    $hapus = "delete from prodi where id_prodi='$_REQUEST[id_prodi]'";

    mysql_query($hapus);

    header("location:index.php?page=jurusan");
    break;


	default:
		?>

  <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Home</li>
        <li class="active">Data Jurusan Pelatihan</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><center>Data Jurusan Pelatihan</center> </h1>
      </div>

    </div><!--/.row-->
                <div >
                  
                <a href="?page=jurusan&jn=tambah" class="btn btn-success" ><i class="fa fa-plus-square"></i>  Tambah Data</a>
                </div><p></p>
    <section class="content">


		<div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <div class="box-tools pull-right">
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Jurusan</th>
                  <th>Nama</th>
                  <th>Operasi</th>
                  
                </tr>
                </thead>

                <tbody>
    <?php
    $data_prodi = mysql_query("

      select * from prodi order by id_prodi DESC

      ");
    

    while ($n = mysql_fetch_array($data_prodi)) {
      $no++;
      echo "<tr>
                  <td>$no</td>
                  <td>$n[id_prodi]</td>
                  <td>$n[nama]</td>
                  
                  <td> 
                  
                  <a href='?page=jurusan&jn=hapus&id_prodi=$n[id_prodi]' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a>
                  </td>
                  
                </tr>";


    }
    ?>
    
                
              </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          


              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


		<?php
		break;
}
?>
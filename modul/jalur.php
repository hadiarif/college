<?php


switch ($_REQUEST['jl']) {
	case 'tambah':
    ?>

    <section class="content-header">
      <h1>
        <i class='fa fa-indent'></i> Jalur
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=fakultas"><i class="fa fa-indent"></i> Jalur</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <section class="content">

    <div class="box box-success">
<div class="box-header with-border">
<h3 class="box-title"><i class="fa fa-plus-square"></i> Tambah Data Jalur Seleksi Pendaftaran</h3>
</div>

<form action="?page=jalur&jl=simpan" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Jalur Seleksi</label>
                  <input type="text" name="nama" class="form-control required" id="exampleInputPassword1" placeholder="Masukkan Nama jalur" required>
                </div>
               
                
               
               
                <div class="checkbox">
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</button>
                <button href="index.php?page=jalur" type="reset" class="btn btn-warning" onclick=self.history.back()><i class="fa fa-close"></i> Kembali</button>
              </div>
            </form>
            </div>
            </div>
    
    <?php
    break;
  case 'simpan':


$nama       = $_REQUEST ['nama'];



//echo "$nim - $nama - $jk - $ttl - $tgl - $alamat - $prodi - $agama";

$simpan = "insert into jalur (nama) values('$nama')";


mysql_query($simpan);

header("location:index.php?page=jalur");

    break;

    case 'ubah':
    $data_mahasiswa = mysql_query("select * from jalur where id_jalur='$_REQUEST[id_jalur]'");
    $n = mysql_fetch_array($data_mahasiswa) ;
    ?>

<section class="content-header">
      <h1>
        <i class='fa fa-indent'></i> Jalur
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=jalur"><i class="fa fa-indent"></i> Jalur</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <section class="content">

<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title"><i class="glyphicon glyphicon-edit"></i> Ubah Data Jalur</h3>
</div>

<form action="?page=jalur&jl=simpanubah" method="post">
              <div class="box-body">

              <div class="form-group">
                  <label for="exampleInputEmail1">Id Jalur</label>
              <input type="text" name="idjalur" class="form-control required"  value="<?php echo $n['id_jalur']; ?>" readonly>

                <div class="form-group">
                  <label for="exampleInputEmail1">nama jalur</label>
                  <input type="text" name="nama" class="form-control required"  value="<?php echo $n['nama']; ?>">
                </div>
    
                <div class="checkbox">
                  
                </div>
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

    case 'simpanubah':
    //koneksi ke server

$idjalur= $_REQUEST ['idjalur'];
$nama       = $_REQUEST ['nama'];



//echo "$nim - $nama - $jk - $ttl - $tgl - $alamat - $prodi - $agama";


$simpan = "update  jalur set nama='$nama'
                  
                 
                  where id_jalur='$idjalur'";


mysql_query($simpan);
header("location:index.php?page=jalur");
    break;

      case 'hapus':
    
    $hapus = "delete from jalur where id_jalur='$_REQUEST[id_jalur]'";

    mysql_query($hapus);

    header("location:index.php?page=jalur");
    break;


	default:
		?>

    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Home</li>
        <li class="active">Data Jalur</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><center>Data Jalur</center> </h1>
      </div>


    </div><!--/.row-->
    <a href="?page=jalur&jl=tambah" class="btn btn-success" ><i class="fa fa-plus-square"></i>  Tambah Data</a>
                <p></p>


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
                  <th>ID Jalur</th>
                  <th>Nama Jalur</th>
                  <th>Operasi</th>
                  
                  
                </tr>
                </thead>

                <tbody>
    <?php
    $data_jalur = mysql_query("

      select * from jalur order by id_jalur DESC





      ");
    




    while ($n = mysql_fetch_array($data_jalur)) {
      $no++;
      echo "<tr>
                  <td>$no</td>
                  <td>$n[id_jalur]</td>
                  <td>$n[nama]</td>
                  <td> 
                  <a href='?page=jalur&jl=ubah&id_jalur=$n[id_jalur]' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i></a>
                  
                  <a href='?page=jalur&jl=hapus&id_jalur=$n[id_jalur]' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a>
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
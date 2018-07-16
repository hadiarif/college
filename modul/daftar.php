<?php



include "config/fungsi_indotgl.php";
switch ($_REQUEST['pdft']) {
  case 'tambah':
    ?>
<div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Home</li>
        <li class="active">Form Pendaftaran</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><center>Formulir Pendaftaran Kursus Pelatihan</center> </h1>
      </div>
    </div><!--/.row-->

      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">

<form action="?page=daftar&pdft=simpan" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pendaftar</label>
                  <input type="text" name="nama" class="form-control required" id="exampleInputPassword1" placeholder="Masukkan Nama" required autofocus>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Kelamin</label>
                  <input name='jk' type='radio' value='L' />Pria 
                  <input name='jk' type='radio' value='P' />Wanita
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tempat Lahir</label>
                  <input type="text" name="tempatlahir" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Lahir</label>
                  <input type="date"   name="ttl" class="form-control" placeholder="Tanggal Lahir" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" placeholder="Alamat" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telepon</label>
                  <input type="text" name="telepon" class="form-control" id="exampleInputPassword1" placeholder="Telepon" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Handpone</label>
                  <input type="text" name="handpone" class="form-control" id="exampleInputPassword1" placeholder="Handpone" required>
                </div>

              

                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jalur Seleksi Pendaftaran</label>
                  <?php 
                  echo " 
                  <select name='jalur' class='form-control' required>
  <option value='' selected  >Pilih Jalur</option>";
  $jab=mysql_query("select * from jalur");
  while($j=mysql_fetch_array($jab)){
  echo "<option value='$j[id_jalur]'>$j[nama]</option>";
  }
  echo "</select>";
                  ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Pilih Jurusan 1</label>
                  <?php 
                  echo " 
                  <select name='pilihan1' class='form-control' required>
  <option value='' selected  >Pilih Jurusan 1</option>";
  $pil1=mysql_query("select * from Prodi");
  while($j=mysql_fetch_array($pil1)){
  echo "<option value='$j[id_prodi]'>$j[nama]</option>";
  }
  echo "</select>";
                  ?>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Pilih Jurusan2</label>
                  <?php 
                  echo " 
                  <select name='pilihan2' class='form-control'  required>
  <option value='' selected  >Pilih Jurusan 2</option>";
  $pil2=mysql_query("select * from Prodi");
  while($j=mysql_fetch_array($pil2)){
  echo "<option value='$j[id_prodi]'>$j[nama]</option>";
  }
  echo "</select>";
                  ?>
                </div>
                
                <div class="checkbox">
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>
                <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i> Reset</button>
                <button href="index.php?page=daftar" type="reset" class="btn btn-warning" onclick=self.history.back()><i class="fa fa-close"></i> Kembali</button>
              </div>
            </form>
            </div>
            </div>
    
    <?php
    break;
  case 'simpan':


$nama       = $_REQUEST ['nama'];
$jk       = $_REQUEST ['jk'];
$tempatlahir       = $_REQUEST ['tempatlahir'];
$ttl       = $_REQUEST ['ttl'];
$alamat       = $_REQUEST ['alamat'];
$telepon       = $_REQUEST ['telepon'];
$handpone       = $_REQUEST ['handpone'];
$email       = $_REQUEST ['email'];
$jalur       = $_REQUEST ['jalur'];
$pilihan1       = $_REQUEST ['pilihan1'];
$pilihan2       = $_REQUEST ['pilihan2'];


//echo "$nim - $nama - $jk - $ttl - $tgl - $alamat - $prodi - $agama";

$simpan = "insert into mahasiswa (nama,kelamin,tempat_lahir,tanggal_lahir,alamat,telepon,handpone,email,id_jalur,pilihan1,pilihan2) values('$nama','$jk','$tempatlahir','$ttl','$alamat','$telepon','$handpone','$email','$jalur','$pilihan1','$pilihan2')";


mysql_query($simpan);

header("location:index.php?page=daftar");

    break;

    case 'ubah':
    $data_mahasiswa = mysql_query("select * from mahasiswa where id_daftar='$_REQUEST[id_daftar]'");
    $n = mysql_fetch_array($data_mahasiswa) ;
    ?>

<section class="content-header">
      <h1>
        <i class='fa fa-users'></i> Pendaftar
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="index.php?page=daftar"><i class="fa fa-users"></i> Pendaftar</a></li>
        <li class="active">Ubah</li>
      </ol>
    </section>
    <section class="content">
    
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title"> <i class="glyphicon glyphicon-edit"></i> Ubah Data Pendaftar</h3>
</div>

<form action="?page=daftar&pdft=simpanubah" method="post">
                <div class="box-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">ID Pendaftar</label>
                <input type="text" name="id_daftar" class="form-control required"  value="<?php echo $n['id_daftar']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pendaftar</label>
                  <input type="text" name="nama" class="form-control required"  value="<?php echo $n['nama']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <?php  
                  echo "<input name='jk' type='radio' value='L'"; if($n['kelamin']=='L'){ echo "checked";} echo "/>Pria ";
                  echo "<input name='jk' type='radio' value='P'"; if($n['kelamin']=='P'){ echo "checked";} echo "/>Wanita ";
                  ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" name="tempatlahir" class="form-control required"  value="<?php echo $n['tempat_lahir']; ?>">
                </div>  

                
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="date" name="ttl" class="form-control required"  value="<?php echo $n['tanggal_lahir']; ?>">
                </div>  
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" name="alamat" class="form-control required"  value="<?php echo $n['alamat']; ?>">
                </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Telepon</label>
                  <input type="text" name="telepon" class="form-control required"  value="<?php echo $n['telepon']; ?>">
                </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Handpone</label>
                  <input type="text" name="handpone" class="form-control required"  value="<?php echo $n['handpone']; ?>">
                </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control required"  value="<?php echo $n['email']; ?>">
                </div> 
                <div class="form-group">
                  <label for="exampleInputEmail1">Jalur</label>
                  <?php 
                  echo "
                  <select class='form-control' name='jalur'>
  <option value='' selected >Pilih Jalur</option>";
  $jab=mysql_query("select * from jalur");
  while($j=mysql_fetch_array($jab)){
  if($n['id_jalur']==$j['id_jalur']){
  echo "<option value='$j[id_jalur]' selected='$n[id_jalur]'>$j[nama]</option>";
  } else {
  echo "<option value='$j[id_jalur]'>$j[nama]</option>";
  }
  }
  echo "</select>"; 
  ?>
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1">Pilihan1</label>
                  <?php 
                  echo "
                  <select class='form-control' name='pilihan1'>
  <option value='' selected >Pilih Jurusan</option>";
  $jab=mysql_query("select * from prodi");
  while($j=mysql_fetch_array($jab)){
  if($n['pilihan1']==$j['id_prodi']){
  echo "<option value='$j[id_prodi]' selected='$n[pilihan1]'>$j[nama]</option>";
  } else {
  echo "<option value='$j[id_prodi]'>$j[nama]</option>";
  }
  }
  echo "</select>"; 
  ?>
                </div>
                 <div class="form-group">
                  <label>Pilihan2</label>
                  <?php 
                  echo "
                  <select class='form-control' name='pilihan2'>
  <option value='' selected >Pilih Jurusan</option>";
  $jab=mysql_query("select * from prodi");
  while($j=mysql_fetch_array($jab)){
  if($n['pilihan2']==$j['id_prodi']){
  echo "<option value='$j[id_prodi]' selected='$n[pilihan2]'>$j[nama]</option>";
  } else {
  echo "<option value='$j[id_prodi]'>$j[nama]</option>";
  }
  }
  echo "</select>"; 
  ?>
                </div>

                
                <div class="checkbox">
                  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Submit</button>

                <button href="index.php?page=daftar" type="reset" class="btn btn-warning" onclick=self.history.back()><i class="fa fa-close"></i> Kembali</button>
              </div>
            </form>
            </div>
            </div>
    <?php
    break;

    case 'simpanubah':
    //koneksi ke server
$id_daftar       = $_REQUEST ['id_daftar'];
$nama               = $_REQUEST ['nama'];
$jk                 = $_REQUEST ['jk'];
$tempatlahir        = $_REQUEST ['tempatlahir'];
$ttl                = $_REQUEST ['ttl'];
$alamat             = $_REQUEST ['alamat'];
$telepon            = $_REQUEST ['telepon'];
$handpone           = $_REQUEST ['handpone'];
$email              = $_REQUEST ['email'];
$jalur              = $_REQUEST ['jalur'];
$pilihan1           = $_REQUEST ['pilihan1'];
$pilihan2           = $_REQUEST ['pilihan2'];


//echo "$nim - $nama - $jk - $ttl - $tgl - $alamat - $prodi - $agama";


$simpan = "update  mahasiswa set nama           ='$nama',
                                  kelamin       = '$jk',
                                  tempat_lahir  = '$tempatlahir',
                                  tanggal_lahir = '$ttl',
                                  alamat        = '$alamat',
                                  telepon       = '$telepon',
                                  handpone      = '$handpone',
                                  email         = '$email',
                                  id_jalur      = '$jalur',
                                  pilihan1      = '$pilihan1',
                                  pilihan2      = '$pilihan2'
                                 
                 
                                  where id_daftar='$id_daftar'";


mysql_query($simpan);
header("location:index.php?page=daftar");
    break;




      case 'hapus':
    
    $hapus = "delete from mahasiswa where id_daftar='$_REQUEST[id_daftar]'";

    mysql_query($hapus);

    header("location:index.php?page=daftar");
    break;

  default:
    ?>


    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Home</li>
        <li class="active">Data Pendaftar</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><center>Data Pendaftar</center> </h1>
      </div>
    </div><!--/.row-->

      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                  <th>No</th>
                  
                  <th>Nama Pendaftar</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>Jalur Daftar</th>
                 <th>Pilihan Jurusan 1</th>
                 <th>Pilihan Jurusan 2</th>
                  <th>Operasi</th>
                </tr>
                </thead>

                <tbody>
                

    <?php

    $data_mahasiswa = mysql_query("

      select m.*, j.nama as Jalur, s.nama as Statuse, p.nama as pil1, pr.nama as pil2
          from mahasiswa m
          left outer join jalur j on j.id_jalur = m.id_jalur
          left outer join statuslulus s on s.id_statuslulus = m.id_statuslulus
          inner join prodi p on p.id_prodi = m.pilihan1 
          inner join prodi pr on pr.id_prodi = m.pilihan2 
          
           
          
          
          
      ");
    

function jk($var){
  if($var=="P"){
    echo "Perempuan";
  }else {
    echo "Laki-Laki";
  }
  }


    while ($n = mysql_fetch_array($data_mahasiswa)) {
      $no++;
      echo "<tr>
                  <td>$no</td>
                  <td>$n[nama]</td>
                  <td>";jk($n[kelamin]); echo "</td>
                  <td>".tgl_indo($n[tanggal_lahir])."</td>
                  <td>$n[Jalur]</td>
                  <td>$n[pil1]</td>
                  <td>$n[pil2]</td>
                  <td> 
                  <a href='?page=daftar&pdft=ubah&id_daftar=$n[id_daftar]' class='btn btn-warning'><i class='glyphicon glyphicon-edit'></i></a>
                  
                  <a href='?page=daftar&pdft=hapus&id_daftar=$n[id_daftar]' class='btn btn-danger'><i class='glyphicon glyphicon-trash'></i></a>
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
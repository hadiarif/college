<?php

switch ($_REQUEST['ps']) {

 case 'lulus':
  
    break;


  default:
  ?>

    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Home</li>
      </ol>
    </div><!--/.row-->
    
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><center>Halaman Utama</center> </h1>
      </div>
    </div><!--/.row-->
    
    
    <div class="row">
    
      <div class="col-xs-6 col-md-6">
      <a href="?page=daftar&pdft=tambah">
        <div class="panel panel-default bg-success">
          <div class="panel-body easypiechart-panel">
            <h4>Form Pendaftaran</h4>
            <div class="easypiechart" ><svg class="glyph stroked blank document"><use xlink:href="#stroked-blank-document"/></svg>
            </div>
          </div>
        </div>
        </a>
      </div>   

      <div class="col-xs-6 col-md-6">
      <a href="?page=daftar">
        <div class="panel panel-default panel-teal">
          <div class="panel-body easypiechart-panel">
            <h4>Data Pendaftar</h4>
            <div class="easypiechart" ><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
            </div>
          </div>
        </div>
        </a>
      </div>

 <div class="col-xs-6 col-md-3">
      <a href="?page=jalur">
      <div class="active">
        <div class="panel panel-primary bg-warning">
          <div class="panel-body easypiechart-panel">
            <h4>Data Jalur Seleksi Pendaftaran</h4>
            <div class="easypiechart" ><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg>
            </div>
          </div>
        </div>
        </div>
        </a>
      </div>

      <div class="col-xs-6 col-md-3">
      <a href="?page=jurusan">
        <div class="panel panel-default bg-warning">
          <div class="panel-body easypiechart-panel">
            <h4>Data Jurusan Pelatihan</h4>
            <div class="easypiechart" ><svg class="glyph stroked flag"><use xlink:href="#stroked-flag"/></svg>
            </div>
          </div>
        </div>
        </a>
      </div>

   
      
    
    <?php
    break;
}
?>
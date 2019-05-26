     <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Siswa
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="#">Data Induk</a></li>
            <li class="active">Daftar Siswa</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header" align="center">
                 <h3 class="box-title"></h3>
                  <button data-toggle="modal" data-target="#myModal" class='btn btn-primary'>Tambah Siswa</button>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Jenis Kelamin</th>
                            <th>Username</th>
                            <th>Kata Sandi</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=0;
                        foreach ($tests as $test):
                            $no++;
                        ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$test->NIS?></td>
                            <td><?=$test->Name?></td>
                            <td><?=$test->ClassName." - ".$test->MajorName?></td>
                            <td><?=$test->Gender?></td>
                            <td><?=$test->Username?></td>
                            <td><?=$test->Password?></td>
                            <td><a class="btn btn-success waves-effect" href="<?=$test->StudentID?>" title='Ubah'><i class='fa fa-edit'></i></a></td>
                            <td><a class="btn btn-danger waves-effect" href="<?=$test->StudentID?>" title='Hapus'> <i class='fa fa-eraser'></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


          <div class="modal" id="myModal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Siswa</h4>
                  </div>
                  <div class="row">
                    <div class="modal-body col-md-12">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>NIS</label>
                          <input type="text" name="NIS" class="form-control" placeholder="Masukan NIS siswa">
                        </div>
                        <div class="form-group">
                          <label>Nama</label>
                          <input type="text" name="Name" class="form-control" placeholder="Masukan nama siswa">
                        </div>
                        <div class="form-group">
                          <label>Kelas</label>
                          <input type="text" name="ClassID" class="form-control" placeholder="Masukan NIS Siswa">
                        </div>
                        <div class="form-group">
                          <label>Jenis Kelamin</label>
                          <div class="form-group">
                            <label>
                              <input type="radio" name="Gender" class="minimal" checked/> Laki-Laki
                            </label>&nbsp;
                            <label>
                              <input type="radio" name="Gender" class="minimal"/> Perempuan
                            </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Tempat Lahir</label>
                          <input type="text" name="BornCity" class="form-control" placeholder="Masukan tempat lahir">
                        </div>
                        <div class="form-group">
                          <label>Tanggal Lahir</label>
                          <input type="date" name="Born" class="form-control" placeholder="Masukan tanggal lahir">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Photo</label>
                          <input type="file" name="Photos">
                        </div>
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="Username" class="form-control" placeholder="Masukan username">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="Password" class="form-control" placeholder="Masukan password">
                        </div>
                        <div class="form-group">
                          <label>Konfirmasi Password</label>
                          <input type="text" name="Gender" class="form-control" placeholder="Masukan ulang password">
                        </div>
                        <div class="form-group has-success">
                          <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Input with success</label>
                          <input type="text" class="form-control" id="inputSuccess" placeholder="Enter ..."/>
                        </div>
                        <div class="form-group has-warning">
                          <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Input with warning</label>
                          <input type="text" class="form-control" id="inputWarning" placeholder="Enter ..."/>
                        </div>
                        <div class="form-group has-error">
                          <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> Input with error</label>
                          <input type="text" class="form-control" id="inputError" placeholder="Enter ..."/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-right">Save changes</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div>

    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?=base_url('assets/plugins/iCheck/icheck.min.js')?>" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });

      });
    </script>
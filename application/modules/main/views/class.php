
    <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Daftar Kelas
            <small></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li><a href="#">Data Induk</a></li>
            <li class="active">Daftar Kelas</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                 <h3 class="box-title"> </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
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
                            <td><?=$test->ClassName?></td>
                            <td><?=$test->MajorName?></td>
                            <td><a class="btn btn-success waves-effect" href="<?=$test->ClassID?>" title='Ubah'><i class='fa fa-edit'></i></a>
                                <a class="btn btn-danger waves-effect" href="<?=$test->ClassID?>" title='Hapus'> <i class='fa fa-eraser'></i></a></td>
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

    <script src="<?=base_url('assets/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
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
      });
    </script>
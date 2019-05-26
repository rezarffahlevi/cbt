 <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Beranda
            <small>Selamat bekerja!</small>
          </h1>
          <ol class="breadcrumb">
            <li class="active"><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">



          <div class="container-fluid">
            <div class="row clearfix">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <button class="btn btn-primary btn-lg btn-block waves-effect" type="button">STATUS SERVER <span class="badge">AKTIF</span></button>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <button class="btn bg-cyan btn-lg btn-block waves-effect" type="button">ID SERVER <span class="badge"><?=$server['host_name']?></span></button>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <button class="btn btn-primary btn-lg btn-block waves-effect" type="button">IP SERVER <span class="badge"><?=$server['remote_addr']?></span></button>
              </div>
            </div>
            <br>

          <div class="callout callout-info">
            <h4>Selamat datang.</h4>
            <p>Bekerja lah dengan ikhlas, tidak ada yang sia-sia di dunia ini. Tetap semangat walapun penat!</p>
          </div>
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              Start creating your amazing application!
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
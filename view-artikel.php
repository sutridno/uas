  <?php include 'header-artikel.php'; ?>
  <?php
  $id_artikel = $mysqli->real_escape_string($_GET['id_artikel']);
  $q_news  = $mysqli->query("SELECT * FROM tbl_artikel WHERE id_artikel = '$id_artikel'");
  $result_news = $q_news->fetch_array();
  ?>
  <section id="contentSection">

    <div class="row">

      <div class="col-lg-offset-2 col-lg-8 col-md-8 col-sm-8">

        <div class="left_content">

          <div class="single_page">

            <h1><?php echo $result_news['title']; ?></h1>

            <div class="post_commentbox"> 
              <span>
                <i class="fa fa-calendar"></i>
                <?php echo date('l, d F Y', strtotime($result_news['tanggal'])); ?>
              </span> 
            </div>

            <div class="single_page_content" style="text-align: justify;">
                
              <div class=" col-lg-12"><?php echo $result_news['content']; ?></div>

            </div>

            <hr>

            <div class="col-lg-12">

              <h5><u>KOMENTAR</u></h5>

              <?php
              $q_komentar = $mysqli->query("SELECT * FROM tbl_komentar WHERE id_artikel = '$id_artikel' ORDER BY tanggal DESC");
              while ($komentar = $q_komentar->fetch_array()) {
              ?>

              <div class="panel panel-default">

                <div class="panel-body">

                  <div class="form-group">

                    <label class="label-control"><u><?php echo $komentar['nama']; ?></u></label>
                    <code><?php echo $komentar['email']; ?></code>

                    <div>
                      <i><?php echo date('l, d F Y', strtotime($komentar['tanggal'])); ?></i>
                    </div>

                    <div style="margin-top: 10px;"></div> 

                    <p style="text-align: justify;"><?php echo $komentar['komentar']; ?></p>

                  </div>

                </div>

              </div>

              <?php } ?>

            </div>

            <div class="col-lg-12">

              <div class="panel panel-default">

                <div class="panel-heading">POST COMMENT</div>

                <div class="panel-body">

                  <div class="row">

                    <div class="col-lg-1"></div>

                    <div class="col-lg-10">

                      <form class="form-horizontal" action="input-komentar.php" method="POST">

                        <div class="form-group">
                          <input class="form-control input-md" type="text" placeholder="Nama" name="nama" required="true">
                        </div>

                        <div class="form-group">
                          <input class="form-control input-md" type="text" placeholder="Email" name="email" required="true">
                        </div>

                        <div class="form-group">
                          <textarea class="form-control input-md" type="text" placeholder="komentar" name="komentar" required="true"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary pull-right" value="<?php echo $id_artikel; ?>" name="input_komentar">SUBMIT</button>

                      </form>

                      <div class="col-lg-1"></div>

                    </div>

                  </div>
                  
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

  </section>

  <?php include 'footer-artikel.php'; ?>
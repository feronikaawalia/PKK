            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard Admin </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                </ul>
              </nav>
            </div>

            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?= base_url()?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Tenaga Kerja <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h1 class="mb-5"><span class="number"><?php echo $this->db->count_all('tenaga_kerja');?></span></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="<?= base_url()?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Keuntungan <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <?php
                      foreach ($gaji as $g)
                        {?>
                          <h1 class="mb-5"><span class="number"><?= $g?></span></h1>
                        <?php }
                      ?>
                    <h6 class="card-text"></h6>
                  </div>
                </div>
              </div>
            </div>


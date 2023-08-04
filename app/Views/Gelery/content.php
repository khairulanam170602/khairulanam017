<?php

use PhpParser\Node\Stmt\Foreach_;

echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="card-body">
                <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="/assets/dist/img/1.jpg" alt="Photo 1" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                          PMS
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="/assets/dist/img/2.jpg" alt="Photo 2" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          TKJ
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative" style="min-height: 180px;">
                      <img src="/assets/dist/img/14.png" alt="Photo 3" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-xl">
                          Farmasi
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="/assets/dist/img/15.jpg" alt="Photo 1" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-success text-lg">
                          Akuntansi
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative">
                      <img src="/assets/dist/img/16.jpg" alt="Photo 2" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-warning text-lg">
                          TRRH
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="position-relative" style="min-height: 180px;">
                      <img src="/assets/dist/img/17.jpg" alt="Photo 3" class="img-fluid">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger text-xl">
                          perikanan
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
<?php
echo $this->endSection();
<?php 
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="	fas fa-chalkboard-teacher"></i>
              </div>
              <a href="" class="small-box-footer">Siswa <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>89<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="	fas fa-user-tie"></i>
              </div>
              <a href="http://localhost:8080//mahasiswa" class="small-box-footer">Guru <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="http://localhost:8080//semister" class="small-box-footer"> kelas dan jurusans <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="	fas fa-images"></i>
              </div>
              <a href="http://localhost:8080//gelery" class="small-box-footer">gelery<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="full-width text-center caption mt-50">
<h3>selamat datang di aplikasi kami!</h3>
<h1 class="cd-headline push">
<span class="blc"></span>
<span class="cd-words-wrapper" style="width: 344.566px;">
<!-- ====== Header Text====== -->
<b class="is-hidden">SMK Ibrahimy 1 Sukorejo</b>
<b class="is-visible"></b>
<b class="is-hidden"></b>
</span>
</h1>
<a class="butn butn-bord mt-30" href="#blog" data-scroll-nav="3">
<span></span>
</a>
<a class="butn butn-light mt-30" href="#contact" data-scroll-nav="4">
<span></span>
</a>
<a class="butn butn-light mt-30" href="https://www.youtube.com/@S3TVSukorejo">
<span></span>
<td>
<button type="button" class="btn btn-block btn-primary">YOUTUBE</button>
</td>
</a>
<a class="butn butn-light mt-30" href="https://smki1sukorejo.sch.id/">
<span></span>
<td>
<button type="button" class="btn btn-block btn-success">WEBSITE</button>
</td>
</a>
</div>
<?php
echo $this->endSection();
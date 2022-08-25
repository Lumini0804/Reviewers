<div class="az-dashboard-nav"> 
            

            <nav class="nav">
              <a class="nav-link" href="#"><i class="far fa-save"></i> Save Reviews</a>
              <a class="nav-link" href="#"><i class="fas fa-ellipsis-h"></i></a>
            </nav>
          </div>

          <div class="row row-sm mg-b-20">
            <div class="col-lg-8 ht-lg-100p">
              <div class="card card-dashboard-one">
                <div class="card-header">
                  
                <p style="text-align:center">Positive and Negative Variation of reviews in the last year</p>
                </div><!-- card-header -->
                <div class="card-body">



                  <div class="card-body-top">
                    
                  </div>
                  <div class="flot-chart-wrapper">
                    <div id="flotChart" class="flot-chart"></div>
                  </div>
                 <br><br><br><br><br><br>
                  
                

                  <div class="table-responsive">
                    <table class="table table-striped mg-b-0">

                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Review</th>
                          <th>Ratings</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($reviews as $review){
                            ?>
                        <tr>
                          <th scope="row">2022/07/11</th>
                          <td><?php echo $review['author_name'];?></td>
                          <td><?php echo $review['review_text'];?></td>
                          <td><?php echo $review['review_rating'];?></td>
                          <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Reply</button></td>
                        </tr>
                        <?php } ?>
                       
                      </tbody>
                    </table>
                  </div><!-- bd -->


                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
            
            <div class="col-lg-4 mg-t-20 mg-lg-t-0">
              <div class="row row-sm">
                <div class="col-sm-6">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6>33.50% <i class="icon ion-md-trending-up tx-success"></i> <small>18.02%</small></h6>
                      <p>Positive Reviews</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart1" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->
                <div class="col-sm-6 mg-t-20 mg-sm-t-0">
                  <div class="card card-dashboard-two">
                    <div class="card-header">
                      <h6>86k <i class="icon ion-md-trending-down tx-danger"></i> <small>0.86%</small></h6>
                      <p>Total Reviews</p>
                    </div><!-- card-header -->
                    <div class="card-body">
                      <div class="chart-wrapper">
                        <div id="flotChart2" class="flot-chart"></div>
                      </div><!-- chart-wrapper -->
                    </div><!-- card-body -->
                  </div><!-- card -->
                </div><!-- col -->

                <div class="col-sm-12 mg-t-20">
                  <div class="card">
                    <div class="card-header">
                      <p>Reviews By Page</p>
                    </div><!-- card-header -->
                    <div class="card-body row">
                  
                  <div class="col-md-6 col-lg-12">
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Google</span>
                        <span>1,320 <span>(25%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-purple wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>
                    <div class="az-traffic-detail-item">
                      <div>
                        <span>Facebook</span>
                        <span>987 <span>(20%)</span></span>
                      </div>
                      <div class="progress">
                        <div class="progress-bar bg-primary wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><!-- progress -->
                    </div>

                    

                    
                    
                    
                  </div><!-- col -->
                  
                </div>
                <div class="col-sm-12 mg-t-20">
                <div class="card card-dashboard-five">
                    <div class="card-header">
                      <h6 class="card-title">Acquisition</h6>
                      <span class="card-text">Tells you where your visitors originated from, such as search engines, social networks or website referrals.</span>
                    </div><!-- card-header -->
                    <div class="card-body row row-sm">
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="card-chart bg-primary">
                          <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 20, "height": 20 }'>6,4,7,5,7</span>
                        </div>
                        <div>
                          <label>Bounce Rate</label>
                          <h4>33.50%</h4>
                        </div>
                      </div><!-- col -->
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="card-chart bg-purple">
                          <span class="peity-bar" data-peity='{"fill": ["#fff"], "width": 21, "height": 20 }'>7,4,5,7,2</span>
                        </div>
                        <div>
                          <label>Sessions</label>
                          <h4>9,065</h4>
                        </div>
                      </div><!-- col -->
                    </div><!-- card-body -->
                  </div>
                        </div>

                  </div>
                </div>
              </div><!-- row -->
            </div><!--col -->
          </div><!-- row -->

          <div class="row row-sm mg-b-20">
            <div class="col-lg-4">
<!-- card -->

            </div><!-- col -->


          </div><!-- row -->

          <div class="row row-sm mg-b-20 mg-lg-b-0">
            <div class="col-lg-5 col-xl-4">
              <div class="row row-sm">
                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
<!-- card-dashboard-five -->
                </div><!-- col -->
                <div class="col-md-6 col-lg-12">
                  <div class="card card-dashboard-five">
                    <div class="card-header">
                      <h6 class="card-title">Sessions</h6>
                      <span class="card-text"> A session is the period time a user is actively engaged with your website, app, etc.</span>
                    </div><!-- card-header -->
                    <div class="card-body row row-sm">
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                          <span class="peity-donut" data-peity='{ "fill": ["#007bff", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>4/7</span>
                        </div>
                        <div>
                          <label>% New Sessions</label>
                          <h4>26.80%</h4>
                        </div>
                      </div><!-- col -->
                      <div class="col-6 d-sm-flex align-items-center">
                        <div class="mg-b-10 mg-sm-b-0 mg-sm-r-10">
                          <span class="peity-donut" data-peity='{ "fill": ["#00cccc", "#cad0e8"],  "innerRadius": 14, "radius": 20 }'>2/7</span>
                        </div>
                        <div>
                          <label>Pages/Session</label>
                          <h4>1,005</h4>
                        </div>
                      </div><!-- col -->
                    </div><!-- card-body -->
                  </div><!-- card-dashboard-five -->
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col-lg-3 -->
            <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">

            </div><!-- col-lg -->

          </div><!-- row -->

          <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply to review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <textarea rows="3" class="form-control mg-t-20" placeholder="Textarea (invalid state)" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send reply</button>
      </div>
    </div>
  </div>
</div>

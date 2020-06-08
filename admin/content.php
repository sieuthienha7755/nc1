 <!-- Content -->
 
 <div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                       <?php
                                            $con=mysqli_connect("localhost","root","","sql");
                                            $sql="SELECT COUNT(tid) FROM teacherinfo";
                                            if ($result=mysqli_query($con,$sql))
                                            {
                                                $rowcount=mysqli_num_rows($result);
                                                echo $rowcount;
                                                mysqli_free_result($result);
                                            }
                                    ?>

                                  </div>
                                  <div class="stat-heading">Giảng Viên</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="pe-7s-cart"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">11</span></div>
                                <div class="stat-heading">Lớp</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-3">
                            <i class="pe-7s-browser"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">12</span></div>
                                <div class="stat-heading">Môn Học</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-4">
                            <i class="pe-7s-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">20</span></div>
                                <div class="stat-heading">Sinh Viên</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /Widgets -->
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Danh sách giảng viên </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                 <thead>
                                    <tr>
                                        <th >ID</th>
                                        <th >Avatar</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Subject</th>

                                    </tr>
                                </thead>
                                <?php
                                $query = $conn->prepare("SELECT * FROM `teacherinfo` LIMIT 11");
                                $query->execute();
                                $r = $query->get_result();
                                while ($assoc =$r->fetch_assoc()){
                                    echo "<tr>";

                                    echo "<td>".$assoc['tid']."</td>";
                                    echo "<td><img style='width:40px;height:40px;border-radius:50%' src='../images/".$assoc['img']."'></td>";
                                    echo "<td>".$assoc['name']."</td>";
                                    echo "<td>".$assoc['username']."</td>";

                                    echo "<td>".$assoc['sub1']."</td>";



                                }

                                ?>


                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-8 -->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body border-bottom">
                        <!-- <h4 class="box-title">Chandler</h4> -->
                        <div class="calender-cont widget-calender">
                            <div id="calendar"></div>
                        </div>
                    </div>
                    <!-- s -->

                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-bell" style="font-size:22px"> Thông Báo Nhanh</i>

                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove" style="margin-bottom:10px">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="noti_title" placeholder="Tiêu Đề*" required="">
                                    </div>
                                    <div class="form-group">
                                        <span>Biểu ngữ thông báo: :</span>
                                        <input type="file" class="form-control" name="noti_image" placeholder="Attachment Image">
                                    </div>
                                    <div>
                                        <textarea class="textarea" name="noti_description" placeholder="Nội dung*" required="" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>

                                </div>
                                <div class="box-footer clearfix">
                                    <button type="submit" class="pull-right btn btn-default" id="sendEmail">
                                        Gửi
                                        <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- /.card-body -->
                </div><!-- /.card -->




                <!-- s -->

            </div><!-- /.card -->
        </div>
    </div>
</div>
<!-- /.orders -->
<!-- To Do and Live Chat -->

<!-- /To Do and Live Chat -->
<!-- Calender Chart Weather  -->
<!-- Modal - Calendar - Add New Event -->
<div class="modal fade none-border" id="event-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Add New Event</strong></h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
<!-- /#event-modal -->
<!-- Modal - Calendar - Add Category -->
<div class="modal fade none-border" id="add-category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Add a category </strong></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Choose Category Color</label>
                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="pink">Pink</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- /#add-category -->
</div>
<!-- .animated -->
</div>
<!-- /.content -->
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

<div class="provided-detial">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="detail-main">
                    <div class="detail-main-top">
                        <div class="detail-main-top-head">
                            <h2><?= $this->provider['name' . $lang]; ?></h2>
                        </div>
                        <div class="detailer-pro col-sm-4 col-sm-offset-4">
                            <img src="<?php echo main_url; ?>/<?= $this->provider['logo'] ?>" alt="<?= $this->provider['name' . $lang]; ?>" />
                        </div>
                        <div class="social-detl">
                            <ul>
                                <li><a href="<?= $this->provider['facebook'] ?>" target="_blank"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                                <li><a href="<?= $this->provider['twitter'] ?>"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                                <li><a href="<?= $this->provider['instagram'] ?>" target="_blank"><span class="fa fa-instagram" aria-hidden="true"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (@$this->provider_gallery)
            {
            ?>
            <div class="row">
                <div class="details">
                    <div class="col-sm-12 detail-txt">
                        <p><?= $this->provider['description' . $lang]; ?></p>
                    </div>
                    <div class="col-sm-12 series-slider">
                        <div id="demo">
                            <div class="span12">
                                <div id="owl-demo1" class="owl-carousel">
                                    <?php
                                    foreach ($this->provider_gallery as $k => $v)
                                        {
                                        ?>   <div class="item">
                                            <div class="border-shadow">
                                                <div class="feature-item"> 
                                                    <?php
                                                    if (@$v['image'])
                                                        {
                                                        $url = $v['image'];
                                                        }
                                                    else
                                                        {
                                                        $url = "uploads/no_image.jpg";
                                                        }
                                                    ?><img src="<?php echo main_url; ?>/libs/timthumb/timthumb.php?h=260&src=<?php echo main_url . "/" . $url; ?>" class="da-thumbs thumbnail" style="width:100%;height:260px;">


                                                </div><!--feature-item-->
                                            </div><!--border-->
                                        </div>
    <?php } ?>

                                </div>
                                <div class="customNavigation"> <a class="btn prev"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-left.png" alt="" /></a> <a class="btn next"><img src="<?php echo main_url; ?>/themes/site/default/images/arrow-right.png" alt="" /></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php }
        ?>
        <div class="row">
            <div class="col-sm-12 contact-detail">
                <div class="cntct-txt add">
                    <h3><?= Contact_Details . " " ?>:</h3>
                </div>
                <div class="cntct-ad add">
                    <div class="ad-icon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
                    <div class="ad-txt">
                        <h4><?= Address ?></h4><p> <?php echo $this->provider['adderss']; ?></p>
                    </div>
                </div>
                <div class="cntct-work add">
                    <div class="ad-icon"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                    <div class="ad-txt">
                        <h4><?= Working_Hours ?></h4><p> <?php echo $this->provider['working_hours']; ?></p>
                    </div>
                </div>
                <div class="cntct-ph add">
                    <div class="ad-icon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>
                    <div class="ad-txt">
                        <h4><?= Phone_Number ?></h4><p><?php echo $this->provider['phone']; ?></p>
                    </div>
                </div>
                <div class="company-profile add">
                    <div class="ad-icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                    <div class="ad-txt">
                        <h4><?= Company_Profile ?></h4><p>
                            <?php
                            if ($this->provider['profile_pdf'] != '')
                                {
                                ?>
                                <a href="http://alwakalat.com/pdf/<?php echo $this->provider['profile_pdf']; ?>"target="_blank"><?= Click_for_pdf ?> </a>

<?php } ?>
                        </p>
                    </div>
                </div><!--company-profile-->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="lociatin-pro">
                    <div class="loc-pro">
                        <div class="location-form-main">
                            <div class="location-map">
<?php echo $this->provider['map']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="service-table">
                    <h2><?= Services ?></h2>
                    <table class="services-table-inner">

                        <?php
                        if (@$this->provider_service)
                            {
                            ?>
                            <tr>
                                <th><?= Services_Name ?></th>
                                <th><?= Price ?></th>
                            </tr>
                            <?php
                            foreach ($this->provider_service as $key => $val)
                                {
                                ?><tr>

                                    <td><?= $val['service_name'] ?></td>
                                    <td><?= $val['price'] . " " ?> QR </td> 
                                </tr><?php
                                }
                            }
                        else
                            {
                            ?>   <div role="alert" class="alert alert-danger">
                                <strong><?= No_Data_Available ?>. </strong>
                            </div>
<?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>









<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>


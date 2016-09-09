<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

      

<div class="row">
  <div class="col-md-9">
        
<?php foreach($this->blog_all_info as $blogs_info){ 
    
     $blog_category_info = blog_category($this->database,$blogs_info['blog_category_id']);
    
    ?>

        
      <div class="row mr-top30">
 

 <div class="topblog_wrp">
 <div class="col-md-9">
<h4 class="color-orange"><a href="<?php echo main_url;?>/blog_info/<?php echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>" ><strong class="title_head"><?php echo $blogs_info['blog_title'];?></strong></a></h4>

<div class="text_size12 mr-top10"> <span class="color_text_in"> <i class="fa fa-tag color-grey" style="font-size:14px;"></i> in <b class="color_grap"><a href="<?php echo main_url;?>/blog_category/<?php echo $blog_category_info['blog_category_id']."/".$blog_category_info['categpry_slug'];?> "><?php echo ucwords($blog_category_info['category_name']);?></a></b> </span>
 <span class="padd_left"><i class="fa fa-user color-grey" style="font-size:14px;"></i> by <b class="color_grap"><a href="#">Spark Team</a></b></span> </div>
 
</div>

<div class="col-md-3">
<div class="date_1 pull-right">
 <div class="date_up2">
 <p class="center2 feb2"><?php echo date("m",strtotime($blogs_info['created']));?>  </p></div>
 <div class="date_down2">
  <p class="text_word"><?php echo date("F",strtotime($blog_info['created']));?></p></div>
 </div>
</div>


</div>
<div class="clearfix"></div>
<!--<hr class="mr-bottom">-->



<div class="col-md-3">
<a href="<?php echo main_url;?>/blog_info/<?php echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>" class="thumbnail">
<img src="<?php echo main_url.$blogs_info['blog_thumb_image'];?>" alt="">
</a>


</div>             

<div class="col-md-9" style="margin-left:-12px">
<p class="text-justify"><?php echo text_limit(strip_tags($blogs_info['blog_content']),260);?>  </p>


  <a href="<?php echo main_url;?>/blog_info/<?php echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>"><button type="button" class="btn btn-danger btn-cons pull-right">Read More</button></a>

</div>

</div>
 <hr> 
      
      
      
      
<!--<div class="row">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-12"><a href="<?php //echo main_url;?>/blog_info/<?php //echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>" ><strong class="title_head"><?php //echo $blogs_info['blog_title'];?></strong></a></div>
        
    </div>
    <div class="row">
<div class="col-md-3">
   
<a href="<?php //echo main_url;?>/blog_info/<?php //echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>" class="thumbnail">
<img src="<?php //echo main_url.$blogs_info['blog_thumb_image'];?>" alt="">
</a>


</div>

<div class="col-md-9" style="margin-left:-12px">
 
    <p class="text-justify"><?php //echo text_limit(strip_tags($blogs_info['blog_content']),200);?>  </p>


  <a href="<?php //echo main_url;?>/blog_info/<?php //echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>"><button type="button" class="btn btn-danger btn-cons pull-left">Read More</button></a>

</div>
    </div>
       
</div>

</div>-->
        <?php }?>


    </div>


<!--<div class="col-md-9">
<h4 class="color-orange">What does Twitter mean to Developers?</h4>

<div class="text_size12 mr-top10"> <span class="color_text_in"> <i class="fa fa-tag color-grey" style="font-size:14px;"></i> in <b class="color_grap"><a href="#">Developers</a></b> </span>
 <span class="padd_left"><i class="fa fa-user color-grey" style="font-size:14px;"></i> by <b class="color_grap"><a href="#">Spark Team</a></b></span> </div>

</div>

<div class="col-md-3">
<div class="date_1 pull-right">
 <div class="date_up2">
 <p class="center2 feb2">Jun  </p></div>
 <div class="date_down2">
  <p class="text_word">05 </p></div>
 </div>
</div>
-->








    
    <div class="col-md-3">
        
        <div class="mr-top10">
        <h3>Categories</h3>
        <hr>
       </div> 
        <div class="navtab_wrapper">
<ul>
    
    <?php foreach($this->blog_categories as $blog_categories){?>
<li><i class=" fa fa-circle font-8 color-grey"></i><a href="//<?php echo main_url;?>/blog_category/<?php echo $blog_categories['blog_category_id'];?>/<?php echo $blog_categories['category_slug'];?>"><?php echo $blog_categories['category_name'];?></a></li>
  


 <?php }?>



</ul>


</div>
        
        
        
        
        
    </div>
     <div class="row">
          <div class="col-md-4">
        
            </div>
            <div class="col-md-4">
         <div id="pagination_bottom"></div>
            </div>
          <div class="col-md-4">
        
            </div>
        </div>
    
</div>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>



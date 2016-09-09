<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

      

<div class="row">
    <div class="col-md-9">
        <?php if($this->blog_all_info){?>
<?php foreach($this->blog_all_info as $blogs_info){?>

<div class="row">
    <div class="col-md-12">
    <div class="row">
        <div class="col-md-12"><a href="<?php echo main_url;?>/blog_info/<?php echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>" ><strong class="title_head"><?php echo $blogs_info['blog_title'];?></strong></a></div>
        
    </div>
    <div class="row">
<div class="col-md-3">
   
<a href="<?php echo main_url;?>/blog_info/<?php echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>" class="thumbnail">
<img src="<?php echo main_url.$blogs_info['blog_thumb_image'];?>" alt="">
</a>


</div>

<div class="col-md-9" style="margin-left:-12px;">
 
    <p class="text-justify"><?php echo text_limit(strip_tags($blogs_info['blog_content']),200);?>  </p>


  <a href="<?php echo main_url;?>/blog_info/<?php echo $blogs_info['blog_id']."/".$blogs_info['blog_slug'];?>"><button type="button" class="btn btn-danger btn-cons pull-left">Read More</button></a>

</div>
    </div>

</div>

</div>

        <?php } } else {?>
        <div class="alert alert-danger mr-top30">There are no blogs for this category..</div>
        <?php } ?>
    </div>
    <div class="col-md-3">
        
        <div class="mr-top10">
        <h3>Categories</h3>
        <hr>
       </div> 
        <div class="navtab_wrapper">
<ul>
    
    <?php foreach($this->blog_categories as $blog_categories){?>
<li><i class=" fa fa-circle font-8 color-grey"></i><a href="<?php echo main_url;?>/blog_category/<?php echo $blog_categories['blog_category_id'];?>/<?php echo $blog_categories['category_slug'];?>"><?php echo $blog_categories['category_name'];?></a></li>
  
 <?php }?>


</ul>


</div>
        
        
        
        
        
    </div>
</div>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>



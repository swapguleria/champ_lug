<script type="text/javascript" src="<?php echo main_url;?>/themes/site/default/js/jquery.min.js"></script>
   
    <script>
        
    $(function(){
   $("#submitComment").on("click",function(){
      var name = $("#name").val();
      var comment = $("#comment").val();
     
    var comment_html = '<div id="comment_'+comment_count+'" class="comment" style="background:#ffffff; float:left; border: 1px solid #cccccc;padding:5px; padding-left: 20px;width:96%; margin-bottom:10px;"><button class="delete" comment_id="comment_'+comment_count+'" style="float:right;">X Delete</button><h4>'+name+'</h4><p>'+comment+'</p></div>'; 
        }
          $("#commentsList").prepend(comment_html);
      });
   </script>
   
      
        <div style="width:640px; padding:10px; float:left; background:#f5f5f5">
     <h3>Total Comments: <span id="totalcomments">0</span></h3>
            <hr>
            
            <div id="commentsList">
                
            
            
            </div>
            
            
        </div>   
        
        <div style="width:300px; padding: 10px; float:right; background:#cccccc">
            <h3>Submit a Comment</h3>
            <hr>
            
            <label>
                Name: <input type="text" id="name" placeholder="Enter your Name" />
            </label>
            
            <label>
                Comment:
                <br>
                <textarea id="comment"></textarea>


            </label>
            
            <hr>
            <button id="submitComment" class="btn">Submit Comment</button>
            
        </div>   
        
        
        
        
        
 
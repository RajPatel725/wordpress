<?php

/*

Template Name: Partners

*/

get_header();

?>

        <?php $_term=(isset($_GET['term']) && trim($_GET['term']) != "" ? trim($_GET['term']) : '');
        $terms = get_terms( array(
            'taxonomy' => 'vendor_category',
            'hide_empty' => true,
            'orderby' => 'term_order',
            'order' => 'ASC'
        ) );
        ?>

<div class="filters">

  <div class="ui-group" > 
    <div class="button-group js-radio-button-group" data-filter-group="line-office" id="line-office-btn">
      <button class="button is-checked" data-filter="">All</button>
      <button class="button" data-filter=".sds">Team 1</button>
      <button class="button" data-filter=".sro">Team 2</button>
      <button class="button" data-filter=".gso">Team 3</button>
    </div>
  </div>
	
    <br/>
</div>

<div class="grid">
	<div class="office-year-function sds 2015 label1">
  			<div class="content cell-child">
            	<img src="../img1.png" alt="">
             </div>
        	<div class="img-hover cell-child" >
        <br/>
        		<h3 class="post-name">Lorem ipsum dolor </h3>
     			<h3 class="job-post">coo</h3>
              <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here 5265
                           </div>
                     </div>  
                  </div>  
               
               </div>
        	</div>
    </div>
    
  	<div class="office-year-function sro 2015 label1">
   		<div class="content cell-child">
        	<img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        		<h3 class="post-name">Lorem ipsum dolor </h3>
     			<h3 class="job-post">coo</h3>
        		<div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here 1
                           </div>
                     </div>  
                  </div>  
               
               </div>
   			</div>
   </div>

   <div class="office-year-function gso 2015 label1">
   	<div class="content cell-child">
   		<img src="../img1.png" alt="">
        </div>
           <div class="img-hover cell-child" >
        <br/>
            <h3 class="post-name">Lorem ipsum dolor </h3>
            <h3 class="job-post">coo</h3>
            <div class="Click-here">Click Here 2</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here 2
                           </div>
                     </div>  
                  </div>  
               
               </div>
   			</div>
   </div>  	
   
   <div class="office-year-function sro 2016 label2">
   	<div class="content cell-child">
         <img src="../img2.png" alt="">
        
        </div>
           <div class="img-hover cell-child" >
        <br/>
            <h3 class="post-name">Lorem ipsum dolor </h3>
            <h3 class="job-post">coo</h3>
            <div class="Click-here">Click Here</div>        
            <div class="custom-model-main">
               <div class="custom-model-inner">        
               <div class="close-btn">×</div>
                  <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                           Content Here
                        </div>
                  </div>  
               </div>  
            
            </div>
        
   			</div>
   </div>  
   
  <div class="office-year-function sds 2016 label1">
  	<div class="content cell-child">
      <img src="../img1.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo</h3>
        <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here
                           </div>
                     </div>  
                  </div>  
               
               </div>
        
   			</div>
  </div>

  <div class="office-year-function gso 2015 label1">
  	<div class="content cell-child">
        	<img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo1   </h3>
        <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here
                           </div>
                     </div>  
                  </div>  
               
               </div>
        
   			</div>
   </div>

  <div class="office-year-function gso 2015 label1">
  <div class="content cell-child">
   <img src="../img1.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo</h3>
        <div class="Click-here">Click Here</div>        
        <div class="custom-model-main">
           <div class="custom-model-inner">        
           <div class="close-btn">×</div>
              <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">
                       Content Here
                    </div>
              </div>  
           </div>  
        
        </div>
        
   			</div>
     </div>

  <div class="office-year-function gso 2016 label1">
  <div class="content cell-child">
   <img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo</h3>
        <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here
                           </div>
                     </div>  
                  </div>  
               
               </div>
        
   			</div>
      </div>

  <div class="office-year-function gso 2015 label2">
  <div class="content cell-child">
   <img src="../img1.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo</h3>
        <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here
                           </div>
                     </div>  
                  </div>  
               
               </div>
        
   			</div>
      </div>

  <div class="office-year-function sro 2015 label2">
  <div class="content cell-child">
   <img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo</h3>
        <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here
                           </div>
                     </div>  
                  </div>  
               
               </div>
        
   			</div>
       </div>

  <div class="office-year-function sro 2016 label2">
  <div class="content cell-child">
   <img src="../img1.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        <h3 class="post-name">Lorem ipsum dolor </h3>
        <h3 class="job-post">coo</h3>
        <div class="Click-here">Click Here</div>        
               <div class="custom-model-main">
                  <div class="custom-model-inner">        
                  <div class="close-btn">×</div>
                     <div class="custom-model-wrap">
                           <div class="pop-up-content-wrap">
                              Content Here
                           </div>
                     </div>  
                  </div>  
               
               </div>
        
   			</div>
     </div>    
     
  <div class="office-year-function sro 2015 label2">
  <div class="content cell-child">
   <img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        		<h3> Student Orientation</h3>
     			<h3>2016</h3>
        		<div class="Click-here">Click Here</div>        
              <div class="custom-model-main">
                 <div class="custom-model-inner">        
                 <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                          <div class="pop-up-content-wrap">
                             Content Here
                          </div>
                    </div>  
                 </div>  
              
              </div>
        
   			</div>
     </div>
     
       <div class="office-year-function sro 2015 label2">
  <div class="content cell-child">
   <img src="../img1.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        		<h3> Student Orientation</h3>
     			<h3>2016</h3>
        		<div class="Click-here">Click Here</div>        
              <div class="custom-model-main">
                 <div class="custom-model-inner">        
                 <div class="close-btn">×</div>
                    <div class="custom-model-wrap">
                          <div class="pop-up-content-wrap">
                             Content Here
                          </div>
                    </div>  
                 </div>  
              
              </div>
        
   			</div>
     </div>
     
       <div class="office-year-function sro 2016 label2">
  <div class="content cell-child">
   <img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        		<h3> Student Orientation</h3>
     			<h3>2016</h3>
            <div class="Click-here">Click Here</div>        
            <div class="custom-model-main">
               <div class="custom-model-inner">        
               <div class="close-btn">×</div>
                  <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                           Content Here
                        </div>
                  </div>  
               </div>  
            
            </div>
        
   			</div>
     </div>

       <div class="office-year-function sro 2016 label2">
  <div class="content cell-child">
   <img src="../img1.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        		<h3> Student Orientation</h3>
     			<h3>2016</h3>
            <div class="Click-here">Click Here</div>        
            <div class="custom-model-main">
               <div class="custom-model-inner">        
               <div class="close-btn">×</div>
                  <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                           Content Here
                        </div>
                  </div>  
               </div>  
            
            </div>
        
   			</div>
     </div>
     
      <div class="office-year-function sro 2016 label1">
  <div class="content cell-child">
   <img src="../img2.png" alt="">
           </div>
           <div class="img-hover cell-child" >
        <br/>
        		<h3> Student Orientation</h3>
     			<h3>2016</h3>
            <div class="Click-here">Click Here</div>        
            <div class="custom-model-main">
               <div class="custom-model-inner">        
               <div class="close-btn">×</div>
                  <div class="custom-model-wrap">
                        <div class="pop-up-content-wrap">
                           Content Here  56165ffhytj
                        </div>
                  </div>  
               </div>  
            
            </div>
        
   			</div>
     </div>
  
  
  
</div>

<?php
get_footer();
?>
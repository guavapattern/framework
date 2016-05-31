<?php
		gp_custom_scripts('addons/gp-reviews');
		
		$reviews = gp_taxonomy_items('reviews');
		
		pre($reviews);
		
		$reviews_nav = array();
?>		

<div class="sr-boxes-wrap">
        
        	<div class="container">
            
                <div class="sr-loop">
                	
                    <?php if(!empty($reviews)): ?>
                    <?php $r = 0; $c = 1; foreach($reviews as $review): 
					
							if(count($reviews)>2){ 
								if($r%1==0){
									$c++;
									$reviews_nav[] = '<a class="'.($c==2?'active':'').'" data-rw="'.$c.'"></a>';
								}
							}
							$r++;
					?>
                    
                    <div class="sr-box-single rw_<?php echo $c; ?> <?php echo ($c>2?'hide':''); ?>">
                        <?php if(isset($review->image) && $review->image!=''): ?>
                        <div class="srb-img">
                            <img src="<?php echo $review->image; ?>" alt="<?php echo $review->post_title; ?>" />
                        </div>
                        <?php endif; ?>
                        
                        <div class="srb-desc">
                            <p><?php echo $review->post_content; ?></p>
                            <?php if($review->post_title!=''): ?>
                            <b>— <?php echo $review->post_title; ?></b>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    
                    <?php endforeach; ?>
                    <?php endif; ?>
                    
                    
                
                </div>
                
                <div class="srl-controls"><?php echo implode(' ', $reviews_nav); ?></div>
            
            </div>
        
        </div>
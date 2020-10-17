<?php
                
                $color="#".$_GET['color'];
                
                $sql45="SELECT * from colors";
                                    $result45=$conn->query($sql45);
                                    if($result45->num_rows>0) {
                                        while($row45=$result->fetch_assoc()) {
                                            if($row45['color']==$color) {
                                                $sql46="SELECT * from products";
                                                $result46=$conn->query($sql46);
                                                if($result46->num_rows>0) {
                                                    while($row46=$result46->fetch_assoc()) {
                                                        if($row46['product_id']==$row45['product_id']) {
                                                            
                                                            echo '<li>
                    <figure>
                      <a class="aa-product-img" href="#"><img src="img/women/'.$row1['image'].'" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#">'.$row1['name'].'</a></h4>Price:
                        <span class="aa-product-price">'.$row1['price'].' /-</span>
                        <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                       
                        <div class="aa-product-hvr-content">
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                        </div>
                        </figcaption>
                    </figure>                         
                    
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                  ';
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                    
                
                
                ?>
              
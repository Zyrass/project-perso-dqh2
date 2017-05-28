<legend class="text-center wow tada">Ressources</legend>
                            <div class="col-xs-6">
                                <?php 
                                    if (!empty($value['ingredient_id_one'])) 
                                    {
                                        echo '
                                                <figure class="text-center">
                                                    <figcaption><small>'. $value['ingredients_name'] . '</small></figcaption>
                                                    <img src="../../../Public/www/Views/assets/img/ingredients/' . $value['ingredients_image'] . '" alt="image wanted" style="width:70px; height:70px" class="wow rotateIn img-thumbnail">
                                                </figure>                                             
                                        ';
                                    }
                                    else
                                    {
                                        echo '
                                            <tr><th></th></tr>
                                            <tr><td></td></tr>';
                                    }
                                ?> 
                            </div> <!-- /col-xs-6 -->
                            <div class="col-xs-6">
                                <?php 
                                    if (empty($value['ingredient_id_two'])) 
                                    {
                                        echo '
                                                <figure class="text-center">
                                                    <figcaption><small>'. $value['accessories_name'] . '</small></figcaption>
                                                    <img src="../../../Public/www/Views/assets/img/accessories/' . $value['accessories_image'] . '" alt="image wanted" style="width:70px; height:70px" class="wow rotateIn img-thumbnail">
                                                </figure>                                              
                                        ';
                                    } 
                                    elseif (!empty($value['ingredient_id_two'])) 
                                    {
                                        echo '
                                            <tr>
                                                <th width="50%">' . $value['ingredients_name'] . '</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <figure class="text-center">
                                                        <img src="../../../Public/www/Views/assets/img/ingredients/' . $value['ingredients_image'] . '" alt="image wanted" style="width:70px; height:70px" class="wow rotateIn img-circle img-thumbnail"> 
                                                    </figure>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                    else
                                    {
                                        echo '
                                            <tr><th></th></tr>
                                            <tr><td></td></tr>';
                                    }
                                ?>
                            </div> <!-- /col-xs-6 -->
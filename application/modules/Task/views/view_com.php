<table class="table table-responsive table-dark mb-0" id="tab" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="false" data-show-toggle="false" data-resizable="false" data-cookie="true"
																	data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="false" data-toolbar="#toolbar">
                                    <thead>
                                        <tr class="text-center">
											
                                           <th scope="col" data-field="photo">#</th>
                                            <th scope="col" data-field="titre">Nom</th>
											<th scope="col" data-field="titre">Adresse email</th>
											<th scope="col" data-field="titre">Blog</th>
											
											<th scope="col" data-field="titre">Action</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($commentaire as $k=>$v):?>
									  
                                        <tr class="text-center
										<?php if($v->vu_comment==0):?>
										bg-teal" 
										<?php endif;?>
										onmouseover="this.style.backgroundColor='rgb(0, 0, 0)';this.style.cursor='pointer';"  onmouseout="this.style.backgroundColor='transparent';"  >
                                            
                                        <td><?php echo $v->id_commentaire;?></td>
                                            <td ><?php echo $v->nom_visiteur;?></td>
                                            <td ><?php echo $v->email_visiteur;?></td>
											<td ><?php echo $v->titre;?></td>
											<td>
												<button id="btnAction" title="voir le message" onclick="info_com('<?php echo $v->id_commentaire;?>','<?php echo site_url('contact/commentaire_info')?>')"  class="btn btn-outline-light">
												<?php if($v->vu_comment==0):?>
												<i class="fa fa-comment"></i> non lu
												<?php else:?>
												<i class="fa fa-comments"></i> lu
												<?php endif;?>
												</button>
											</td>
                                        </tr>
									   <?php endforeach;?>
                                        
                                    </tbody>
                                </table>
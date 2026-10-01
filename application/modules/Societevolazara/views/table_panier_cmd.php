<div class="table-responsive">
<table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Disponible</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $t=0;
                        ?>
                        <?php foreach($pr as $k=>$v):?>

                                <?php 
                                $t+=$v->prix_unitaire_en_ligne*$v->qte;
                                    $this->load->view('panier_list',array('v'=>$v));?>
                            <?php endforeach;?>
                     
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong id="total-sess"> <?=$this->autoformat->chiffre($t,0)?> MGA</strong></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
                </div>
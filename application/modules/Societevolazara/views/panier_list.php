<?php 
$this->media->base_url_file=EVIDY_URL;
?>
<tr>
                            <td><img src="<?=$this->media->get_url_file($v->id_produits,$v->img_produit,'photo','produit',false)?>" width="100px"/> </td>
                            <td><?=$v->designation_produits?></td>
                            <td><?=$v->iswith_appro==0?'illimité':$v->qte_produits?></td>
                            <td width="100px"><input class="form-control" min="1" onchange="updatesess('<?=$v->id_produits?>','qte_panier<?=$v->id_produits?>')" onkeyup="updatesess('<?=$v->id_produits?>','qte_panier<?=$v->id_produits?>')" id="qte_panier<?=$v->id_produits?>" type="number" value="<?=$v->qte?>" /></td>
                            <td class="text-right"><?=$this->autoformat->chiffre($v->prix_unitaire,0)?> MGA</td>
                            <td width="200px" class="text-right"><button type="button" class="btn btn-sm btn-danger" onclick="deletesess('<?=$v->id_produits?>')">X </button> </td>
                        </tr>
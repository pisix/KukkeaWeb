<!--<div class="span44" style="text-align:center;width: 180px;">
    <span class="label-important label"><h4>VOYAGES A LA UNE</h4></span>
    <table align="center">
        <?php if ($all_annonce_premium !=null):?>
            <?php foreach($all_annonce_premium as $r): ?>
                <tr>
                    <td style="text-align: center">
                        <a style="text-decoration: none;" href="<?php echo site_url('annonce/showannonce/'.$r->NUMANNONCE);?>">
                            <img  width="100" height="100" class="img-rounded" src="<?php echo base_url();?>images/thumbs/<?php echo $r->CHEMINPHOTO;?>"/><br/><br/>
                            <span style="color: dodgerblue"><?php echo $r->TITREANNONCE;?><br/><br/></span>
                            <?php if ($r->PRIX!=null):?>
                                <b><?php echo $r->PRIX;?> Euros</b>
                            <?php endif; ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
    </table>
    <span class="label-warning label"><h5><a href="#" target="_blank" style="text-decoration: none;color: white;">EN SAVOIR PLUS</a></h5></span>
</div>-->
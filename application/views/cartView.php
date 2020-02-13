<!DOCTYPE html>
    <?php echo $head; ?>
    
    <body>

        <?php 
            echo $navView; 
            if($this->cart->total_items()){
                $attr = array('id' => 'update');
                echo form_open(base_url('cart/update'), $attr);
        ?>

         <div class="container">
            <div class="row">
                <div class="col-xs-8" style="min-width: 780px">
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <h5><span class="glyphicon glyphicon-shopping-cart"></span> Koszyk</h5>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="<?= base_url('main')?>"><button type="button" class="btn btn-primary btn-sm btn-block">
                                            <span class="glyphicon glyphicon-share-alt"></span> Szukaj kolejnego produktu
                                        </button>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            
                            echo form_open(site_url('koszyk/update'));
                            $i = 1;
                            foreach ($this->cart->contents() as $items):
                            
                            echo form_hidden($i.'rowid', $items['rowid']);
                            
                        ?>


            

       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h4 class="product-name"><strong><?php echo $items['name']?></strong></h4><h4><small></small></h4>
                                </div>
                                <div class="col-xs-4">
                                    <div class="col-xs-6 text-right">
                                        <h6><strong><?php echo $this->cart->format_number($items['price']); ?>zł <span class="text-muted">x</span></strong></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <?= form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '2', 'size' => '2', 'class'=>'form-control input-sm ', 'required' => '', 'pattern' => '[0-9]{1,2}'))?>
                                    </div>
                                    <div class="col-xs-2">
                                        <a href='<?php echo base_url('cart/delete/'.$items['rowid']);?>'>
                                            <button type="button" class="btn btn-link btn-xs">
                                                <span class="glyphicon glyphicon-trash"> </span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php $i++; endforeach; ?>
                           
                            <div class="row">
                                <div class="text-center">
                                    <div class="col-xs-9">
                                        <h6 class="text-right">Zmieniłeś ilość?</h6>
                                    </div>
                                    <div class="col-xs-3">
                                        <button type="submit" class="btn btn-default btn-sm btn-block" >
                                            Aktualizuj koszyk
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row text-center">
                                <div class="col-xs-9">
                                    <h4 class="text-right">Razem <strong><?php echo $this->cart->format_number($this->cart->total()); ?>zł</strong></h4>
                                </div>
                                <div class="col-xs-3">
                                    <a href="<?=base_url('cart/checkout')?>"><button type="button" class="btn btn-success btn-block">
                                        Kasa
                                    </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

        <?php 
        } else {
        ?>
        <div class="alert alert-info" style="text-align: center">
            Koszyk jest pusty.
        </div>
        <?php } ?>
    </body>
</html>
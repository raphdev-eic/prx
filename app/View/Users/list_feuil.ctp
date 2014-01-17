<div class="row">
    <div class="col-lg-12">
      <!--content top-->
        <section class="panel">
            <div class="panel-body">
                <!--custom chart start-->
                <div class="border-head">
                    <div class="col-lg-4">
                    	<h3>Vos liens d' affiliations</h3> Vous avez en ce moment : <strong> Filleul <span class="label label-success"><?php echo $count_child; ?></span></strong>
                    </div> 
                    <div class="col-lg-4">
                    <a href="<?php echo $this->Html->url(array('controller'=>'Users','action'=>'AddFeuil'));?>" class="btn btn-info"> Ajouter un nouveau filleul</a>
                    </div>
                </div>
            </div>
        </section>
      <!--end contain top-->
      <!--start content widget-->
              <section class="panel">
                  <div class="panel-body">
                      <?php foreach ($arr as $i => $f): $avatar = current($f['Avatar']);?>
                        <div class="col-lg-4">
                            <!--widget start-->
                            <aside class="profile-nav alt blue-border">
                                <section class="panel">
                                    <div class="user-heading alt twt-feed blue-bg">
                                      <?php if (empty($f['Avatar'])): ?>
                                      <a href="#">
                                      <?php echo $this->Html->image('http://dummyimage.com/140x140/bbb/05071f.png&text=avatar'); ?>
                                      </a>
                                      <?php else: ?>
                                        <a href="#"  class="square2 resize">
                                       <?php echo $this->Html->image($avatar['url']); ?>
                                        </a>  
                                      <?php endif ?>                                  
                                        <h1><?php echo $f['User']['firstname'].'  '. $f['User']['lastname'];?></h1>
                                        <p><?php echo $f['User']['email']; ?></p>
                                    </div>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a href="javascript:;"> <i class="icon-user"></i>Visiter son profil<span class="label label-primary pull-right r-activity">Afficher</span></a></li>
                                        <li><a href="javascript:;"> <i class="icon-envelope"></i>Envoyer un message <span class="label label-info pull-right r-activity">Lui Ecrire</span></a></li>
                                    </ul>
                                </section>
                            </aside>
                            <!--widget end-->
                        </div>
                      <?php endforeach; ?>
                  </div>
              </section>
      <!--end contenbt widget-->
    </div>
</div>
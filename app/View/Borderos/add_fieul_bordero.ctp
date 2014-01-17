<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div class="panel-body">
                <!--custom chart start-->
                <div class="border-head">
                   <h3>Enregister un nouveau Fieul | <small><?php echo ucfirst($this->Session->read('Auth.User.User.lastname')); ?> <?php echo ucfirst($this->Session->read('Auth.User.User.firstname')); ?></small>
                   </h3>
                </div>
                <div class="col-lg-12">
                	<?php echo $this->Session->flash(); ?>
		            <?php echo $this->Form->create('User',array('class'=>'form-horizontal','id'=>'AddformFieul')); ?>
		            <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </section>
    </div>
      <!--widget start-->
         <div class="col-lg-4">
          <section class="panel">
              <div class="twt-feed blue-bg">
                  <h1><?php echo ucfirst($this->Session->read('Auth.User.User.lastname')); ?> <?php echo ucfirst($this->Session->read('Auth.User.User.firstname')); ?></h1>
                  <p><?php echo $this->Session->read('Auth.User.User.email'); ?></p>
                  <a href="#">
                      <?php echo $this->Html->image('http://dummyimage.com/140x140/222/fff&text=inv'); ?>
                  </a>
              </div>
              <div class="weather-category twt-category">
                  <ul>
                      <li class="active">
                          <?php echo $this->Session->read('Auth.User.Rank.name'); ?><br/>
                          Niveau
                      </li>
                      <li>
                        <?php echo $this->Session->read('Auth.User.Team.name'); ?>
                      </li>
                      <li>
                          <?php $etoile = $this->Session->read('Auth.User.Rank.etoile'); ?>
                          <?php for($i = 1 ; $i <= $etoile ; $i++): ?>
                               <i class="icon-star text-primary"></i>
                          <?php endfor; ?>
                      </li>
                  </ul>
              </div>
          </section>
          <!--widget end-->
    </div>
<!-- Stats Widgets -->
 <!--Stats Form-->
         <div class="col-lg-8">
          <section class="panel ">
                <div class="stepy-tab">
                    <ul id="default-titles" class="stepy-titles clearfix">
                        <li id="default-title-0" class="">
                            <div>Step 1</div>
                        </li>
                        <li id="default-title-1" class="current-step">
                            <div>Step 2</div>
                        </li>
                    </ul>
                </div>
                <div class="panel-body panel-primary">
                    <div class="panel-heading"> Joindrer le Bordero (facultatif) , cliquez sur terminer si vous en possédez pas</div>
                    <div class="panel-body">
                    	<?php echo $this->Form->create('Bordero',array('type'=>'file','class'=>'form-horizontal','role'=>'form')); ?>
                        <?php echo $this->Form->input('user_id',array('type'=>'hidden')); ?>
                        <div class="form-group">
                            <label  class="col-lg-2 control-label">Bordero (jpg , png, jepg)</label>
                            <div class="col-lg-10">
                            <?php echo $this->Form->input('url_file',array('label'=>false,'type'=>'file','id'=>'BorderoFile')); ?>
                             </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <a href="<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'ListFeuil'));?>" class="btn btn-danger pull-right">Termimer</a>
                              <?php echo $this->Form->button('Uploader Le fichier',array('class'=>'btn btn-success')); ?>
                            </div>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
          </section>
    </div>
  <!--end form-->
<!-- end  -->
</div>